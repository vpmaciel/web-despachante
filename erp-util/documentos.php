<?php

class Documentos
{

    public static function normalizarCpfCnpj(string $cpfCnpj): string
    {
        // Remove tudo que não for letra ou número
        $valor = strtoupper(preg_replace('/[^A-Z0-9]/', '', $cpfCnpj));

        // CPF = 11 dígitos
        if (strlen($valor) === 11) {
            return $valor;
        }

        // CNPJ = 14 dígitos
        if (strlen($valor) === 14) {
            return $valor;
        }

        // Tamanho inválido
        return '';
    }

    public static function normalizarTelefone(string $telefone): string
    {
        $valor = preg_replace('/\D/', '', $telefone);

        return $valor ?: '';
    }

    public static function normalizarEmail(string $email): string
    {
        // Converte para minúsculo e remove espaços
        $email = strtolower(trim($email));

        // Remove caracteres inválidos (mantém padrão de e-mail)
        $email = preg_replace('/[^a-z0-9@._-]/', '', $email);

        // Valida o formato do e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return '';
        }

        return $email;
    }
}
