<?php

class mdlObject{

    private $idObject;
    private $code;
    private $object;
    private $description;
    private $idPrice;
    private $stock;
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

    public function registerObject(){
        //crear la consulta
        $sql="INSERT INTO sku (code, object, description, idPrice, stock, active)
         VALUES(?,?,?,?,?,?)";

        //estado del usuario siempre queda activo no hace falta mandarlo desde  el formulario

        // preparar la consulta
        $stm=$this->db->prepare($sql);

        // ejecutar la consulta
        // bindParam se utiliza para preparar y asociar valores a los parámetros de una consulta SQL, lo que ayuda a prevenir ataques de inyección SQL y permite una ejecución más eficiente de las consultas.
        $stm->bindParam(1, $this->code);
        $stm->bindParam(2, $this->object);
        $stm->bindParam(3, $this->description);
        $stm->bindParam(4, $this->idPrice);
        $stm->bindParam(5, $this->stock);
        $stm->bindParam(6, $this->activeO);
        // enlazar parámetros a una consulta SQL preparada. el número 1 indica el primer parámetro en la consulta SQL que se está preparando, $this->document es el valor que se va a enlazar a ese parámetro.
        // ejecutar la consulta
        $result=$stm->execute();
        return $result;
    }

    public function viewObjects(){
        //crear la consulta
        $sql = "SELECT 
                    S.idObject,
                    S.code, 
                    S.object, 
                    S.description, 
                    S.stock, 
                    S.active, 
                    P.idPrice
                FROM sku AS S
                INNER JOIN price AS P 
                ON S.idPrice = P.idPrice;";
        //die($sql);
        //preparar la consulta
        $stm= $this->db->prepare($sql);
        //ejecutar la consulta
        $stm->execute();
        //extraer datos
        $object=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $object;
    }

    public function updateObject(){
        $sql= $this->db->prepare("UPDATE sku SET object = ?, description = ?, idPrice = ?, stock = ? WHERE idObject = ?");

        $sql->bindParam(1, $this->object);
        $sql->bindParam(2, $this->description);
        $sql->bindParam(3, $this->idPrice);
        $sql->bindParam(4, $this->stock);
        $sql->bindParam(5, $this->idObject);
           
        $result = $sql->execute();
        return $result;
    }

    public function objectId($id){
        //crear consulta
        $sql = "SELECT * FROM sku AS O INNER JOIN price AS U P O.idPrice = P.idPrice WHERE O.idObject = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        $object = $query -> fetch(PDO::FETCH_ASSOC); 

        if($object) $object['idObject'] = $id;
        return $object;
    }

    public function changeObjectStatus($id){
        //crear la consulta
        $sql = "UPDATE sku SET active = (CASE WHEN active = 1 THEN 0 ELSE 1 END) WHERE idObject = ?;";

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
        $sql="SELECT MAX(idObject) AS lastId FROM sku";
        //prepara consulta
        $query= $this->db->prepare($sql);
        //ejecutar la consulta
        $query->execute();
        //extraer datos
        $lastId=$query->fetchAll(PDO::FETCH_ASSOC);
        return $lastId;
    }
}
?>