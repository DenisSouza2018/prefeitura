<?php

require_once 'Crud.php';

class Enquete extends Crud{

    protected $table = 'enquete';
    protected $titulo;
    protected $op1;
    protected $op1_qtd;
    protected $op2;
    protected $op2_qtd;
    protected $op3;
    protected $op3_qtd;
    protected $op4;
    protected $op4_qtd;
    protected $op5;
    protected $op5_qtd;
    protected $status;
    

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo($titulo){
        return $this->titulo;
    }

    public function setOp1($op1){
        $this->op1 = $op1;
    }

    public function getOp1($op1){
        return $this->op1;
    }

    public function setOp1Qtd($op1_qtd){
        $this->op1_qtd = $op1_qtd;
    }

    public function getOp1Qtd($op1_qtd){
        return $this->op1_qtd;
    }

    public function setOp2($op2){
        $this->op2 = $op2;
    }

    public function getOp2($op2){
        return $this->op2;
    }

    public function setOp2Qtd($op2_qtd){
        $this->op2_qtd = $op2_qtd;
    }

    public function getOp2Qtd($op2_qtd){
        return $this->op2_qtd;
    }

    public function setOp3($op3){
        $this->op3 = $op3;
    }

    public function getOp3($op3){
        return $this->op3;
    }

    public function setOp3Qtd($op3_qtd){
        $this->op3_qtd = $op3_qtd;
    }

    public function getOp3Qtd($op3_qtd){
        return $this->op3_qtd;
    }

    public function setOp4($op4){
        $this->op4 = $op4;
    }

    public function getOp4($op4){
        return $this->op4;
    }

    public function setOp4Qtd($op4_qtd){
        $this->op4_qtd = $op4_qtd;
    }

    public function getOp4Qtd($op4_qtd){
        return $this->op4_qtd;
    }

    public function setOp5($op5){
        $this->op5 = $op5;
    }

    public function getOp5($op5){
        return $this->op5;
    }

    public function setOp5Qtd($op5_qtd){
        $this->op5_qtd = $op5_qtd;
    }

    public function getOp5Qtd($op5_qtd){
        return $this->op5_qtd;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus($status){
        return $this->status;
    }

  

    public function insert(){
        $sql = "INSERT INTO $this->table (titulo, op1, op1_qtd, op2, op2_qtd, op3, op3_qtd, op4, op4_qtd, op5, op5_qtd, status) 
        VALUES (:titulo, :op1, :op1_qtd, :op2, :op2_qtd, :op3, :op3_qtd, :op4, :op4_qtd, :op5, :op5_qtd, :status)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':op1', $this->op1);
        $stmt->bindParam(':op1_qtd', $this->op1_qtd);
        $stmt->bindParam(':op2', $this->op2);
        $stmt->bindParam(':op2_qtd', $this->op2_qtd);
        $stmt->bindParam(':op3', $this->op3);
        $stmt->bindParam(':op3_qtd', $this->op3_qtd);
        $stmt->bindParam(':op4', $this->op4);
        $stmt->bindParam(':op4_qtd', $this->op4_qtd);
        $stmt->bindParam(':op5', $this->op5);
        $stmt->bindParam(':op5_qtd', $this->op5_qtd);
        $stmt->bindParam(':status', $this->status);
        return $stmt->execute();

        
    }

    
}