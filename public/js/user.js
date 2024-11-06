//función de js para traer el id
function changeStatus(idPerson, idUser){
    // alert(id);}
    //Swal es la abreviatura de Sweealert - simpre la S en mayúscula
    //fire es lo mismo que ready, start
    Swal.fire({
        title: "Would you like to Change Status?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Change It"
    }).then((result)=>{
        if(result.isConfirmed){
            Swal.fire({
                position: "Center",
                icon: "success",
                title: "Status Changed",
                confirmButtonText: "OK",
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        type: "post",
                        //llamar la constante creada en header con el enrutamiento
                        url: url + "user/changeStatus",
                        data: { idPerson, idUser }
                    }).done(function(result){
                        console.log("DONE? : ", result);
                        window.location.href = url + "user/viewUsers"
                        window.location.reload()
                    }).fail(function(error){
                        console.log("ERROR? : ", error);
                        Swal.fire("Wrong to change Status", " ", "Error")
                    })
                }
            })
        }
    })
}


function dataUser(idPerson, idUser) {
    $.ajax({
        type: "post",
        //llamar la constante creada en header con el enrutamiento
        url: url + "user/viewUserById",
        data: { idPerson, idUser }
    }).done(function(result){
        console.log("DONE? : ", result);
        const person=JSON.parse(result);
        console.log(person);
        document.getElementById("selDocument").value=person.typedocument;
        document.getElementById("txtDocument").value=person.document;
        document.getElementById("txtNames").value=person.name;
        document.getElementById("txtLastname").value=person.lastname;
        document.getElementById("txtUsername").value=person.username || "";
        document.getElementById("txtEmail").value=person.email;
        document.getElementById("txtPhone").value=person.phone;
        document.getElementById("txtAddress").value=person.Address;
        document.getElementById("selRol").value=person.idRol || "";
        document.getElementById("txtPassword").value=person.PASSWORD || "";
        document.getElementById("idPerson").value=person.idPerson;
        document.getElementById("idUser").value=person.idUser;
        
        console.log(document.getElementById("idPerson"))
        console.log(document.getElementById("idUser"))
        /*
         window.location.href = url + "user/viewUsers"
        window.location.reload() */
    }).fail(function(error){
        console.log("ERROR? : ", error);
        Swal.fire("Wrong to change Status", " ", "Error")
    })
    
    
    // Si necesitas establecer el rol, puede que necesites ajustar esto según el valor que se envía
    // Asegúrate de tener un campo que acepte el valor del rol correctamente
    
    // Si tienes otros campos en el formulario del modal, asígnalos aquí
}

