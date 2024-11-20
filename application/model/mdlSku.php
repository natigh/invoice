<?php

class mdlSku{

    private $idSku;
    private $code;
    private $sku;
    private $description;
    private $stock;
    private $idPrice;
    private $activeO;
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

    public function registerSku(){
        //crear la consulta
        $sql="INSERT INTO sku (code, sku, description, stock, idPrice, active)
         VALUES(?,?,?,?,?,?)";

        // preparar la consulta
        $stm=$this->db->prepare($sql);

        $stm->bindParam(1, $this->code);
        $stm->bindParam(2, $this->sku);
        $stm->bindParam(3, $this->description);
        $stm->bindParam(4, $this->stock);
        $stm->bindParam(5, $this->idPrice);
        $stm->bindParam(6, $this->activeO);
        
        $result=$stm->execute();
        return $result;
    }

    public function viewSku(){
        //crear la consulta
        $sql = "SELECT S.*, CONCAT('$ ', P.value,' ',C.currency) AS value, P.idPrice FROM sku AS S INNER JOIN price AS P ON P.idPrice = S.idPrice INNER JOIN currency AS C ON P.idCurrency = C.idCurrency";
        //die($sql);
        //preparar la consulta
        $stm= $this->db->prepare($sql);
        //ejecutar la consulta
        $stm->execute();
        //extraer datos
        $sku=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $sku;
    }

    public function updateSku(){
        $sql= $this->db->prepare("UPDATE sku SET code = ?, sku = ?, description = ?, stock = ? WHERE idSku = ?");

        $sql->bindParam(1, $this->code);
        $sql->bindParam(2, $this->sku);
        $sql->bindParam(3, $this->description);
        $sql->bindParam(4, $this->stock);
        $sql->bindParam(5, $this->idSku);
        //die (print_r($this));
        $result = $sql->execute();
        return $result;
    }

    public function skuId($idSku, $idPrice){
        //crear consulta
        $sql = "SELECT S.*, P.* FROM sku AS S INNER JOIN price AS P ON S.idPrice = P.idPrice WHERE S.idSku = ? AND P.idPrice = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $idSku);
        $query -> bindParam(2, $idPrice);
        $query -> execute();
        $sku = $query -> fetch(PDO::FETCH_ASSOC); 

        if($sku) $sku['idSku'] = $idSku;
        return $sku;
    }

    public function changeSkuStatus($id){
        //crear la consulta
        $sql = "UPDATE sku SET active = (CASE WHEN active = 1 THEN 0 ELSE 1 END) WHERE idSku = ?;";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $id);

        return $query -> execute();
    }

    public function viewPrices(){
        //crear la consulta
        $sql="SELECT * FROM price";
        // Preparar la consulta
        $stm = $this->db->prepare($sql);
    
        // Ejecutar la consulta
        $stm->execute();
    
        // Retornar los roles
        $price = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $price;
    }

    public function viewLastId(){
        //crear consulta
        $sql="SELECT MAX(idSku) AS lastId FROM sku";
        //prepara consulta
        $query= $this->db->prepare($sql);
        //ejecutar la consulta
        $query->execute();
        //extraer datos
        $lastId=$query->fetchAll(PDO::FETCH_ASSOC);
        return $lastId;
    }

    public function selectSku(){
        //crear la consulta
        $sql="SELECT S.idSku, S.sku, S.code, P.value FROM sku as S INNER JOIN price AS P ON S.idPrice = P.idPrice WHERE S.active = 1";
        // Preparar la consulta
        $stm = $this->db->prepare($sql);
    
        // Ejecutar la consulta
        $stm->execute();
    
        // Retornar los roles
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>