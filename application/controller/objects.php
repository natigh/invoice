<?php
class objects extends controller{
    private $modelO;

    public function __construct(){
        $this->modelO = $this->loadModel("mdlObject");
    }
    
    public function viewObjects(){
        if(isset($_POST['btnSubmit'])){
            $this->modelO->__SET('idObject', $_POST['idObject']);
            $this->modelO->__SET('code', $_POST['txtCode']);
            $this->modelO->__SET('object', $_POST['txtObject']);
            $this->modelO->__SET('description', $_POST['txtdescription']);
            $this->modelO->__SET('idPrice', $_POST['selPrice']);
            $this->modelO->__SET('stock', $_POST['txtStock']);
            
        }

        $objects=$this->modelO->viewObjects();
        $prices=$this->modelO->viewPrices();

        require_once APP."view/_templates/header.php";
        require_once APP."view/objects/viewObjects.php";
        require_once APP."view/_templates/footer.php";
    }

    public function registerObject(){
        //validamos si existen los atributos del modelo y los name del formulario
        if(isset($_POST['btnSubmit'])){
            $this->modelO->__SET('code', $_POST['txtCode']);
            $this->modelO->__SET('object', $_POST['txtObject']);
            $this->modelO->__SET('description', $_POST['txtdescription']);
            $this->modelO->__SET('idPrice', $_POST['selPrice']);
            $this->modelO->__SET('stock', $_POST['txtStock']);
            $this->modelO->__SET('activeO', 1);
           
            $object=$this->modelO->registerObject();
            //mandar registro
            if($object){
                $lastId=$this->modelO->viewLastId();
                $lastIdValue=null;

                foreach($lastId as $value){
                    $lastIdValue=$value['lastId'];
                }

            }
              
                header("Location: ". URL . "objects/viewObjects");
        }
                $prices=$this->modelO->viewPrices();
                require_once APP."view/_templates/header.php";
                require_once APP."view/objects/registerObject.php";
                require_once APP."view/_templates/footer.php";
    }

    //método para traer o filtrar los datos por el ID
    public function dataObject(){
        //crear la variable para controlar
        $object=$this->modelO->objectId($_POST['id']);
        echo $object;
    }

    public function viewObjectById(){
        $object=$this->modelO->objectId($_POST['idObject']);
        echo json_encode($object);
    }

    //método de cambio de estado
    public function changeStatusObject() {
        //crear la variable para controlar
        $this->modelO->changeObjectStatus($_POST['idObject']);
        
        echo 1;
    }
    
}
?>