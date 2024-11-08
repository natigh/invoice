<?php
//crear el primer objeto del modelo 
class mdlPeople{
    //atributos
    public $idPerson;
    public $document;
    public $idTypeDocument;
    public $names;
    public $lastname;
    public $phone;
    public $address;
    public $email;
    public $birthDate;
    public $activeP;
    public $db;

    //metodo para setear o fijar datos
    public function __SET($attr, $value){
        //instanciar el attr
        $this->$attr = $value;
    }
    //se utiliza para obtener
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
    //metodo para traer personas registradas
    public function viewPeople(){
        //crear la consulta
        $sql="SELECT * FROM person";
        //preparar la consulta
        $query= $this->db->prepare($sql);
        //ejecutar la consulta
        $query->execute();
        //extraer datos
        $people=$query->fetchAll(PDO::FETCH_ASSOC);
        return $people;
    }

    public function changePersonStatus($id){
        //crear la consulta
        $sql = "UPDATE person SET active = (CASE WHEN active = 1 THEN 0 ELSE 1 END) WHERE idPerson = ?";

        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $id);

        return $query -> execute();
    }

    //metodo para traer todos los tipos de documentos
    public function viewDocumentType(){
        //crear la consulta
        $sql="SELECT * FROM typedocument";
        //preparar la consulta
        $query= $this->db->prepare($sql);
        //ejecutar la consulta
        $query->execute();
        // extraer datos
        $typedocument=$query->fetchAll(PDO::FETCH_ASSOC);
        return $typedocument;
    }

    //metodo para traer el ultimo id registrado
    public function viewLastId(){
        //crear consulta
        $sql="SELECT MAX(idPerson) AS lastId FROM person";
        //prepara consulta
        $query= $this->db->prepare($sql);
        //ejecutar la consulta
        $query->execute();
        //extraer datos
        $lastId=$query->fetchAll(PDO::FETCH_ASSOC);
        return $lastId;
    }
    //metodo para hacer el registro de personas
    public function registerPeople(){
        //crear la consulta
        $sql="INSERT INTO person (name, lastname, typedocument, document, phone, Address, email, birthdate, active)
        VALUES(?,?,?,?,?,?,?,?,?)";
        // preparar la consulta
        $stm=$this->db->prepare($sql);

        // ejecutar la consulta
        // bindParam se utiliza para preparar y asociar valores a los parámetros de una consulta SQL, lo que ayuda a prevenir ataques de inyección SQL y permite una ejecución más eficiente de las consultas.
        $stm->bindParam(1, $this->name);
        $stm->bindParam(2, $this->lastname);
        $stm->bindParam(3, $this->typedocument);
        $stm->bindParam(4, $this->document);
        $stm->bindParam(5, $this->phone);
        $stm->bindParam(6, $this->address);
        $stm->bindParam(7, $this->email);
        $stm->bindParam(8, $this->birthdate);
        $stm->bindParam(9, $this->activeP);
        //enlazar parámetros a una consulta SQL preparada. el número 1 indica el primer parámetro en la consulta SQL que se está preparando, $this->document es el valor que se va a enlazar a ese parámetro.
        //  ejecutar la consulta
        $result=$stm->execute();
        return $result;
    }

     public function updatePeople(){
        $sql= $this->db->prepare("UPDATE person SET typeDocument = ?, document = ?, name = ?,lastname = ?, email = ?, phone = ?, Address = ? WHERE idPerson = ?");

        $sql->bindParam(1, $this->typedocument);
        $sql->bindParam(2, $this->document);
        $sql->bindParam(3, $this->name);
        $sql->bindParam(4, $this->lastname);
        $sql->bindParam(5, $this->email);
        $sql->bindParam(6, $this->phone);
        $sql->bindParam(7, $this->address);
        $sql->bindParam(8, $this->idPerson);
           
        $result = $sql->execute();
        return $result;
    } 

    public function select($document) {
        $sql = "SELECT idPerson, CONCAT(name,' ',lastname) AS fullname FROM person WHERE document = ?;";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $document);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>