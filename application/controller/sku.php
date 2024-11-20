<?php
class sku extends controller{
    private $modelS;
    private $modelP;
    private $modelC;

    public function __construct(){
        $this->modelS = $this->loadModel("mdlSku");
        $this->modelP = $this->loadModel("mdlPrice");
        $this->modelC = $this->loadModel("mdlCurrency");
    }
    
    public function viewSku(){
        if(isset($_POST['btnSubmit'])){
            
            $this->modelS->__SET('idSku', $_POST['idSku']);
            $this->modelS->__SET('code', $_POST['txtCode']);
            $this->modelS->__SET('sku', $_POST['txtSku']);
            $this->modelS->__SET('description', $_POST['txtdescription']);
            $this->modelS->__SET('stock', $_POST['txtStock']);

            $this->modelS->updateSku();
            
            if(isset($_POST['txtPrice'])){
                $this->modelP->__SET('value', $_POST['txtPrice']);
                $this->modelP->__SET('idPrice', $_POST['idPrice']);
                $this->modelP->__SET('idSku', $_POST['idSku']);

                $this->modelP->updatePrice();
            }   
        }

        $sku=$this->modelS->viewSku();
        $prices=$this->modelS->viewPrices();

        require_once APP."view/_templates/header.php";
        require_once APP."view/sku/viewSku.php";
        require_once APP."view/_templates/footer.php";
    }

    public function registerSku(){
        //validamos si existen los atributos del modelo y los name del formulario
        if(isset($_POST['btnSubmit'])){
            $currency=$this->modelC->currency('COP');
            
            $this->modelP->__SET('value', $_POST['txtPrice']);
            $this->modelP->__SET('idCurrency', $currency['idCurrency']);
            
            $price=$this->modelP->registerPrice();
            
            if($price){
                $lastIdPrice=$this->modelP->viewLastIdPrice();
                $lastIdValue=null;

                foreach($lastIdPrice as $value){
                    $lastIdValue=$value['lastIdPrice'];
                }
            }

            $this->modelS->__SET('code', $_POST['txtCode']);
            $this->modelS->__SET('sku', $_POST['txtSku']);
            $this->modelS->__SET('description', $_POST['txtDescription']);
            $this->modelS->__SET('stock', $_POST['txtStock']);
            $this->modelS->__SET('idPrice', $lastIdValue);
            $this->modelS->__SET('activeO', 1);

            // 1. Primero registramos el precio
            // 2. Extraemos el id de precio en una variable
            // 3. Seteamos el id de precio en el modelo de sku
            // 4. Registramos el sku

            $this->modelS->registerSku();

            header("Location: ". URL . "sku/viewSku");
        }
            require_once APP."view/_templates/header.php";
            require_once APP."view/sku/registerSku.php";
            require_once APP."view/_templates/footer.php";
    }

    //método para traer o filtrar los datos por el ID
    public function dataSku(){
        //crear la variable para controlar
        $sku=$this->modelS->skuId($_POST['id']);
        echo $sku;
    }

    public function viewSkuById(){
        $sku=$this->modelS->skuId($_POST['idSku'], $_POST['idPrice']);
        echo json_encode($sku);
    }

    //método de cambio de estado
    public function changeStatusSku() {
        //crear la variable para controlar
        $this->modelS->changeSkuStatus($_POST['idSku']);
        
        echo 1;
    }
}

?>