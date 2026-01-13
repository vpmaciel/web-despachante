<?php
class ServicoDAO implements DAO
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
            $sql = "SELECT * FROM servico";
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
            $sql = "SELECT COUNT(*) as total FROM servico";
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
            $SQL = "SELECT * FROM servico where servico_id = '" . $_GET['servico_id'] . "';";
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registro['servico_id'] = $linha['servico_id'];
                $registro['servico_data'] = $linha['servico_data'];
                $registro['servico_valor'] = formatarNumero($linha['servico_valor']);
                $registro['servico_placa_veiculo'] = $linha['servico_placa_veiculo'];
                $registro['servico_descricao'] = $linha['servico_descricao'];
                $registro['servico_cpf_cnpj_cliente'] = $linha['servico_cpf_cnpj_cliente'];
                $registro['servico_telefone_cliente'] = $linha['servico_telefone_cliente'];
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
            $sql = "DELETE FROM servico WHERE servico_id = :servico_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind do parâmetro
            $stmt->bindParam(':servico_id', $registro['servico'], PDO::PARAM_INT);

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
            $SQL = 'SELECT * FROM servico' . ' WHERE servico_id = ' . $registro['servico_id'];
        } else {
            $SQL = 'SELECT * FROM servico LIMIT 1';
        }

        $stmt = $this->pdo->prepare($SQL);
        return $stmt;
    }

    public function atualizarRegistro($registro)
    {
        try {
            // Preparar a query SQL para atualização
            $sql = "UPDATE servico 
                    SET 
                    servico_data = :servico_data,
                    servico_valor = :servico_valor,
                    servico_placa_veiculo = :servico_placa_veiculo,
                    servico_descricao = :servico_descricao,
                    servico_cpf_cnpj_cliente = :servico_cpf_cnpj_cliente,
                    servico_telefone_cliente = :servico_telefone_cliente
                    WHERE 
                    servico_id = :servico_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':servico_data', $registro['servico_data'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_valor', $registro['servico_valor'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_placa_veiculo', $registro['servico_placa_veiculo'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_descricao', $registro['servico_descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_cpf_cnpj_cliente', $registro['servico_cpf_cnpj_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_telefone_cliente', $registro['servico_telefone_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_id', $registro['servico_id'], PDO::PARAM_INT);
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
            $sql = "INSERT INTO servico 
                    (
                    servico_data, 
                    servico_valor, 
                    servico_placa_veiculo, 
                    servico_descricao, 
                    servico_cpf_cnpj_cliente, 
                    servico_telefone_cliente
                    )
                    VALUES (
                    :servico_data, 
                    :servico_valor, 
                    :servico_placa_veiculo, 
                    :servico_descricao, 
                    :servico_cpf_cnpj_cliente, 
                    :servico_telefone_cliente
                    )";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':servico_data', $registro['servico_data'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_valor', $registro['servico_valor'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_placa_veiculo', $registro['servico_placa_veiculo'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_descricao', $registro['servico_descricao'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_cpf_cnpj_cliente', $registro['servico_cpf_cnpj_cliente'], PDO::PARAM_STR);
            $stmt->bindParam(':servico_telefone_cliente', $registro['servico_telefone_cliente'], PDO::PARAM_STR);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }
}
