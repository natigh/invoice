<?php
class invoice extends controller{
    private $modelI;
    private $modelC;
    private $modelPe;
    private $modelS;
    private $modelU;

    public function __construct(){
        $this->modelI = $this->loadModel("mdlInvoice");
        $this->modelC = $this->loadModel("mdlCurrency");
        $this->modelPe = $this->loadModel("mdlPeople");
        $this->modelS = $this->loadModel("mdlSku");
        $this->modelU = $this->loadModel("mdlUsers");
    }

    public function registerSale(){
        //validamos si existen los atributos del modelo y los name del formulario
        if(isset($_POST['btnSubmit'])){
            /*$this->modelI->__SET('code', $_POST['txtCode']);
            $this->modelI->__SET('date', $_POST['txtDate']);
            $this->modelI->__SET('idPerson', $_POST['txtCustomerDoc']);
            $this->modelI->__SET('idUser', $_POST['txtUser']);
            $this->modelI->__SET('typeCustomer', $_POST['selTypeCustomer']);
            $this->modelI->__SET('remark', $_POST['txtPhone']);
           
            $people=$this->modelU->registerPeople();
            //mandar registro
            if($people){
                $lastId=$this->modelU->viewLastId();
                $lastIdValue=null;

                foreach($lastId as $value){
                    $lastIdValue=$value['lastId'];
                }

            }
                $this->modelU->__SET('idPerson', $lastIdValue);
                $this->modelU->__SET('username', $_POST['txtUsername']);
                $this->modelU->__SET('password', $_POST['txtPassword']);
                $this->modelU->__SET('idRol', $_POST['selRol']);
                $this->modelU->__SET('activeU', 1);

                $user =$this->modelU->registerUser();
                //$clean=$this->modelU->clean();
                header("Location: ". URL . "user/viewUsers");*/
        }

                $customerType=$this->modelI->selectTypeCustomer();
                $currency=$this->modelC->select();
                //$code=$this->modelI->getCode();
                //hacer el servicio para identificar si es compra o venta con su codigo
                
                //$buyer=$this->modelPe->select($document);
                
                require_once APP."view/_templates/header.php";
                require_once APP."view/invoices/registerSale.php";
                require_once APP."view/_templates/footer.php";
    }


}


?>