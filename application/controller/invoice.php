<?php
class invoice extends controller{
    private $modelI;
    private $modelC;
    private $modelPe;
    private $modelS;
    private $modelU;
    private $modelII;
    private $modelP;

    public function __construct(){
        $this->modelI = $this->loadModel("mdlInvoice");
        $this->modelC = $this->loadModel("mdlCurrency");
        $this->modelPe = $this->loadModel("mdlPeople");
        $this->modelS = $this->loadModel("mdlSku");
        $this->modelU = $this->loadModel("mdlUsers");
        $this->modelII = $this->loadModel("mdlItemInvoice");
        $this->modelP = $this->loadModel("mdlPrice");
    }

    public function viewHistorySales(){
        if(isset($_POST['btnSubmit'])){
            //die(print_r($_POST));
            $this->modelI->__SET('remarkH', $_POST['txtRemarkH']);
            $this->modelI->__SET('idInvoice', $_POST['idInvoice']);

            $editRemarkH=$this->modelI->updateRemarkH();
        }

        $sales=$this->modelI->viewHistorySales();

        $currencyVal = "";

        foreach($sales as &$sale){
            $items=$this->modelII->getItemsByIdInvoice($sale['idInvoice']);

            $total = 0;

            foreach($items as $item){
                $price=$this->modelP->getPriceById($item['idPrice']);
                $this->modelC->__SET('idCurrency', $price['idCurrency']);

                $currency = $this->modelC->getById();
                $currencyVal = $currency['currency'];

                $subtotal=$item['quantity']*$price['value'];
                $total += $subtotal;

            }

            $grandTotal = $total*1.19;

            if($currencyVal == "USD") {
                $grandTotal /= 4200;
            }

            $sale['grandTotal'] = "$ ".number_format($grandTotal, 2, ",", "."). " ".$currencyVal;
        }

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

            if($invoice){
                $lastIdInvoice=$this->modelI->viewLastIdInvoice();
                $lastIdValueInvoice=null;

                foreach($lastIdInvoice as $value){
                    $lastIdValueInvoice=$value['lastIdInvoice'];
                }
            }

            $productsCode = $_POST['products']['code'];
            $productsSku = $_POST['products']['sku'];
            $productsQuantity = $_POST['products']['quantity'];
            $productsPrice = $_POST['products']['price'];

            foreach ($productsSku as $index => $sku) {
                $this->modelP->__SET('value', $productsPrice[$index]);
                $this->modelP->__SET('idCurrency', $_POST['selCurrency']);
                
            
                $price=$this->modelP->registerPrice();

                if($price){
                    $lastIdPrice=$this->modelP->viewLastIdPrice();
                    $lastIdValue=null;

                    foreach($lastIdPrice as $value){
                        $lastIdValue=$value['lastIdPrice'];
                    }
                }

                $this->modelII->__SET('code',$productsCode[$index]);
                $this->modelII->__SET('idSku',$sku);
                $this->modelII->__SET('quantity',$productsQuantity[$index]);
                $this->modelII->__SET('idPrice',$lastIdValue);
                $this->modelII->__SET('idInvoice',$lastIdValueInvoice);
                
                $this->modelII->registerItemInvoice();
            }
            
                header("Location: ". URL . "invoice/viewHistorySales");
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