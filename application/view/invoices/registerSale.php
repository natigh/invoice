<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Register Sales Invoice</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a></li>
                            <li><a href="#">Settings 2</a></li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">Step 1<br /><small>Invoicing Data </small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">Step 2<br /><small>Select Sku</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="step_no">3</span>
                                <span class="step_descr">Step 3<br /><small>Extra Information</small></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">

                            <form class="form-horizontal form-label-left" method="post">
                                <div id="step-1">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCode">Code
                                            <span class="">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="hidden" id="txtTypeInvoice" name="txtTypeInvoice" />
                                            <input type="hidden" id="txtCodeh" name="txtCodeh" />
                                            <input type="text" id="txtCode" name="txtCode" class="form-control"
                                                placeholder="Invoice Code" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtDate">Date
                                            <span class="">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="date" id="txtDate" class="form-control" name="txtDate"
                                                placeholder="Date" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtDueDate">Due
                                            Date
                                            <span class="">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="date" id="txtDueDate" class="form-control" name="txtDueDate"
                                                placeholder="Due Date" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="txtCustomerDoc"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Customer
                                            Document</label>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group row">
                                                <div class="form-input form-input-inline col-md-4 col-sm-4">
                                                    <input type="text" id="txtCustomerDoc" name="txtCustomerDoc"
                                                        class="form-control" placeholder="Customer Document" />
                                                </div>
                                                <div class="form-button form-button-inline col-md-2 col-sm-2">
                                                    <button id="btnBuscar" type="button" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="form-input form-input-inline col-md-6 col-sm-6">
                                                    <input type="hidden" id="txtPersonId" name="txtPersonId" />
                                                    <input type="text" id="txtCustomer" name="txtCustomer"
                                                        class="form-control" placeholder="Customer Name" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Usuario</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="hidden" name="idUser" id="idUser" />
                                            <input id="txtUser" class="form-control col" type="text" name="txtUser"
                                                placeholder="User" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selTypeCustomer"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Type
                                            Customer</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" name="selTypeCustomer" id="selTypeCustomer">
                                                <option value="">Choose Option...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-2">
                                    <div class="form-group row">
                                        <div class="col-md-3 col-sm-3">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="codSku">Cod. Sku</label>
                                                    <input type="text" class="form-control" id="codSku" name="codSku"
                                                        placeholder="Code Sku" disabled />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="selSku" class="">SKU</label>
                                                    <select class="form-control" name="selSku" id="selSku">
                                                        <option value="">Choose Option...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="txtQuantity">Quantity</label>
                                                    <input type="text" class="form-control" name="txtQuantity"
                                                        id="txtQuantity" placeholder="Quantity" />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="txtItemPrice">Price</label>
                                                    <input type="text" class="form-control" name="txtItemPrice"
                                                        id="txtItemPrice" placeholder="Price" disabled />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input id="btnAdd" name="btnAdd"
                                                        class="form-control btn btn-success" type="button"
                                                        value="Add" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <table class="table" id="tableItems">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Cod. Sku</th>
                                                        <th>Sku</th>
                                                        <th>Quantity</th>
                                                        <th>Price unit</th>
                                                        <th>Total</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="salesDetail">
                                                    <!--aquí se agregarán los datos por medio de jQuery-->
                                                </tbody>
                                            </table>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                </div>
                                                <div class="form-group col-md-1" name="subTotal">
                                                    <label for="txtSubTotal">SubTotal</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control" name="txtSubTotal1"
                                                        id="txtSubTotal1" placeholder="SubTotal" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-3">
                                    <div class="form-group row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="selCurrency"
                                                        class="col-form-label col-md-3 col-sm-3 label-align">Currency</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select class="form-control" name="selCurrency"
                                                            id="selCurrency">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="txtSubTotal">SubTotal</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control" name="txtSubTotal2"
                                                            id="txtSubTotal2" placeholder="SubTotal" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="txtTaxes">TAX 19%</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control" name="txtTaxes"
                                                            id="txtTaxes" placeholder="Tax" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="txtGrandTotal">GRAND TOTAL</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control" name="txtGrandTotal"
                                                            id="txtGrandTotal" placeholder="Grand Total" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="txtPrice">Remark</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <textarea id="txtRemark" name="txtRemark" cols="100" rows="5"
                                                            placeholder="Remark"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9 offset-md-3">
                                            <button id="btnCancel" type="button" class="btn btn-primary"><a
                                                    href="<?php echo URL; ?>sku/viewSku">Cancel</a></button>
                                            <button class="btn btn-warning" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-info" name="btnSubmit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <!-- End SmartWizard Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->