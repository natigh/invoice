<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Register Object</h2>
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
                                <span class="step_descr">Step 1<br /><small>Step 1 description</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">Step 2<br /><small>Step 2 description</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="step_no">3</span>
                                <span class="step_descr">Step 3<br /><small>Step 3 description</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <span class="step_no">4</span>
                                <span class="step_descr">Step 4<br /><small>Step 4 description</small></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">

                            <form class="form-horizontal form-label-left" method="post">
                                <div id="step-1">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Code <span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="txtCode" name="txtCode" required="required"
                                                class="form-control" placeholder="Invoice Code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Date <span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="date" id="txtDate" required="required" class="form-control"
                                                name="txtDate" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Due Date <span
                                                class="">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="date" id="txtDueDate" required="required" class="form-control"
                                                name="txtDueDate" placeholder="Due Date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Customer
                                            Document</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea class="form-control col" id="txtCustomerDoc" rows="5" cols="50"
                                                name="txtCustomerDoc" placeholder="Costumer Document"></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Usuario</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="txtUser" class="form-control col" type="text" name="txtUser"
                                                placeholder="User">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Type
                                            Customer</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" name="selTypeCustomer">
                                                <option value="">choose option</option>
                                                <?php foreach ($CustomerType as $cos): ?>
                                                <option value="<?php echo $cos['idTypeCustomer']; ?>">
                                                    <?php echo $doc['typeCustomer']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Usuario</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="txtUser" class="form-control col" type="text" name="txtUser"
                                            placeholder="User">
                                        </div>
                                    </div>
                                </div>

                                <div id="step-2">
                                <div class="form-group row">
                                        <label for=""
                                            class="col-form-label col-md-3 col-sm-3 label-align">Remark</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea class="form-control col" id="txtRemark" rows="5" cols="50"
                                                name="txtRemark" placeholder="Remark"></textarea>
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