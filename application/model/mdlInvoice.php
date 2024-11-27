<?php

class mdlInvoice {

    private $idInvoice;
    private $code;
    private $date;
    private $dueDate;
    private $customerDoc;
    private $idUser;
    private $idPerson;
    private $typeCustomer;
    private $typeInvoice;
    private $remark;
    private $remarkH;
    private $grandTotal;
    private $active;
    private $creditNote;

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

    public function getNextCode($code) {
        $sql = "SELECT MAX(I.code) code FROM invoice AS I INNER JOIN typeInvoice AS TI ON I.typeInvoice = TI.idTypeInvoice WHERE TI.typeInvoice = ?";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $code);

        $stm->execute();

        $lastCode = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $lastCode;
    }

    public function registerInvoice(){
        $sql="INSERT INTO invoice (code, date, dueDate, idPerson, idUser, typeCustomer, typeInvoice, remark, active, creditNote)
         VALUES(?,?,?,?,?,?,?,?,?,?)";

        $stm=$this->db->prepare($sql);

        $stm->bindParam(1, $this->code);
        $stm->bindParam(2, $this->date);
        $stm->bindParam(3, $this->dueDate);
        $stm->bindParam(4, $this->idPerson);
        $stm->bindParam(5, $this->idUser);
        $stm->bindParam(6, $this->typeCustomer);
        $stm->bindParam(7, $this->typeInvoice);
        $stm->bindParam(8, $this->remark);
        $stm->bindParam(9, $this->active);
        $stm->bindParam(10, $this->creditNote);
       
        $result=$stm->execute();
        return $result;
    
    }

    public function getTypeInvoice($type){
        $sql="SELECT * FROM typeinvoice WHERE typeInvoice = ?";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $type);

        $stm->execute();

        return $stm -> fetch(PDO::FETCH_ASSOC);
    }

    public function viewHistorySales($idTypeInvoice){
        $sql = "SELECT I.*, CONCAT(P.name, ' ', P.lastname) AS 'Customer Name',  P.document AS 'Customer Document', U.username AS 'user' FROM invoice AS I INNER JOIN person AS P ON P.idPerson = I.idPerson INNER JOIN users AS U ON U.idUser = I.idUser WHERE I.typeInvoice = ?";

        $stm= $this->db->prepare($sql);
        $stm -> bindParam(1, $idTypeInvoice);
        $stm->execute();
        $sales=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $sales;
    }

    /* public function updateRemarkH(){
        $sql= $this->db->prepare("UPDATE invoice SET remarkH = ? WHERE idInvoice = ?");

        $sql->bindParam(1, $this->remarkH);
        $sql->bindParam(2, $this->idInvoice);
        $result = $sql->execute();
        return $result;
    } */

    public function invoiceId($idInvoice){
        $sql = "SELECT I.*, P.document, CONCAT(P.name, ' ', P.lastname) AS 'name' FROM invoice AS I INNER JOIN person AS P ON I.idPerson = P.idPerson WHERE I.idInvoice = ?;";

        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $idInvoice);
        $query -> execute();
        $invoice = $query -> fetch(PDO::FETCH_ASSOC); 

        if($invoice) $invoice['idInvoice'] = $idInvoice;
        return $invoice;
    }

    public function viewLastIdInvoice(){
        $sql="SELECT MAX(idInvoice) AS lastIdInvoice FROM invoice";
        $query=$this->db->prepare($sql);
        $query->execute();
        $lastIdInvoice=$query->fetchAll(PDO::FETCH_ASSOC);
        return $lastIdInvoice;
    }

    public function changeInvoiceStatus($id){
        //crear la consulta
        $sql = "UPDATE invoice SET active = (CASE WHEN active = 1 THEN 0 ELSE 1 END), creditNote = (CASE WHEN creditNote = 0 THEN 1 ELSE 0 END) WHERE idInvoice = ?;";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $id);

        return $query -> execute();
    }

    public function updateInvoiceStatus(){
        $sql= $this->db->prepare("UPDATE invoice SET active = ?, creditNote = ? WHERE idInvoice = ?");

        $sql->bindParam(1, $this->active);
        $sql->bindParam(2, $this->creditNote);
        $sql->bindParam(3, $this->idInvoice);
        
        $result = $sql->execute();
        return $result;
    }

}
?>