<?php

class mdlInvoice {

    private $idInvoice;
    private $code;
    private $date;
    private $idPerson;
    private $idUser;
    private $typeCustomer;
    private $remark;

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

    public function selectTypeCustomer(){
        //crear la consulta
        $sql="SELECT * FROM typecustomer";
        // Preparar la consulta
        $stm = $this->db->prepare($sql);
    
        // Ejecutar la consulta
        $stm->execute();
    
        // Retornar los roles
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>