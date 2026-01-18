<?php
class UsuarioDAO implements DAO
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
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getRegistros()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] ?? 0;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function atualizarRegistro($registro)
    {
        try {
            $sql = "
                UPDATE usuario 
                SET usuario_senha = :usuario_senha 
                WHERE usuario_nome = :usuario_nome
            ";

            $stmt = $this->pdo->prepare($sql);

            // bindParam → correto para variáveis reutilizáveis
            $stmt->bindParam(':usuario_nome', $registro['usuario_nome'], PDO::PARAM_STR);
            $stmt->bindParam(':usuario_senha', $registro['usuario_senha'], PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function inserirRegistro($registro)
    {
        try {
            $sql = "
                INSERT INTO usuario (usuario_nome, usuario_senha)
                VALUES (:usuario_nome, :usuario_senha)
            ";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':usuario_nome', $registro['usuario_nome'], PDO::PARAM_STR);
            $stmt->bindParam(':usuario_senha', $registro['usuario_senha'], PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Métodos não implementados (mantidos)
    public function getRegistro($registro)
    {
        throw new Exception('Not implemented');
    }

    public function deletarRegistro($registro)
    {
        throw new Exception('Not implemented');
    }

    public function pesquisarRegistro($registro)
    {
        throw new Exception('Not implemented');
    }

    public function getTotalRegistros()
    {
        throw new Exception('Not implemented');
    }

    public function relatorio($registro)
    {
        throw new Exception('Not implemented');
    }

    public function validarRegistro(array $registro): void
    {
        // Normalização
        $registro['cliente_nome'] = strtoupper(trim($registro['cliente_nome'] ?? ''));
        $registro['cliente_email'] = strtoupper(trim($registro['cliente_email'] ?? ''));
        $registro['cliente_cpf_cnpj'] = trim($registro['cliente_cpf_cnpj'] ?? '');

        // Validações obrigatórias
        if ($registro['cliente_nome'] === '') {
            header("Location: ../erp-msg/erro.php?msg=Placa do veículo é obrigatória&voltar=true");
            exit;
        }

        if ($registro['cliente_email'] === '') {
            header("Location: ../erp-msg/erro.php?msg=Nome do proprietário é obrigatório&voltar=true");
            exit;
        }

        if ($registro['cliente_cpf_cnpj'] === '') {
            header("Location: ../erp-msg/erro.php?msg=CPF/CNPJ do proprietário é obrigatório&voltar=true");
            exit;
        }
    }
}
