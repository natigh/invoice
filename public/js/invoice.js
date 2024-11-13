let fila = 0;
let customer_type = [];
let currency = [];
let sku = [];
let total = 0;
function dataRegister(username, idUser) {
    $.ajax({
        type: "post",
        url: url + "invoice/form",
        data: {}
    }).done(function(result) {
        const data = JSON.parse(result);
        console.log(data);

        customer_type = data.customer_type;
        currency = data.currency;
        sku = data.sku;

        const selectTypeCustomer = document.getElementsByName("selTypeCustomer")[0];
        document.getElementById("idUser").value = idUser;
        document.getElementById("txtUser").value = username;

        for (let index = 0; index < customer_type.length; index++) {
            const ct = customer_type[index];
            const option = document.createElement('option');
            
            option.value = ct.idTypeCustomer;
            option.innerHTML = ct.typeCustomer;
            
            selectTypeCustomer.appendChild(option);
        }

        const selectSku = document.getElementsByName("selSku")[0];

        for (let index = 0; index < sku.length; index++) {
            const sk = sku[index];
            const option = document.createElement('option');
            
            option.value = sk.idSku;
            option.innerHTML = sk.sku;
            
            selectSku.appendChild(option);
        }

        const select = document.getElementsByName("selCurrency")[0];

        for (let index = 0; index < currency.length; index++) {
            const cu = currency[index];
            const option = document.createElement('option');
            
            option.value = cu.idCurrency;
            option.innerHTML = cu.currency;
            
            select.appendChild(option);
        }

        $("#selSku").change(function(){
            let id = $("#selSku").val();
            if(id==""){
                $("#txtItemPrice").val("");
                $("#codSku").val("");
                return;
            }else{
                let item = sku.find(element => element.idSku == id);
                $("#txtItemPrice").val(item.value);
                $("#codSku").val(item.code);
            }
        })

        $("#btnAdd").click(function(){
            let code =  $("#codSku").val();
            let idsku = $("#selSku").val();
            let quantity = $("#txtQuantity").val();
            let price = $("#txtItemPrice").val();

            if(idsku == ""){
                alert("You need to select a product");
                return;
            }

            if(!Number.isInteger(parseFloat(quantity))){
                alert("Add a valid number");
                return;
            }

            total = parseFloat(price) * parseFloat(quantity);
            let itemSku = sku.find(element => element.idSku == idsku);
            fila ++;
            let tableBody = "";

            /* const tr = document.createElement('tr');

            const tdFila = document.createElement('td');
            const tdCellTextFila = document.createTextNode(fila);
            tdFila.appendChild(tdCellTextFila);
            tr.appendChild(tdFila)

            const tdCode = document.createElement('td');
            const tdCellCode = document.createTextNode(code);
            tdCode.appendChild(tdCellCode);
            tr.appendChild(tdCode)

            const tdSku = document.createElement('td');
            const tdCellTextSku = document.createTextNode(itemSku.sku);
            tdSku.appendChild(tdCellTextSku);
            tr.appendChild(tdSku)

            const tdQuantity = document.createElement('td');
            const tdCellTextQuantity = document.createTextNode(quantity);
            tdQuantity.appendChild(tdCellTextQuantity);
            tr.appendChild(tdQuantity)

            const tdPrice = document.createElement('td');
            const tdCellTextPrice = document.createTextNode(price);
            tdPrice.appendChild(tdCellTextPrice);
            tr.appendChild(tdPrice)

            const tdTotal = document.createElement('td');
            const tdCellTextTotal = document.createTextNode(total);
            tdTotal.appendChild(tdCellTextTotal);
            tr.appendChild(tdTotal) */

            tableBody += "<tr>";
            tableBody += "<td>" + fila + "</td>";
            tableBody += "<td>" + code + "</td>";
            tableBody += "<td>" + itemSku.sku + "</td>";
            tableBody += "<td>" + quantity + "</td>";
            tableBody += "<td> COP " + price + "</td>";
            tableBody += "<td> COP " + total + "</td>";
            tableBody += "</tr>";
            console.log(tableBody)
            $("#salesDetail").append(tableBody);

            /* $("#codSku").val("");
            $("#selSku").val("");
            $("#txtQuantity").val("");
            $("#txtItemPrice").val(""); */

        });
       /*  $("#selCurrency").change(function(){
            let id = $("#selCurrency").val();
            if(id=="") return;
            
            let item = currency.find(element => element.idCurrency == id);
            
            if(item.currency === 'COP') return;
                
            let sub = $("#txtSubTotal").val();
            console.log("sub", sub);
            
            let acumTot = total + parseFloat(sub);
            console.log("acum", acumTot);
            $("#txtSubTotal").val(acumTot);
            let tax = $("#txtTaxes").val();
            let grandTotal = $("#txtGrandTotal").val();
        }) */

    });  
    
}


