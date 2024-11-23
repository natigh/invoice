<?php

class mdlPrice{

    private $idPrice;
    private $idCurrency;
    private $value;
    private $price;

    public $db;

    public function __SET($attr, $value){
        //instanciar el attr
        $this->$attr = $value;
    }
    public  function __GET($attr){
        //retonar e instanciar
        return $this->$attr;
    }

    //crear el constructor 
    public  function __construct($db){
        $this->db = $db;
        try {
            $this->db=$db;
        }catch(PDOException $e){
            exit("error, connecting Database");
        }
    }

    public function registerPrice() {
        // Revisar esta query
        $sql="INSERT INTO price (idCurrency, value) VALUES(?,?)";

        $stm=$this->db->prepare($sql);

        $stm->bindParam(1, $this->idCurrency);
        $stm->bindParam(2, $this->value);

        $result = $stm->execute();
        return $result;
    }

    public function updatePrice(){
        $sql= $this->db->prepare("UPDATE price SET value = ? WHERE idPrice = ?");

        $sql->bindParam(1, $this->value);
        $sql->bindParam(2, $this->idPrice);
           
        $result = $sql->execute();
        return $result;
    }

    public function viewLastIdPrice(){
        $sql="SELECT MAX(idPrice) AS lastIdPrice FROM price";
        $query=$this->db->prepare($sql);
        $query->execute();
        $lastIdPrice=$query->fetchAll(PDO::FETCH_ASSOC);
        return $lastIdPrice;
    }

    public function getPriceById($idPrice){
        $sql = "SELECT * FROM price WHERE idPrice = ?";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $idPrice);

        $stm->execute();

        return $stm -> fetch(PDO::FETCH_ASSOC);
    }

}
?>