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
            /*$this->debugVariable($_POST);
            die("DDD");*/
            $this->modelI->__SET('code', $_POST['codeInvoiceH']);
            $this->modelI->__SET('date', $_POST['todayH']);
            $this->modelI->__SET('dueDate', null);
            $this->modelI->__SET('idPerson', $_POST['idPersonH']);
            $this->modelI->__SET('idUser', $_POST['userH']);
            $this->modelI->__SET('typeCustomer', $_POST['selTypeCustomerH']);
            $this->modelI->__SET('remark', null);
            $this->modelI->__SET('typeInvoice', $_POST['typeInvoiceH']);
            $this->modelI->__SET('active', 0);
            $this->modelI->__SET('creditNote', 0);

            $invoice=$this->modelI->registerInvoice();

            $this->modelI->__SET('idInvoice', $_POST['idInvoiceH']);
            $this->modelI->updateInvoiceStatus();

            if($invoice){
                $lastIdInvoice=$this->modelI->viewLastIdInvoice();
                $lastIdValueInvoice=null;

                foreach($lastIdInvoice as $value){
                    $lastIdValueInvoice=$value['lastIdInvoice'];
                }
            }

            $productsCode = $_POST['products']['code'];
            $productsSku = $_POST['products']['sku'];
            $productsPrice = $_POST['products']['price'];
            $productsQuantity = $_POST['products']['newQuantity'];

            foreach ($productsSku as $index => $sku) {
                $this->modelP->__SET('value', $productsPrice[$index]);
                // hay que mandar el id currency que se usa para la factura
                $this->modelP->__SET('idCurrency', $_POST['selCurrencyH']);
            
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

                $skuItem = $this->modelS->getByIdandInvoiceId($sku, $_POST['idInvoiceH']);

                $newQuantity = $skuItem['stock'] + $productsQuantity[$index];

                $this->modelS->updateStock($skuItem['idSku'], $newQuantity);
            }
            
            header("Location: ". URL . "invoice/creditNote");
            
        }

        $typeInvoice = $this->modelI->getTypeInvoice("sales");
        $sales=$this->modelI->viewHistorySales($typeInvoice["idTypeInvoice"]);

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
            $this->modelI->__SET('active', 1);
            $this->modelI->__SET('creditNote', 0);

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
                /* $this->debugVariable($this->modelII); */
                $skuItem = $this->modelS->getByIdandInvoiceId($sku, $lastIdValueInvoice);
                /* $this->debugVariable($skuItem);  */
                $newQuantity = $skuItem['stock'] - $productsQuantity[$index];
                /* $this->debugVariable($newQuantity); */
                $this->modelS->updateStock($skuItem['idSku'], $newQuantity);
                /* die("dd"); */
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

    public function creditNote() {
        $typeInvoice = $this->modelI->getTypeInvoice("creditNote");
        $sales=$this->modelI->viewHistorySales($typeInvoice["idTypeInvoice"]);

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
        require_once APP."view/invoices/creditNote.php";
        require_once APP."view/_templates/footer.php";
        
    }
    

    public function viewInvoice(){
        $invoice=$this->modelI->viewInvoiceId($_GET['invoice_id']);
        $invoice['items']=$this->modelII->getItemsByIdInvoice($_GET['invoice_id']);

        //require_once APP."view/_templates/header.php";
        require_once APP."view/invoices/viewInvoice.php";
        require_once APP."view/_templates/footer.php";
    }

    

    public function viewHistorySalesById(){
        $invoice=$this->modelI->invoiceId($_POST['idInvoice']);
        echo json_encode($invoice);
    }

    public function changeStatus() {
        //crear la variable para controlar
        $this->modelI->changeInvoiceStatus($_POST['idInvoice']);
        
        echo 1;
    }

    public function viewInvoiceById(){
        $invoice=$this->modelI->invoiceId($_POST['idInvoice']);
        $invoice['items']=$this->modelII->getItemsByIdInvoice($_POST['idInvoice']);
        $typeInvoice = $this->modelI->getTypeInvoice('creditNote');
        $invoice['typeInvoice'] = $typeInvoice['idTypeInvoice'];

        echo json_encode($invoice);
    }

    public function invoiceHistorySales(){
        $invoice=$this->modelI->viewInvoiceId($_GET['invoice_id']);
        $invoice['items']=$this->modelII->getItemsByIdInvoice($_GET['invoice_id']);

        //require_once APP."view/_templates/header.php";
        require_once APP."view/invoices/viewInvoice.php";
        require_once APP."view/_templates/footer.php";
    }
}


?>