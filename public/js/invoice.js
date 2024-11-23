let fila = 0,
    subTotal = 0;

let customer_type = [],
    currency = [],
    sku = [],
    people = [];

let code, typeInvoice;

function dataRegister(username, idUser) {
    $.ajax({
        type: "post",
        url: url + "invoice/sales",
        data: {}
    }).done(function(result) {
        console.log(result);
        const data = JSON.parse(result);
        console.log(data);

        customer_type = data.customer_type;
        currency = data.currency;
        sku = data.sku;
        code = data.code;
        typeInvoice = data.typeInvoice;
        people = data.people;

        const selectTypeCustomer = document.getElementsByName("selTypeCustomer")[0];
        document.getElementById("idUser").value = idUser;
        document.getElementById("txtUser").value = username;
        document.getElementById("txtCode").value = code;
        document.getElementById("txtCodeh").value = code;
        document.getElementById("txtTypeInvoice").value = typeInvoice.idTypeInvoice;

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

        $("#btnAdd").click(function(e){
            e.preventDefault();

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
            tableBody += "<td>" + code + "<input type='hidden' name='products[code][]' value='" + code + "'/></td>";
            tableBody += "<td>" + itemSku.sku + "<input type='hidden' name='products[sku][]' value='"+idsku+"' /></td>";
            tableBody += "<td>" + quantity + "<input type='hidden' name='products[quantity][]' value='" + quantity + "' /></td>";
            let formatPrice = parseFloat(price).toLocaleString("en", {
                style:"currency",
                currency:"COP"
                
            })
            tableBody += "<td>"+ formatPrice + "<input type='hidden' name='products[price][]' value='"+price+"'/></td>";
            let formatTotalItem = totalItem.toLocaleString("en", {
                style:"currency",
                currency:"COP"
            })
            tableBody += "<td> " + formatTotalItem + "</td>";
            //tableBody += "<td><input id='btnDelete' name='btnDelete' class='btn btn-danger' type='button' value='Delete'/></td>";
            tableBody += "<td id='btnDelete' name='btnDelete' class='btn btn-danger' onclick='remove(this)'>Eliminar</td>";
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

    $("#btnBuscar").click(function(event) {
            event.preventDefault();
        
            const document = $("#txtCustomerDoc").val();

            $("#txtCustomer").val(null);
            $("#txtPersonId").val(null);

            const person = people.find(p => p.document === parseInt(document));

            if(!person) return;

            $("#txtCustomer").val(person.name + ' ' + person.lastname)
            $("#txtPersonId").val(person.idPerson)
        
    })
}

function remove(e) {
    $(e.parentNode).remove();

    let nt = 0
    
    $('#tableItems tbody tr').each(function() {
        const tr = $(this).find("td").eq(5).html();
        let trNum  = parseFloat(tr.replace(/[^0-9.-]+/g, ''));
        nt += trNum;
    });

    let formatNt = nt.toLocaleString("en", {
        style:"currency",
        currency:"COP"
    })

    $("#txtSubTotal1").val(formatNt);

    $("#txtSubTotal2").val(formatNt);

    let tax = nt * 0.19;
    let formatTax = tax.toLocaleString("en", {
        style:"currency",
        currency:"COP"
    })
    console.log("tax", tax);
    $("#txtTaxes").val(formatTax);

    let grandTotal = nt + tax;
    let formatGrandTotal = grandTotal.toLocaleString("en", {
        style:"currency",
        currency:"COP"
    })
    $("#txtGrandTotal").val(formatGrandTotal);
}

function editRemark(idInvoice) {
    $.ajax({
        type: "post",
        //llamar la constante creada en header con el enrutamiento
        //url: "nombre_del_controller/metodo"
        url: url + "invoice/viewHistorySalesById",
        data: { idInvoice }
    }).done(function(result){
        console.log("DONE? : ", result);
        const remark=JSON.parse(result);
        console.log(remark);
        document.getElementById("txtRemarkH").value=remark.remarkH;
        document.getElementById("idInvoice").value=remark.idInvoice;
        
    }).fail(function(error){
        console.log("ERROR? : ", error);
        Swal.fire("Wrong to change Status", " ", "Error")
    })
}



