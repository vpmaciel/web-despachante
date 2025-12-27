<?php
class ClienteDAO implements DAO
{

    private $pdo;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPdo();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getRegistroLista()
    {
        try {
            // Preparar a query SQL para contar os registros            
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
    }

    public function getRegistros()
    {
        try {
            // Preparar a query SQL para contar os registros
            $sql = "SELECT COUNT(*) as total FROM usuario";
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
            $SQL = "SELECT * FROM cliente where cliente_id = '" . $_GET['cliente_id'] . "';";
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $registro['cliente_id'] = $linha['cliente_id'];
                $registro['cliente_cpf_cnpj'] = $linha['cliente_cpf_cnpj'];
                $registro['cliente_telefone'] = $linha['cliente_telefone'];
                $registro['cliente_nome_completo'] = $linha['cliente_nome_completo'];
                $registro['cliente_email'] = $linha['cliente_email'];
            }
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }
        return $registro;
    }

    public function getClienteNomeCompleto()
    {
        // falta acertar essa função não funcionando
        try {
            $cpfCnpjCliente  = $_POST['servico_cpf_cnpj_cliente'];
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT cliente_nome_completo FROM cliente WHERE cliente_cpf_cnpj = :servico_cpf_cnpj_cliente";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':servico_cpf_cnpj_cliente', $cpfCnpjCliente);
            $stmt->execute();

            // Obtenção dos resultados como array associativo
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Enviar os resultados como JSON para a requisição Ajax
            return $result;
        } catch (PDOException $e) {
            return ["error" => "Erro na conexão com o banco de dados: " . $e->getMessage()];
        }
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

    public function relatorio()
    {
        if (isset($_COOKIE['cliente_id'])) {
            $SQL = 'SELECT * FROM cliente' . ' WHERE cliente_id = ' . $_COOKIE['cliente_id'];
        } else {
            $SQL = 'SELECT * FROM cliente LIMIT 1';
        }

        $stmt = $this->pdo->prepare($SQL);
        return $stmt;
    }

    public function atualizarRegistro($registro)
    {
        try {
            // Preparar a query SQL para atualização
            $sql = "UPDATE cliente 
				SET cliente_cpf_cnpj = :cliente_cpf_cnpj, 
					cliente_telefone = :cliente_telefone, 
					cliente_nome_completo = :cliente_nome_completo, 
					cliente_email = :cliente_email 
				WHERE cliente_id = :cliente_id";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_nome_completo', $registro['cliente_nome_completo'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_id', $registro['cliente_id'], PDO::PARAM_INT);
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
            $sql = "INSERT INTO cliente 
				(cliente_cpf_cnpj, cliente_telefone, cliente_nome_completo, cliente_email) 
				VALUES 
				(:cliente_cpf_cnpj, :cliente_telefone, :cliente_nome_completo, :cliente_email)";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_nome_completo', $registro['cliente_nome_completo'], PDO::PARAM_STR);
            $stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);

            // Executar a query
            return $stmt->execute();
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }

        return false;
    }
}
