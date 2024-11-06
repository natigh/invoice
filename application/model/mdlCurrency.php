<?php
class mdlCurrency{

    private $idCurrency;
    private $currency;

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

    public function currency($currency){
        //crear consulta
        $sql = "SELECT * FROM currency WHERE currency = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $currency);
        $query -> execute();
        return  $query -> fetch(PDO::FETCH_ASSOC);
    }
}
?>