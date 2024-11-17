<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sku</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Sku</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Active</th>
                                        <?php if($_SESSION['rol'] == 'Administrador'): { ?>
                                        <th>Actions</th>
                                        <?php } endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($sku as $value):
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $value['code']; ?></td>
                                        <td><?php echo $value['sku']; ?></td>
                                        <td><?php echo $value['description']; ?></td>
                                        <td><?php echo $value['value']; ?></td>
                                        <td><?php echo $value['stock']; ?></td>
                                        <td>
                                            <?php if($value['active']==1): ?>
                                            <label class="badge badge-pill badge-success">Active</label>
                                            <?php else: ?>
                                            <label class="badge badge-pill badge-danger">Inactive</label>
                                            <?php endif; ?>
                                        </td>
                                        <?php if($_SESSION['rol'] == 'Administrador'): { ?>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                                data-target="#modal-edit"
                                                onclick="dataSku('<?php echo $value['idSku']; ?>', '<?php echo $value['idPrice']; ?>')">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-xs"
                                                onclick="changeStatusSku('<?php echo $value['idSku']; ?>')"><i
                                                    class="fa fa-exchange" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <?php } endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal para editar -->

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Editar</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="idSku" id="idSku" />
                                <input type="hidden" name="idPrice" id="idPrice" />
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Code <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="txtCode" name="txtCode" required="required"
                                            class="form-control" placeholder="Sku Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Sku <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="txtSku" required="required" class="form-control"
                                            name="txtSku" placeholder="Sku Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for=""
                                        class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtdescription" class="form-control col" type="text"
                                            name="txtdescription" placeholder="Description">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Stock</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtStock" class="form-control col" type="number" name="txtStock"
                                            placeholder="Stock">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9 offset-md-3">
                                        <button id="btnCancel" type="button" class="btn btn-primary"><a href="<?php echo URL; ?>sku/viewSku">Cancel</a></button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-info" name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>