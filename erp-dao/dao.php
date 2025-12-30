<?php

interface DAO
{
    public function getRegistroLista();

    public function getTotalRegistros();

    public function getRegistro($registro);

    public function deletarRegistro($registro);

    public function relatorio();

    public function atualizarRegistro($registro);

    public function inserirRegistro($registro);
}
