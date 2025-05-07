<?php
namespace ExemploCrud\Services;

use PDO;
use Throwable;
use Exception;

use ExemploCrud\Database\conexaoBD;


final class FabricanteServicos {
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = ConexaoBD::getConexao();
    }

    public function listarTodos():array {
        $sql = "SELECT * FROM fabricantes ORDER BY nome";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $erro) {
            throw new Exceprion ("Erro ao carregar fabricantes:".$erro->getMessage());
        }   
    }
}