<?php

class HtmlComponent
{
    private string $type;
    private string $id;
    private string $name;
    private string $value;
    private array $attributes;

    public function __construct(
        string $type,
        string $id,
        string $name,
        string $value = '',
        array $attributes = []
    ) {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->attributes = $attributes;
    }

    public function createComponent(): string
    {
        $attrs = '';

        foreach ($this->attributes as $key => $val) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($val, ENT_QUOTES, 'UTF-8') . '"';
        }

        return '<input type="' . htmlspecialchars($this->type, ENT_QUOTES, 'UTF-8') . '"
            id="' . htmlspecialchars($this->id, ENT_QUOTES, 'UTF-8') . '"
            name="' . htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8') . '"
            value="' . htmlspecialchars($this->value, ENT_QUOTES, 'UTF-8') . '"' .
            $attrs . '>';
    }
}



require_once 'HtmlComponent.php';

$input = new HtmlComponent(
    'text',
    'servico_cpf_cnpj_cliente',
    'servico_cpf_cnpj_cliente',
    $registro['servico_cpf_cnpj_cliente'] ?? '',
    [
        'minlength' => 11,
        'maxlength' => 20,
        'oninput'   => "this.value = this.value.toUpperCase().replace(/[^A-Z0-9.\\-\\/]/g, '').slice(0, 20);",
        'onblur'    => 'clearTimeout();'
    ]
);

echo $input->createComponent();

