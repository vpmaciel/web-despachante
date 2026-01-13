<?php
class PedidoDePlacaDAO implements DAO
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
            $sql = "SELECT * FROM pedido_de_placa";
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
            $sql = "SELECT COUNT(*) as total FROM pedido_de_placa";
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
            $SQL = "SELECT * FROM pedido_de_placa where pedido_de_placa_id = '" . $_GET['pedido_de_placa_id'] . "';";
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registro['pedido_de_placa_id'] = $linha['pedido_de_placa_id'];
                $registro['pedido_de_placa_data'] = $linha['pedido_de_placa_data'];
                $registro['pedido_de_placa_placa_veiculo'] = $linha['pedido_de_placa_placa_veiculo'];
                $registro['pedido_de_placa_quantidade'] = $linha['pedido_de_placa_quantidade'];
                $registro['pedido_de_placa_renavam'] = $linha['pedido_de_placa_renavam'];
                $registro['pedido_de_placa_cpf_cnpj_proprietario'] = $linha['pedido_de_placa_cpf_cnpj_proprietario'];
                $registro['pedido_de_placa_cor_placa'] = $linha['pedido_de_placa_cor_placa'];
                $registro['pedido_de_placa_tipo_placa'] = $linha['pedido_de_placa_tipo_placa'];
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
            $sql = "DELETE FROM pedido_de_placa WHERE pedido_de_placa_id = :pedido_de_placa_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind do parâmetro
            $stmt->bindParam(':pedido_de_placa_id', $registro['pedido_de_placa_id'], PDO::PARAM_INT);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
            return false;
        }
    }

    public function relatorio($registro)
    {
        if (isset($registro['pedido_de_placa_id'])) {
            $SQL = 'SELECT * FROM pedido_de_placa' . ' WHERE pedido_de_placa_id = ' . $registro['pedido_de_placa_id'];
        } else {
            $SQL = 'SELECT * FROM pedido_de_placa LIMIT 1';
        }

        $stmt = $this->pdo->prepare($SQL);
        return $stmt;
    }

    public function atualizarRegistro($registro)
    {
        try {
            // Preparar a query SQL para atualização
            $sql = "UPDATE pedido_de_placa 
                    SET
                    pedido_de_placa_data = :pedido_de_placa_data,
                    pedido_de_placa_placa_veiculo = :pedido_de_placa_placa_veiculo,
                    pedido_de_placa_quantidade = :pedido_de_placa_quantidade,
                    pedido_de_placa_renavam = :pedido_de_placa_renavam,
                    pedido_de_placa_cpf_cnpj_proprietario = :pedido_de_placa_cpf_cnpj_proprietario,
                    pedido_de_placa_cor_placa = :pedido_de_placa_cor_placa,
                    pedido_de_placa_tipo_placa = :pedido_de_placa_tipo_placa
                    WHERE
                    pedido_de_placa_id = :pedido_de_placa_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam('pedido_de_placa_id', $registro['pedido_de_placa_id'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_data', $registro['pedido_de_placa_data'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_placa_veiculo', $registro['pedido_de_placa_placa_veiculo'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_quantidade', $registro['pedido_de_placa_quantidade'], PDO::PARAM_INT);
            $stmt->bindParam('pedido_de_placa_renavam', $registro['pedido_de_placa_renavam'], PDO::PARAM_INT);
            $stmt->bindParam('pedido_de_placa_cpf_cnpj_proprietario', $registro['pedido_de_placa_cpf_cnpj_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_cor_placa', $registro['pedido_de_placa_cor_placa'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_tipo_placa', $registro['pedido_de_placa_tipo_placa'], PDO::PARAM_STR);
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
            $sql = "INSERT INTO pedido_de_placa 
                    (                    
                    pedido_de_placa_data,
                    pedido_de_placa_placa_veiculo,
                    pedido_de_placa_quantidade,
                    pedido_de_placa_renavam,
                    pedido_de_placa_cpf_cnpj_proprietario,
                    pedido_de_placa_cor_placa,
                    pedido_de_placa_tipo_placa
                    ) 
                    VALUES 
                    (
                    :pedido_de_placa_data,
                    :pedido_de_placa_placa_veiculo,
                    :pedido_de_placa_quantidade,
                    :pedido_de_placa_renavam,
                    :pedido_de_placa_cpf_cnpj_proprietario,
                    :pedido_de_placa_cor_placa,
                    :pedido_de_placa_tipo_placa
                    )";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam('pedido_de_placa_data', $registro['pedido_de_placa_data'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_placa_veiculo', $registro['pedido_de_placa_placa_veiculo'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_quantidade', $registro['pedido_de_placa_quantidade'], PDO::PARAM_INT);
            $stmt->bindParam('pedido_de_placa_renavam', $registro['pedido_de_placa_renavam'], PDO::PARAM_INT);
            $stmt->bindParam('pedido_de_placa_cpf_cnpj_proprietario', $registro['pedido_de_placa_cpf_cnpj_proprietario'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_cor_placa', $registro['pedido_de_placa_cor_placa'], PDO::PARAM_STR);
            $stmt->bindParam('pedido_de_placa_tipo_placa', $registro['pedido_de_placa_tipo_placa'], PDO::PARAM_STR);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }
}
