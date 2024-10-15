<?php

class Veiculo {
    private $conexao;
    private $id;
    private $placa;
    private $modelo;
    private $cor;
    private $tipoVeiculo;
   

    public function __construct($db) {
        $this->conexao = $db;
       
    }
    public function setplaca($placa){
        $this->placa = $placa;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function setTipoVeiculo($tipoVeiculo){
        $this->tipoVeiculo = $tipoVeiculo;
    }
    
    public function create() {
        $query = "INSERT INTO veiculo SET placa=:placa, modelo=:modelo, cor=:cor, tipoVeiculo=:tipoVeiculo";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":cor", $this->cor);
        $stmt->bindParam(":tipoVeiculo", $this->tipoVeiculo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM veiculo";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function delete() {
            $query = "DELETE FROM veiculo WHERE id=:id";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
    } 


    public function update() {
        $query = "UPDATE veiculo SET placa=:placa, modelo=:modelo, cor=:cor, tipoVeiculo=:tipoVeiculo WHERE id=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":cor", $this->cor);
        $stmt->bindParam(":tipoVeiculo", $this->tipoVeiculo);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

   


    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function getModelo($modelo){
       return $this->modelo;
    }

    public function consultar(){
        $query = "SELECT * FROM veiculo WHERE id=:id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
         return $stmt;
    }
}

?>
