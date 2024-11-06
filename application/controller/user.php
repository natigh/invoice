<?php
//crear el objeto y heredar
class user extends controller{
    //atributos
    private $modelU;
    //private $modelP;

    //el controlador requiere del constructor
    public function __construct(){
        //isntanciar los modelos que se lleguen a necesitar
     $this-> modelU = $this->loadModel("mdlUsers");
     //$this-> modelP = $this->loadModel("mdlPeople");
    }

    //metodo para ver todos los usuarios registrados
    public function viewUsers(){
        if(isset($_POST['btnSubmit'])){
            $this->modelU->__SET('idPerson', $_POST['idPerson']);
            $this->modelU->__SET('typedocument', $_POST['selDocument']);
            $this->modelU->__SET('document', $_POST['txtDocument']);
            $this->modelU->__SET('name', $_POST['txtNames']);
            $this->modelU->__SET('lastname', $_POST['txtLastname']);
            $this->modelU->__SET('phone', $_POST['txtPhone']);
            $this->modelU->__SET('email', $_POST['txtEmail']);
            $this->modelU->__SET('address', $_POST['txtAddress']);
            
            $edit=$this->modelU->updatePeople();
            if(isset($_POST['txtUsername']) && isset($_POST['txtPassword']) && isset($_POST['selRol'])){
                $this->modelU->__SET('username', $_POST['txtUsername']);
                $this->modelU->__SET('password', $_POST['txtPassword']);
                $this->modelU->__SET('idRol', $_POST['selRol']);
                
                if($_POST['idUser'] == null){
                    $this->modelU->__SET('activeU', 1);
                    $this->modelU->registerUser(); 
                }else{
                    $this->modelU->__SET('idUser', $_POST['idUser']);
                    $this->modelU->updateUser();
                       
                }
            }
        }
        
        //para cargar los multiplechoose
        $users=$this->modelU->viewUsers();
        $documentType=$this->modelU->viewDocumentType();
        $roles=$this->modelU->viewRoles();
        
        require_once APP."view/_templates/header.php";
        require_once APP."view/users/viewUsers.php";
        require_once APP."view/_templates/footer.php";
    }

    //metodo para registrar usuarios
    public function registerUser(){
        //validamos si existen los atributos del modelo y los name del formulario
        if(isset($_POST['btnSubmit'])){
            $this->modelU->__SET('typedocument', $_POST['selDocument']);
            $this->modelU->__SET('document', $_POST['txtDocument']);
            $this->modelU->__SET('name', $_POST['txtNames']);
            $this->modelU->__SET('lastname', $_POST['txtLastNames']);
            $this->modelU->__SET('birthdate', $_POST['txtBirthDate']);
            $this->modelU->__SET('phone', $_POST['txtPhone']);
            $this->modelU->__SET('email', $_POST['txtEmail']);
            $this->modelU->__SET('address', $_POST['txtAddress']);
            $this->modelU->__SET('activeP', 1);
           
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
                header("Location: ". URL . "user/viewUsers");
        }
                $roles=$this->modelU->viewRoles();
                $documentType=$this->modelU->viewDocumentType();
                require_once APP."view/_templates/header.php";
                require_once APP."view/users/registerUser.php";
                require_once APP."view/_templates/footer.php";
    }

    //método para cerrar sesión
    public function logOut(){
        if(isset($_SESSION['SESSION_START'])){
            session_destroy();
        }
        header("Location:" . URL . "home/index");
    }

    //método para traer o filtrar los datos por el ID
    public function dataUser(){
        //crear la variable para controlar
        // $user =  $this -> modelU -> userId($_POST['id']);
        $user=$_POST['id'];
        echo $user;
    }

    public function viewUserById(){
        $person=$this->modelU->userId($_POST['idPerson']);
        echo json_encode($person);
    }

    //método de cambio de estado
    public function changeStatus() {
        //crear la variable para controlar
        $this->modelU->changePersonStatus($_POST['idPerson']);
        $this->modelU->changeUserStatus($_POST['idUser']);
        
        echo 1;
    }

    

    }
    ?>