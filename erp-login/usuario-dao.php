<?php
class UsuarioDAO {

    private $pdo;

    public function __construct() {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPdo();        
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getRegistroLista() {
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

    public function getRegistros() {
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
    

    
    public function getRegistro($registro) {
        
    }

    public function deletarRegistro($registro) {
        
    }

    public function pesquisarRegistro($registro) {
        //
    }

    public function atualizarRegistro($registro) {
        try {           
    
            // Preparar a query SQL para atualização
            $sql = "UPDATE usuario SET usuario_senha = :usuario_senha WHERE usuario_nome = :usuario_nome";
            $stmt = $this->pdo->prepare($sql);
    
            // Executar a query com os valores
            $stmt->execute([
                ':usuario_nome' => $registro['usuario_nome'],
                ':usuario_senha' => $registro['usuario_senha']
            ]);
    
            echo "Usuário atualizado com sucesso!";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }    

    public function inserirRegistro($registro) {
        try {
            
        
            // Preparar a query SQL
            $sql = "INSERT INTO usuario (usuario_nome, usuario_senha) VALUES (:usuario_nome, :usuario_senha)";
            $stmt = $this->pdo->prepare($sql);
        
            // Executar a query com os valores
            $stmt->execute([
                ':usuario_nome' => $registro['usuario_nome'],
                ':usuario_senha' => $registro['usuario_senha']
            ]);
        
            echo "Usuário inserido com sucesso!";
        } catch (PDOException $e) {
            die($e->getMessage());
        }          
    }
}