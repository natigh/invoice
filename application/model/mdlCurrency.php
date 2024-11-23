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

    public function getById() {
        $sql = "SELECT * FROM currency WHERE idCurrency = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $this->idCurrency);
        $query -> execute();
        return  $query -> fetch(PDO::FETCH_ASSOC);
    }

    public function currency($currency){
        $sql = "SELECT * FROM currency WHERE currency = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $currency);
        $query -> execute();
        return  $query -> fetch(PDO::FETCH_ASSOC);
    }

    public function select() {
        $sql = "SELECT idCurrency, currency FROM currency";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>