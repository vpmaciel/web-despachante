interface DAO {
    public function criarRegistro($registro);
    public function listarRegistros();
    public function buscarRegistro($registro);
    public function deletarRegistro($registro);
    public function atualizarRegistro($registro);
}