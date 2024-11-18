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
        if(isset($_POST['btnSubmit'])){
            //die(print_r($_POST));

            $this->modelI->__SET('code', $_POST['txtCodeh']);
            $this->modelI->__SET('date', $_POST['txtDate']);
            $this->modelI->__SET('dueDate', $_POST['txtDueDate']);
            $this->modelI->__SET('idPerson', $_POST['txtPersonId']);
            $this->modelI->__SET('idUser', $_POST['idUser']);
            $this->modelI->__SET('typeCustomer', $_POST['selTypeCustomer']);
            $this->modelI->__SET('remark', $_POST['txtRemark']);

            $this->modelI->__SET('typeInvoice', $_POST['txtTypeInvoice']);


            //die(print_r($this->modelI));

            $invoice=$this->modelI->registerInvoice();
           
            
            
           
            /* 
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
                 */
                header("Location: ". URL . "invoices/viewHistorySales");
        }
                require_once APP."view/_templates/header.php";
                require_once APP."view/invoices/registerSale.php";
                require_once APP."view/_templates/footer.php";
    }

    public function sales() {
        $customerType = $this->modelI->selectTypeCustomer();
        $currency = $this->modelC->select();
        $sku = $this->modelS->selectSku();
        $nextCodeType = explode('/', $_GET['url'])[1]; 
        $typeInvoice = $this->modelI->getTypeInvoice($nextCodeType); 
        $code = $this->modelI->getNextCode($nextCodeType);
        $people = $this->modelPe->selectOnlyPeople();
        
        $nextCode=0;

        foreach($code as $c){
            $nextCode=$c['code'];
        }

        $response = new stdClass();

        $response->customer_type = $customerType;
        $response->currency = $currency;
        $response->sku = $sku;
        $response->code = $nextCode + 1;
        $response->typeInvoice = $typeInvoice;
        $response->people = $people;

        echo json_encode($response);
    }

    public function purchase() {

    }
}


?>