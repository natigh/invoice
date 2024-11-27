<?php
class mdlItemInvoice {
    private $idItemInvoice;
    private $code;
    private $idSku;
    private $idPrice;
    private $quantity;
    private $idInvoice;
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

    public function registerItemInvoice(){
        $sql = "INSERT INTO iteminvoice (code, idSku, idPrice, quantity, idInvoice) VALUES(?,?,?,?,?)";

        $stm=$this->db->prepare($sql);

        $stm->bindParam(1, $this->code);
        $stm->bindParam(2, $this->idSku);
        $stm->bindParam(3, $this->idPrice);
        $stm->bindParam(4, $this->quantity);
        $stm->bindParam(5, $this->idInvoice);

        $result=$stm->execute();
        return $result;
    }

    public function getItemsByIdInvoice($idInvoice){
        $sql = "SELECT II.*, S.sku, P.value, P.idCurrency FROM iteminvoice AS II INNER JOIN sku AS S ON II.idSku = S.idSku INNER JOIN price AS P ON II.idPrice = P.idPrice WHERE idInvoice = ?";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $idInvoice);

        $stm->execute();

        return $stm -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>