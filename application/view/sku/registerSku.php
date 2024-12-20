<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Register Sku</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
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
                                                class="form-control" placeholder="Object Code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Sku <span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="txtSku" required="required" class="form-control"
                                                name="txtSku" placeholder="Item Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea
                                                class="form-control col" id="txtDescription"
                                                rows="5" cols="50" name="txtDescription"
                                                placeholder="Description"></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="txtPrice" class="form-control col" type="text" name="txtPrice"
                                                placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Stock</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="txtStock" class="form-control col" type="number" name="txtStock"
                                                placeholder="Stock" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9 offset-md-3">
                                            <button id="btnCancel" type="button" class="btn btn-primary"><a href="<?php echo URL; ?>sku/viewSku">Cancel</a></button>
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