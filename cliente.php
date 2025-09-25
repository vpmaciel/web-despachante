class Cliente {
    private $id;
    private $cpfCnpj;
    private $telefone;
    private $nomeCompleto;
    private $email;

    public function __construct() {
     
    }

    public function getId() {
        return $this->id;
    }

    public function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getEmail() {
        return $this->email;
    }
}