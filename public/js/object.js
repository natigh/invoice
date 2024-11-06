function changeStatusObject(idObject){
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
                        url: url + "objects/changeObjectStatus",
                        data: { idObject }
                    }).done(function(result){
                        console.log("DONE? : ", result);
                        window.location.href = url + "objects/viewObjects"
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

function dataObject(idObject) {
    $.ajax({
        type: "post",
        //llamar la constante creada en header con el enrutamiento
        url: url + "objects/viewObjectById",
        data: { idObject }
    }).done(function(result){
        console.log("DONE? : ", result);
        const sku=JSON.parse(result);
        console.log(sku);
        document.getElementById("txtCode").value=sku.code;
        document.getElementById("txtObject").value=sku.object;
        document.getElementById("txtdescription").value=sku.description || "";
        document.getElementById("selPrice").value=sku.idPrice;
        document.getElementById("txtStock").value=sku.stock;
        
        console.log(document.getElementById("idObject"))
        
    }).fail(function(error){
        console.log("ERROR? : ", error);
        Swal.fire("Wrong to change Status", " ", "Error")
    })
}
