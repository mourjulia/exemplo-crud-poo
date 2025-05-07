<?php
namespace ExemploCrud;

final class Fabricante {
    private ?int $id; // null | int
    private string $nome;

    public function __construct(string $nome, ?int $id = null)
    {
        $this->setNome($nome);
        $this->setId($id);
        $this->validar();
    }

    private function validar():void
    {
        if(empty($this->nome)){
            throw new InvalidArgumentException("Nome é obrigatório");
        }
    }
}
