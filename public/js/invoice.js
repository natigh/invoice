let fila = 0;
let customer_type = [];
let currency = [];
let sku = [];
let subTotal = 0;
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

            let totalItem = parseFloat(price) * parseFloat(quantity);
            subTotal = subTotal + totalItem;
            let itemSku = sku.find(element => element.idSku == idsku);
            fila ++;
            let tableBody = "";

            tableBody += "<tr>";
            tableBody += "<td>" + fila + "</td>";
            tableBody += "<td>" + code + "</td>";
            tableBody += "<td>" + itemSku.sku + "</td>";
            tableBody += "<td>" + quantity + "</td>";
            let formatPrice = parseFloat(price).toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })
            tableBody += "<td>" + formatPrice + "</td>";
            let formatTotalItem = totalItem.toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })
            tableBody += "<td> " + formatTotalItem + "</td>";
            tableBody += "</tr>";
            $("#salesDetail").append(tableBody);

            $("#codSku").val("");
            $("#selSku").val("");
            $("#txtQuantity").val("");
            $("#txtItemPrice").val("");
            let format = subTotal.toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })

            $("#txtSubTotal1").val(format);
    
            $("#txtSubTotal2").val(format);

            let tax = subTotal * 0.19;
            let formatTax = tax.toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })
            $("#txtTaxes").val(formatTax);

            let grandTotal = subTotal + tax;
            let formatGrandTotal = grandTotal.toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })
            $("#txtGrandTotal").val(formatGrandTotal);

        });
        $("#selCurrency").change(function(){
            const usd = 4200;
            let id = $("#selCurrency").val();
            if(id=="") return;
            
            let item = currency.find(element => element.idCurrency == id);

            let subTotalString = $("#txtSubTotal2").val();
            let subTotal = subTotalString.replace(/[^0-9.-]+/g, '');
            
            let taxString = $("#txtTaxes").val();
            let tax = taxString.replace(/[^0-9.-]+/g, '');
            
            let grandTotalString = $("#txtGrandTotal").val();
            let grandTotal = grandTotalString.replace(/[^0-9.-]+/g, '');

            console.log({subTotal, tax, grandTotal});
            
            let newSubTotal = 0;
            let newTax = 0;
            let newGrandTotal = 0;

            let newSubTotalString = '';
            let newTaxString = '';
            let newGrandTotalString = '';

            if(item.currency === 'COP'){
                newSubTotal = subTotal * usd;
                newTax = tax * usd;
                newGrandTotal = grandTotal * usd; 
                
                newSubTotalString = newSubTotal.toLocaleString("en", {
                    style:"currency",
                    currency:"COP"
                })
                newTaxString = newTax.toLocaleString("en", {
                    style:"currency",
                    currency:"COP"
                })
                newGrandTotalString = newGrandTotal.toLocaleString("en", {
                    style:"currency",
                    currency:"COP"
                })

            }else if(item.currency === 'USD'){
                newSubTotal = subTotal / usd;
                newTax = tax / usd;
                newGrandTotal = grandTotal / usd; 

                newSubTotalString = newSubTotal.toLocaleString("en-US", {
                    style:"currency",
                    currency:"USD"
                })
                newTaxString = newTax.toLocaleString("en-US", {
                    style:"currency",
                    currency:"USD"
                })
                newGrandTotalString = newGrandTotal.toLocaleString("en-US", {
                    style:"currency",
                    currency:"USD"
                })
            }

            
            $("#txtSubTotal2").val(newSubTotalString);

            $("#txtTaxes").val(newTaxString);

            $("#txtGrandTotal").val(newGrandTotalString);

        });  
    })
}


