<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    private $modelU;
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function __construct(){
        //instanciar el o los modelos que se lleguen a necesitar
        $this->modelU = $this->loadModel("mdlUsers");
    }

    public function index(){

        $error = false;
        
        if(isset($_POST['btnLogin'])){
            $this->modelU->__SET('username', $_POST['txtUsername']);
            $this->modelU->__SET('password', $_POST['txtPassword']);
            //vamos a crear un arreglo que luego se llenara con los datos del usuario 
            $_POST=[];

            //die($this->modelU);
            $validate =$this->modelU->validateUser();

            //condicional para usar el sweetalert
            if($validate == true){
                $_SESSION['alert'] = "Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Done',
                showConfirmButton: false,
                timer: 1500})";

                 //revisar la validacion de los datos
                if($validate==true){
                    // var_dump($validate);
                    // exit;
                    //activamos la sesion
                    $_SESSION['SESSION_START'] = true;
                    $error=false;

                    $_SESSION ['name']=$validate['name'];
                    $_SESSION ['lastname']=$validate['lastname'];
                    $_SESSION ['idUser']=$validate['idUser'];
                    $_SESSION ['username']=$validate['username'];
                    $_SESSION ['rol']=$validate['rol'];

                    header("Location:".URL."sku/viewSku");
                }else{
                    $error=true;
                }
            }else{
                header("Location:".URL."user/index"); 
            }
        }
        
        // load views
        //require APP . 'view/home/index.php';
        require APP . 'view/users/login.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
}
