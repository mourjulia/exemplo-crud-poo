<?php 
namespace ExemplosCrud;

use Exception;
use PDO;
use Throwable;

abstract class ConexaoBD
{
    private static PDO $conexao;
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas";

    public static function getConexao():PDO
    {
        if(!isset( self::$conexao )){
            try {
                self::$conexao = new PDO(
                    "mysql:host=".self::$servidor. ";dbname=".self::$banco. ";charset=utf8",
                    self::$usuario, self::$senha
                );
            
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Throwable $erro) {
                // Registrar a exceção em um arquivo de log/texto interno

                //lançar uma mensagem de erro genérica sem detalhes do banco/sistema
                throw new Exception( "Erro ao concetar no bando de dados!");
            }
        }

        return self::$conexao;
    }
}
?>