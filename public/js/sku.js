function changeStatusSku(idSku){
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
                        url: url + "sku/changeStatusSku",
                        data: { idSku }
                    }).done(function(result){
                        console.log("DONE? : ", result);
                        window.location.href = url + "sku/viewSku"
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

function dataSku(idSku, idPrice) {
    $.ajax({
        type: "post",
        //llamar la constante creada en header con el enrutamiento
        url: url + "sku/viewSkuById",
        data: { idSku, idPrice }
    }).done(function(result){
        console.log("DONE? : ", result);
        const sku=JSON.parse(result);
        console.log(sku);
        document.getElementById("idSku").value=sku.idSku;
        document.getElementById("idPrice").value=sku.idPrice;
        document.getElementById("txtCode").value=sku.code;
        document.getElementById("txtSku").value=sku.sku;
        document.getElementById("txtdescription").value=sku.description || "";
        document.getElementById("txtPrice").value=sku.value;
        document.getElementById("txtStock").value=sku.stock;
        
        console.log(document.getElementById("idSku"))
        console.log(document.getElementById("idPrice"))
        
    }).fail(function(error){
        console.log("ERROR? : ", error);
        Swal.fire("Wrong to change Status", " ", "Error")
    })
}
