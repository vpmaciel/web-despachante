<?php

interface DAO
{
    public function getRegistroLista();

    public function getRegistros();
    
    public function getRegistro($registro);

    public function deletarRegistro($registro);

    public function relatorio();

    public function atualizarRegistro($registro);

    public function inserirRegistro($registro);
}
