<?php

class Conexao
{
    private $dns;
    private $pdo;

    public function __construct()
    {
        $this->dns = "mysql:host=localhost;dbname=DB_DESPACHANTE";
        $this->pdo = new PDO($this->dns, "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    /* =========================
       FUNÇÕES UTILITÁRIAS
    ========================== */

    private function normalizarValor($valor, bool $upper = false): string
    {
        $valor = escapeshellcmd($valor);
        $valor = remover_caracteres($valor);

        if ($valor === '' || $valor === null) {
            return '';
        }

        if (is_numeric($valor)) {
            return $valor;
        }

        if (str_contains($valor, '@') || str_contains($valor, '.')) {
            return "'" . mb_strtolower($valor, 'UTF-8') . "'";
        }

        $valor = $upper
            ? mb_strtoupper($valor, 'UTF-8')
            : mb_convert_case(mb_strtolower($valor, 'UTF-8'), MB_CASE_TITLE);

        return "'" . $valor . "'";
    }

    private function montarWhere(array $array_condicao): string
    {
        $condicoes = [];

        foreach ($array_condicao as $campo => $valor) {
            $valor = $this->normalizarValor($valor);
            if ($valor !== '') {
                $condicoes[] = "$campo=$valor";
            }
        }

        return implode(' AND ', $condicoes);
    }

    private function montarSet(array $array_modelo): string
    {
        $campos = [];

        foreach ($array_modelo as $campo => $valor) {
            $valor = $this->normalizarValor($valor, true);
            if ($valor !== '') {
                $campos[] = "$campo=$valor";
            }
        }

        return implode(', ', $campos);
    }

    private function montarInsert(array $array_modelo): array
    {
        $campos = [];
        $valores = [];

        foreach ($array_modelo as $campo => $valor) {
            $valor = $this->normalizarValor($valor, true);
            if ($valor !== '') {
                $campos[]  = $campo;
                $valores[] = $valor;
            }
        }

        return [
            'campos'  => implode(',', $campos),
            'valores' => implode(',', $valores)
        ];
    }

    /* =========================
       CRUD
    ========================== */

    public function inserir(string $string_tabela, array $array_modelo): bool
    {
        $insert = $this->montarInsert($array_modelo);

        if ($insert['campos'] === '' || $insert['valores'] === '') {
            return false;
        }

        $sql = "INSERT INTO $string_tabela ({$insert['campos']}) VALUES ({$insert['valores']});";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }

    public function atualizar(string $string_tabela, array $array_modelo, array $array_condicao): bool
    {
        $set   = $this->montarSet($array_modelo);
        $where = $this->montarWhere($array_condicao);

        if ($set === '' || $where === '') {
            return false;
        }

        $sql = "UPDATE $string_tabela SET $set WHERE $where;";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }

    public function excluir(string $string_tabela, array $array_condicao): bool
    {
        $where = $this->montarWhere($array_condicao);

        if ($where === '') {
            return false;
        }

        $sql = "DELETE FROM $string_tabela WHERE $where;";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }

    public function selecionar(string $string_tabela, array $array_condicao)
    {
        $where = $this->montarWhere($array_condicao);

        $sql = "SELECT * FROM $string_tabela";
        if ($where !== '') {
            $sql .= " WHERE $where";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($linhas) ? null : json_encode($linhas);
    }

    public function retornar_numero_registros(string $string_tabela, array $array_condicao): int
    {
        $where = $this->montarWhere($array_condicao);

        $sql = "SELECT COUNT(*) FROM $string_tabela";
        if ($where !== '') {
            $sql .= " WHERE $where";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    public function paginarTotal(string $string_tabela, array $array_condicao)
    {
        return $this->retornar_numero_registros($string_tabela, $array_condicao);
    }

    public function paginar(string $string_tabela, array $array_condicao, $inicio = 0, $limite = 10)
    {
        $where = $this->montarWhere($array_condicao);

        $sql = "SELECT * FROM $string_tabela";
        if ($where !== '') {
            $sql .= " WHERE $where";
        }

        $sql .= " LIMIT $inicio,$limite";

        return $sql;
    }

    public function getTotalRegistros(string $string_tabela): int
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $string_tabela");
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }
}
