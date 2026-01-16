<?php

class ClienteDAO implements DAO
{
    private $pdo;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPdo();
    }

    public function getRegistroLista()
    {
        try {
            // Preparar a query SQL para contar os registros            
            $sql = "SELECT * FROM cliente";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
    }

    public function getTotalRegistros()
    {
        try {
            // Preparar a query SQL para contar os registros
            $sql = "SELECT COUNT(*) as total FROM cliente";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            // Retorna o total de registros
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] ?? 0;
        } catch (PDOException $e) {
            die($e->getMessage());
            return 0;
        }
    }

    public function getRegistro($registro)
    {
        try {
            $SQL = "SELECT * FROM cliente where cliente_id = " . $_GET['cliente_id'] . ";";
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();
            //exit($SQL);
            $registro = array();
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registro['cliente_id'] = $linha['cliente_id'];
                $registro['cliente_cpf_cnpj'] = $linha['cliente_cpf_cnpj'];
                $registro['cliente_telefone'] = $linha['cliente_telefone'];
                $registro['cliente_nome'] = $linha['cliente_nome'];
                $registro['cliente_email'] = $linha['cliente_email'];
            }
            //var_dump($registro);
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }
        return $registro;
    }

    public function deletarRegistro($registro)
    {
        try {
            // Preparar a query SQL para deletar
            $sql = "DELETE FROM cliente WHERE cliente_id = :cliente_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind do parâmetro
            $stmt->bindParam(':cliente_id', $registro['cliente_id'], PDO::PARAM_INT);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
            return false;
        }
    }

    public function relatorio($registro)
    {
        if (isset($registro['cliente_id'])) {
            $sql = 'SELECT * FROM cliente' . ' WHERE cliente_id = ' . $registro['cliente_id'];
        } else {
            $sql = 'SELECT * FROM cliente LIMIT 1';
        }
        $stmt = $this->pdo->prepare($sql);
        return $stmt;
    }

    public function atualizarRegistro($registro)
    {
        try {
            // Preparar a query SQL para atualização
            $sql = "UPDATE cliente SET
                    cliente_cpf_cnpj = :cliente_cpf_cnpj, 
					cliente_telefone = :cliente_telefone, 
					cliente_nome = :cliente_nome, 
					cliente_email = :cliente_email 
				    WHERE 
                    cliente_id = :cliente_id";

            //exit($sql);

            $stmt = $this->pdo->prepare($sql);
            $registro['cliente_nome'] = strtoupper($registro['cliente_nome']);
            $registro['cliente_email'] = strtolower($registro['cliente_email']);

            // Bind dos parâmetros

            $stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_nome', $registro['cliente_nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_id', $registro['cliente_id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {

                header("Location: ../erp-msg/erro.php?msg=CPF/CNPJ já cadastrado&voltar=true");
                exit;
            }
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }

    public function inserirRegistro($registro)
    {
        try {
            // Preparar a query SQL
            $sql = "INSERT INTO cliente 
                    (
                    cliente_cpf_cnpj, 
                    cliente_telefone, 
                    cliente_nome, 
                    cliente_email
                    ) 
                    VALUES 
                    (
                    :cliente_cpf_cnpj, 
                    :cliente_telefone, 
                    :cliente_nome, 
                    :cliente_email
                    )";

            $stmt = $this->pdo->prepare($sql);
            $registro['cliente_nome'] = strtoupper($registro['cliente_nome']);
            $registro['cliente_email'] = strtolower($registro['cliente_email']);

            // Bind dos parâmetros
            $stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_nome', $registro['cliente_nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {

                header("Location: ../erp-msg/erro.php?msg=CPF/CNPJ já cadastrado");
                exit;
            }
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }
}
