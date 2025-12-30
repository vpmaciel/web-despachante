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

    public function atualizar(string $string_tabela, array $array_modelo, array $array_condicao): bool
    {

        $campos = '';
        $tamanho = count($array_modelo);
        $contador = 1;
        $string_condicao = '';


        if ($tamanho == 0) {
            return false;
        }

        try {

            foreach ($array_modelo as $chave => $valor) {
                $valor = escapeshellcmd($valor);

                $valor = remover_caracteres($valor);

                $valor = "'" . mb_convert_case(mb_strtoupper($valor, 'UTF-8'),  MB_CASE_UPPER) . "'";

                $campos .= $chave . "=" . $valor;

                if ($contador < $tamanho) {
                    $campos .= ',';
                }
                $contador++;
            }

            $condicao = 0;
            $contador = 1;
            $tamanho = count($array_condicao);

            foreach ($array_condicao as $chave => $valor) {
                $valor = remover_caracteres($valor);

                $valor = "'" . mb_convert_case(mb_strtoupper($valor, 'UTF-8'),  MB_CASE_UPPER) . "'";

                $string_condicao .= $chave . "=" . $valor;

                if ($contador < $tamanho) {
                    $string_condicao .= ' and ';
                }
                $contador++;
                $condicao = 1;
            }

            if ($condicao == 0) {
                return false;
            }


            //die("update $string_tabela set $campos where ($string_condicao);");
            $stmt = NULL;
            $stmt = $this->pdo->prepare("update $string_tabela set $campos where ($string_condicao);--");
            $stmt->execute();


            return true;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na atualização:" . $pdoException->getMessage();
            $this->pdo->rollback();
            return false;
        }
        return false;
    }

    public function excluir(string $string_tabela, array $array_condicao): bool
    {

        if (!is_array($array_condicao) && !is_string($string_tabela)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
            return false;
        }
        $campos = '';
        $string_condicao = '';
        $tamanho = count($array_condicao);
        $contador = 1;
        if ($tamanho == 0 || !isset($array_condicao)) {
            return false;
        }

        try {
            $contador = 1;
            $tamanho = count($array_condicao);
            foreach ($array_condicao as $chave => $valor) {
                $valor = escapeshellcmd($valor);

                $valor = remover_caracteres($valor);
                if (!is_numeric($valor)) {
                    if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                        $valor = "'" .  mb_strtolower($valor, 'UTF-8') . "'";
                    } else {
                        $valor = "'" . mb_convert_case(mb_strtolower($valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                    }
                }

                $string_condicao .= $chave . "=" . $valor;

                if ($contador < $tamanho) {
                    $string_condicao .= ' and ';
                }
                $contador++;
            }


            //exit("DELETE FROM $string_tabela where ($string_condicao);");
            $stmt = $this->pdo->prepare("DELETE FROM $string_tabela where ($string_condicao);--");
            return ($stmt->execute()) ? true : false;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na exclusão:" . $pdoException->getMessage();
            $this->pdo->rollback();
            return false;
        }
    }

    public function inserir(string $string_tabela, array $array_modelo): bool
    {

        if (!is_array($array_modelo) || !is_string($string_tabela)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
        }


        $campos = '';
        $valores = '';
        $tamanho = count($array_modelo);
        $contador = 1;


        try {

            foreach ($array_modelo as $chave => $valor) {
                $valor = escapeshellcmd($valor);

                $valor = remover_caracteres($valor);

                $valor = "'" . mb_convert_case(mb_strtoupper($valor, 'UTF-8'),  MB_CASE_UPPER) . "'";

                $valores .= $valor;
                $campos .= $chave;

                if ($contador < $tamanho) {
                    $campos .= ',';
                    $valores .= ',';
                }
                $contador++;
            }
            //exit("insert into $string_tabela ($campos) values ($valores);");

            $stmt = $this->pdo->prepare("insert into $string_tabela ($campos) values ($valores);--");
            $stmt->execute();


            return true;
        } catch (PDOException $pdoException) {

            $mensagem =  $pdoException->getMessage();

            if (strpos($mensagem, "Integrity") !== false) {
                header('location: erro.php?msg=Erro na inserção ! Verifique se já não possui um registro com campos únicos já cadastrados');
                exit;
            } else {
                echo "A string não contém a palavra 'Integrity'.";
            }

            $this->pdo->rollback();
            return false;
        }

        return false;
    }

    public function retornar_numero_registros(string $string_tabela, array $array_condicao): int
    {


        if (!is_string($string_tabela) || !is_array($array_condicao)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
            return 0;
        }
        $string_condicao = '';
        $tamanho_array_condicao = count($array_condicao);

        try {
            $contador = 1;
            foreach ($array_condicao as $chave => $valor) {
                $valor = escapeshellcmd($valor);

                $valor = remover_caracteres($valor);
                if (!is_numeric($valor)) {
                    if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                        $valor = "'" .  mb_strtolower($valor, 'UTF-8') . "'";
                    } else {
                        $valor = "'" . mb_convert_case(mb_strtolower($valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                    }
                }

                $string_condicao .= $chave . "=" . $valor;

                if ($contador < $tamanho_array_condicao) {
                    $string_condicao .= ' and ';
                }
                $contador++;
            }
            //exit("SELECT COUNT(*) FROM $string_tabela where ($string_condicao);");
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $string_tabela where ($string_condicao);--");
            if (!$stmt->execute()) {
                return 0;
            }
            $numero_registros = $stmt->fetchColumn();
            return $numero_registros;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na inserção:" . $pdoException->getMessage();
            return 0;
        }
    }

    public function paginarTotal(string $string_tabela, array $array_condicao)
    {



        if (!is_array($array_condicao) || !is_string($string_tabela)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
            //return NULL;
        }

        $string_condicao = '';

        $tamanho_array_condicao = count($array_condicao);

        $contador = 1;
        $clausula_where = 0;

        try {
            if ($tamanho_array_condicao > 0) {
                foreach ($array_condicao as $chave => $valor) {
                    $valor = escapeshellcmd($valor);

                    $valor = remover_caracteres($valor);
                    if (!is_numeric($valor)) {
                        if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                            $valor = "'" .  mb_strtolower($valor, 'UTF-8') . "'";
                        } else {
                            $valor = "'" . mb_convert_case(mb_strtolower($valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                        }
                    }
                    //exit($valor);
                    if ($valor != "''") {
                        $clausula_where = 1;
                        $string_condicao .= $chave . "=" . $valor;

                        if ($contador < $tamanho_array_condicao) {
                            $string_condicao .= ' and ';
                        }
                    }


                    $contador++;
                }
            }


            $stmt = NULL;


            if ($clausula_where != 0) {
                //die("SELECT * FROM $string_tabela where ($string_condicao);");            
                $sql = "SELECT count(*) FROM $string_tabela where $string_condicao;--";
            } else {
                $sql = "SELECT count(*) FROM $string_tabela;--";
            }
            //die($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $number_of_results =  $stmt->fetchColumn();
            return $number_of_results;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na seleção:" . $pdoException->getMessage();
            return NULL;
        }
    }

    public function paginar(string $string_tabela, array $array_condicao, $PAGINA_PRIMEIRO_RESULTADO = 1, $RESULTADOS_POR_PAGINA = 1)
    {
        if (!is_array($array_condicao) || !is_string($string_tabela)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
            //return NULL;
        }

        $string_condicao = '';
        $tamanho_array_condicao = 0;
        $tamanho_array_condicao = count($array_condicao);

        $contador = 1;
        $clausula_where = 0;

        try {
            if ($tamanho_array_condicao > 0) {
                foreach ($array_condicao as $chave => $valor) {
                    $valor = escapeshellcmd($valor);

                    $valor = remover_caracteres($valor);
                    if (!is_numeric($valor)) {
                        if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                            $valor = "'" .  mb_strtolower($valor, 'UTF-8') . "'";
                        } else {
                            $valor = "'" . mb_convert_case(mb_strtolower($valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                        }
                    }
                    //exit($valor);
                    if ($valor != "''") {
                        $clausula_where = 1;
                        $string_condicao .= $chave . "=" . $valor;

                        if ($contador < $tamanho_array_condicao) {
                            $string_condicao .= ' and ';
                        }
                    }


                    $contador++;
                }
            }


            $stmt = NULL;

            if ($clausula_where != 0) {
                //die("SELECT * FROM $string_tabela where ($string_condicao);");            
                $stmt = "SELECT * FROM $string_tabela where $string_condicao LIMIT " . $PAGINA_PRIMEIRO_RESULTADO . ',' . $RESULTADOS_POR_PAGINA . ';--';
            } else {
                $stmt = "SELECT * FROM $string_tabela LIMIT " . $PAGINA_PRIMEIRO_RESULTADO . ',' . $RESULTADOS_POR_PAGINA . ';--';
            }
            //die($stmt);
            return $stmt;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na seleção:" . $pdoException->getMessage();
            return NULL;
        }
    }

    public function selecionar(string $string_tabela, array $array_condicao)
    {



        if (!is_array($array_condicao) || !is_string($string_tabela)) {
            throw new Exception('Tipos de parametros imcompatíveis !');
            //return NULL;
        }

        $string_condicao = '';
        $tamanho_array_condicao = 0;
        $tamanho_array_condicao = count($array_condicao);

        $contador = 1;
        $CLAUSULA_where = 0;

        try {
            if ($tamanho_array_condicao > 0) {
                foreach ($array_condicao as $chave => $valor) {
                    $valor = escapeshellcmd($valor);

                    $valor = remover_caracteres($valor);
                    if (!is_numeric($valor)) {
                        if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                            $valor = "'" .  mb_strtolower($valor, 'UTF-8') . "'";
                        } else {
                            $valor = "'" . mb_convert_case(mb_strtolower($valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                        }
                    }
                    //exit($valor);
                    if ($valor != "''") {
                        $CLAUSULA_where = 1;
                        $string_condicao .= $chave . "=" . $valor;

                        if ($contador < $tamanho_array_condicao) {
                            $string_condicao .= ' and ';
                        }
                    }


                    $contador++;
                }
            }


            $stmt = NULL;

            if ($CLAUSULA_where != 0) {
                //die("SELECT * FROM $string_tabela where ($string_condicao);");
                $stmt = $this->pdo->prepare("SELECT * FROM $string_tabela where ($string_condicao);--");
            } else {
                $stmt = $this->pdo->prepare("SELECT * FROM $string_tabela;--");
            }

            if (!$stmt->execute()) {
                throw new Exception('Não executou !');
                return NULL;
            }
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() <= 0) {
                $stmt->closeCursor();
                return NULL;
            }


            $stmt->closeCursor();
            return json_encode($linhas);
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na seleção:" . $pdoException->getMessage();
            return NULL;
        }
    }

    public function getTotalRegistros(string $string_tabela): int
    {

        try {

            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $string_tabela;--");
            if (!$stmt->execute()) {
                return 0;
            }
            $numero_registros = $stmt->fetchColumn();
            return $numero_registros;
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException);
            echo "Erro na inserção:" . $pdoException->getMessage();
            return 0;
        }
    }
}
