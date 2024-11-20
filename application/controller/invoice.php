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

    public function viewHistorySales(){
        if(isset($_POST['btnSubmit'])){
            //die(print_r($_POST));
            $this->modelI->__SET('remarkH', $_POST['txtRemarkH']);
            $this->modelI->__SET('idInvoice', $_POST['idInvoice']);

            $editRemarkH=$this->modelI->updateRemarkH();
        }

        $sales=$this->modelI->viewHistorySales();

        require_once APP."view/_templates/header.php";
        require_once APP."view/invoices/viewHistorySales.php";
        require_once APP."view/_templates/footer.php";
        
    }

    public function registerSale(){
        if(isset($_POST['btnSubmit'])){
            $this->modelI->__SET('code', $_POST['txtCodeh']);
            $this->modelI->__SET('date', $_POST['txtDate']);
            $this->modelI->__SET('dueDate', $_POST['txtDueDate']);
            $this->modelI->__SET('idPerson', $_POST['txtPersonId']);
            $this->modelI->__SET('idUser', $_POST['idUser']);
            $this->modelI->__SET('typeCustomer', $_POST['selTypeCustomer']);
            $this->modelI->__SET('remark', $_POST['txtRemark']);
            $this->modelI->__SET('typeInvoice', $_POST['txtTypeInvoice']);

            //descomentar para probar
            $invoice=$this->modelI->registerInvoice();

            $productsCode = $_POST['products']['code'];
            $productsSku = $_POST['products']['sku'];
            $productsQuantity = $_POST['products']['quantity'];
            $productsPrice = $_POST['products']['price'];

            foreach ($productsSku as $index => $sku) {
                /*echo '<pre>';
                print_r("CODE: ".$productsCode[$index]." SKU: ".$sku." QUANTITY: ".$productsQuantity[$index]. " PRICE: ". $productsPrice[$index]);
                echo '</pre>';*/
                $this->debugVariable("CODE: ".$productsCode[$index]." SKU: ".$sku." QUANTITY: ".$productsQuantity[$index]. " PRICE: ". $productsPrice[$index]);
                // Creación del modelo de item invoice para guardar los items de la factura.
                // hacer el SET de los datos en los atributos de la clase de item invoice (no olvidarse el id de invoice del registro previo)
                // una vez que tenemos todos los datos de un item, crear el método en el modelo para registrarlos
            }

            //die("ME MORI -> ADIOS");
            
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

    public function viewHistorySalesById(){
        $invoice=$this->modelI->invoiceId($_POST['idInvoice']);
        echo json_encode($invoice);
    }
}


?>