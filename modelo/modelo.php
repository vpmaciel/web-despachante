<?php

final class usuario
{
    public string $usuario_nome;
    public string $usuario_senha;

    public function __construct()
    {
        
    }
}

final class tipo_placa
{
    public string $tipo_placa_descricao;

    public function __construct()
    {
        
    }
}
final class cor_placa
{    
    public string $cor_placa_descricao;

    public function __construct()
    {
        
    }
}
final class marca_veiculo
{
     public string $marca_veiculo_descricao;

    public function __construct()
    {
        
    }
}
final class modelo_veiculo
{    
    public string $modelo_veiculo_marca_veiculo_descricao;
    public string $modelo_veiculo_descricao;

    public function __construct()
    {
        
    }
}
final class veiculo
{    
    public string $veiculo_placa;
    public int $veiculo_renavam;
    public int $veiculo_ano_modelo;
    public int $veiculo_ano_fabricacao;    
    public string $veiculo_modelo_veiculo_descricao;


    public function __construct()
    {
        
    }
}
final class pedido_placa
{
    public int $pedido_placa_codigo;
    public string $pedido_placa_veiculo_placa;
    public int $pedido_placa_quantidade;
    public string $pedido_placa_cor_placa_descricao;
    public string $pedido_placa_tipo_placa_descricao;    

    public function __construct()
    {
        
    }
}
final class tipo_servico
{
    public string $tipo_servico_descricao;

    public function __construct()
    {
        
    }
}

final class servico
{
    public int $servico_codigo;    
    public string $servico_data;
    public string $servico_cliente_cpf_cnpj;
    public string $servico_veiculo_placa;

    public function __construct()
    {
        
    }
}

final class item_servico
{
    public int $item_servico_codigo;    
    public int $item_servico_servico_codigo;
    public string $item_servico_tipo_servico_descricao;
    public float $item_servico_valor;
    

    public function __construct()
    {
        
    }
}
final class tipo_documento
{    
    public string $tipo_documento_descricao;

    public function __construct()
    {
        
    }
}

final class recibo_documento
{
    public int $recibo_documento_codigo;
    public string $recibo_documento_tipo_documento_descricao;
    public string $recibo_documento_veiculo_placa;
    public string $recibo_documento_cliente_cpf_cnpj;
    public string $recibo_documento_nome_recebedor;
    public string $recibo_documento_cpf_cnpj_recebedor;
    public string $recibo_documento_data_devolucao;

    public function __construct()
    {
        
    }
}

