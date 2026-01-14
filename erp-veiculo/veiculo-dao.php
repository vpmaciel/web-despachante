<?php
class VeiculoDAO implements DAO
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
            $sql = "SELECT * FROM veiculo";
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
            $sql = "SELECT COUNT(*) as total FROM veiculo";
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
            $SQL = "SELECT * FROM veiculo where veiculo_id = '" . $_GET['veiculo_id'] . "';";
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registro['veiculo_id'] = $linha['veiculo_id'];
                $registro['veiculo_placa'] = $linha['veiculo_placa'];
                $registro['veiculo_cpf_cnpj_proprietario'] = $linha['veiculo_cpf_cnpj_proprietario'];
                $registro['veiculo_nome_proprietario'] = $linha['veiculo_nome_proprietario'];
                $registro['veiculo_marca'] = $linha['veiculo_marca'];
                $registro['veiculo_modelo'] = $linha['veiculo_modelo'];
            }
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }
        return $registro;
    }

    public function deletarRegistro($registro)
    {
        try {
            // Preparar a query SQL para deletar
            $sql = "DELETE FROM veiculo WHERE veiculo_id = :veiculo_id";

            $stmt = $this->pdo->prepare($sql);
            
            // Bind do parâmetro
            $stmt->bindParam(':veiculo_id', $registro['veiculo_id'], PDO::PARAM_INT);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
            return false;
        }
    }

    public function relatorio($registro)
    {
        if (isset($registro['veiculo_id'])) {
            $SQL = 'SELECT * FROM veiculo' . ' WHERE veiculo_id = ' . $registro['veiculo_id'];
        } else {
            $SQL = 'SELECT * FROM veiculo LIMIT 1';
        }

        $stmt = $this->pdo->prepare($SQL);
        return $stmt;
    }

    public function atualizarRegistro($registro)
    {
        try {
            // Preparar a query SQL para atualização
            $sql = "UPDATE veiculo
                    SET 
                    veiculo_placa = :veiculo_placa,
                    veiculo_cpf_cnpj_proprietario = :veiculo_cpf_cnpj_proprietario,
                    veiculo_nome_proprietario = :veiculo_nome_proprietario,
                    veiculo_marca = :veiculo_marca,
                    veiculo_modelo = :veiculo_modelo
                    WHERE 
                    veiculo_id = :veiculo_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':veiculo_placa', $registro['veiculo_placa'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_cpf_cnpj_proprietario', $registro['veiculo_cpf_cnpj_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_nome_proprietario', $registro['veiculo_nome_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_marca', $registro['veiculo_marca'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_modelo', $registro['veiculo_modelo'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_id', $registro['veiculo_id'], PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }

    public function inserirRegistro($registro)
    {
        try {
            // Preparar a query SQL
            $sql = "INSERT INTO veiculo
                    (
                    veiculo_placa, 
                    veiculo_cpf_cnpj_proprietario, 
                    veiculo_nome_proprietario, 
                    veiculo_marca, 
                    veiculo_modelo
                    )
                    VALUES
                    (
                    :veiculo_placa, 
                    :veiculo_cpf_cnpj_proprietario, 
                    :veiculo_nome_proprietario, 
                    :veiculo_marca, 
                    :veiculo_modelo
                    )";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':veiculo_placa', $registro['veiculo_placa'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_cpf_cnpj_proprietario', $registro['veiculo_cpf_cnpj_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_nome_proprietario', $registro['veiculo_nome_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_marca', $registro['veiculo_marca'], PDO::PARAM_STR);
            $stmt->bindParam(':veiculo_modelo', $registro['veiculo_modelo'], PDO::PARAM_STR);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }
}
