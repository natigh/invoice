<?php

class mdlPrice{

    private $idPrice;
    private $idCurrency;
    private $value;
    private $idSku;

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

    public function registerPrice($idSku, $idCurrency) {
        $this->__SET('idSku', $idSku);
        $this->__SET('value', $_POST['txtPrice']);
        $this->__SET('idCurrency', $idCurrency);

        $sql="INSERT INTO price (idCurrency, value, idSku) VALUES(?,?,?)";

        $stm=$this->db->prepare($sql);

        $stm->bindParam(1, $this->idCurrency);
        $stm->bindParam(2, $this->value);
        $stm->bindParam(3, $this->idSku);

        $result = $stm->execute();
        return $result;
    }

    public function updatePrice(){
        $sql= $this->db->prepare("UPDATE price SET value = ? WHERE idPrice = ? AND idSku = ?");

        $sql->bindParam(1, $this->value);
        $sql->bindParam(2, $this->idPrice);
        $sql->bindParam(3, $this->idSku);
           
        $result = $sql->execute();
        return $result;
    }


}
?>