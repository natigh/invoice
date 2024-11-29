<?php
//hay que crear primero la herencia si es necesaria
include_once "mdlPeople.php";

//crear la clase con la herencia
    //traer  los metodos get y set de la clase padre
class mdlUsers extends mdlPeople{
    //crear atributos
    private $idUser;
    private $username;
    private $password;
    private $activeU;
    private $idRol;

    //traer  los metodos get y set de la clase padre
    //solo se traen los metodos costruc set y get cuando no tiene herencia
    public function __SET($attr, $value){
        //instanciar el attr
        $this->$attr = $value;
    }
    public  function __GET($attr){
        //retonar e instanciar
        return $this->$attr;
    }

    //metodo para validar el ingreso 
    public function validateUser(){
        //crear consulta  para validar el ingreso
        $sql = "SELECT P.document, P.name, P.lastname, U.idUser, U.username, U.PASSWORD, R.rol FROM person AS P INNER JOIN users AS U ON P.idPerson = U.idPerson INNER JOIN rol AS R ON U.idRol = R.idRol WHERE U.username = ? AND U.PASSWORD = ?;";
        
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->username);
        $stm->bindParam(2, $this->password);
        $stm->execute();
        //respuesta donde se trae todo lo asocicado
        $user=$stm->fetch(PDO::FETCH_ASSOC);
        //retornar el resultado
        
        return $user;
    }
    //metodo para ver los datos de los usuarios registrados 
     //metodo para traer personas registradas
     public function viewUsers(){
        //crear la consulta
        $sql="SELECT P.idPerson, P.name, P.lastname, TD.typeDocument, P.document, P.active, U.username, U.idUser, R.rol FROM person AS P
        LEFT JOIN users AS U ON P.idPerson = U.idPerson LEFT JOIN rol AS R ON U.idRol = R.idRol INNER JOIN typedocument AS TD ON P.typedocument = TD.idTypeDocument";
        //preparar la consulta
        $stm= $this->db->prepare($sql);
        //ejecutar la consulta
        $stm->execute();
        //extraer datos
        $user=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
    

    public function viewRoles(){
        //crear la consulta
        $sql="SELECT * FROM rol";
        // Preparar la consulta
        $stm = $this->db->prepare($sql);
    
        // Ejecutar la consulta
        $stm->execute();
    
        // Retornar los roles
        $roles = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $roles;
    }
    //metodo para registrar usuarios
    public function registerUser(){
        //crear la consulta
        $sql="INSERT INTO users (username, PASSWORD, idRol, idPerson, active)
         VALUES(?,?,?,?,?)";

        //estado del usuario siempre queda activo no hace falta mandarlo desde  el formulario

        // preparar la consulta
        $stm=$this->db->prepare($sql);

        // ejecutar la consulta
        // bindParam se utiliza para preparar y asociar valores a los parámetros de una consulta SQL, lo que ayuda a prevenir ataques de inyección SQL y permite una ejecución más eficiente de las consultas.
        $stm->bindParam(1, $this->username);
        $stm->bindParam(2, $this->password);
        $stm->bindParam(3, $this->idRol);
        $stm->bindParam(4, $this->idPerson);
        $stm->bindParam(5, $this->activeU);
        // enlazar parámetros a una consulta SQL preparada. el número 1 indica el primer parámetro en la consulta SQL que se está preparando, $this->document es el valor que se va a enlazar a ese parámetro.
        // ejecutar la consulta
        $result=$stm->execute();
        return $result;
    }

    public function updateUser(){
        $sql= $this->db->prepare("UPDATE users SET username = ?, PASSWORD = ?, idRol = ?, idPerson = ? WHERE idUser = ?");

        $sql->bindParam(1, $this->username);
        $sql->bindParam(2, $this->password);
        $sql->bindParam(3, $this->idRol);
        $sql->bindParam(4, $this->idPerson);
        $sql->bindParam(5, $this->idUser);
           
        $result = $sql->execute();
        return $result;
    } 

    //método para traer los datos o filtrarlos por el id del usuario
    public function userId($id){
        //crear consulta
        $sql = "SELECT * FROM person AS P LEFT JOIN users AS U ON P.idPerson = U.idPerson LEFT JOIN rol AS R ON R.idRol = U.idRol WHERE P.idPerson = ?;";

        //preparar la consulta y ejecutarla
        $query = $this -> db -> prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        $person = $query -> fetch(PDO::FETCH_ASSOC);

        if($person) $person['idPerson'] = $id; 

        return $person;
    }

    //Método para cambiar el estado
    public function changeUserStatus($id){
        //crear la consulta
        $sql = "UPDATE users SET active = (CASE WHEN active = 1 THEN 0 ELSE 1 END) WHERE idUser = ?;";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $id);

        return $query -> execute();
    }
}
?>