<?php

require_once 'Crud.php';

class Banco extends Crud{

    protected $table = 'hemeroteca';
    protected $id; 
    protected $nacionalidade_recorte;
    protected $nome;
    protected $periodo_final;
    protected $periodo_inicial;
    protected $texto_imagem;


    public function setNacionlidade($nacionalidade_recorte){
        $this->nacionalidade_recorte = $nacionalidade_recorte;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setPeriodoFinal($periodo_final){
        $this->periodo_final = $periodo_final;
    }
    public function setPeriodoInicial($periodo_inicial){
        $this->periodo_inicial = $periodo_inicial;
    }
    public function setEmail($texto_imagem){
        $this->texto_imagem = $texto_imagem;
    }


    
} 