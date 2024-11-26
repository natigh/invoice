<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sales Invoice History</h2>
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
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Document</th>
                                        <th>Grand Total</th>
                                        <th>User</th>
                                        <th>Active</th>
                                        <th>Credit Note</th>
                                        <?php if($_SESSION['rol'] == 'Admin'): { ?>
                                        <th>Actions</th>
                                        <?php } endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($sales as $value):
                                    ?>
                                    <tr>
                                        <td><?php echo $value['code']; ?></td>
                                        <td><?php echo $value['date']; ?></td>
                                        <td><?php echo $value['Customer Name']; ?></td>
                                        <td><?php echo $value['Customer Document']; ?></td>
                                        <td><?php echo $value['grandTotal']; ?></td>
                                        <td><?php echo $value['user']; ?></td>
                                        <td>
                                            <?php if($value['active']==1): ?>
                                            <label class="badge badge-pill badge-success">Active</label>
                                            <?php else: ?>
                                            <label class="badge badge-pill badge-danger">Inactive</label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($value['creditNote']==1): ?>
                                            <label class="badge badge-pill badge-success">Active</label>
                                            <?php else: ?>
                                            <label class="badge badge-pill badge-danger">Inactive</label>
                                            <?php endif; ?>
                                        </td>
                                        <?php if($_SESSION['rol'] == 'Admin'): { ?>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-xs"
                                                onclick="changeStatus('<?php echo $value['idPerson']; ?>', '<?php echo $value['idUser']; ?>')"><i
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
                            <h4 class="modal-title" id="myModalLabel">Comment</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                            <input type="hidden" name="idInvoice" id="idInvoice" />
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="txtRemarkH">Remark</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea id="txtRemarkH" name="txtRemarkH" cols="100" rows="5"
                                                placeholder="Remark"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9 offset-md-3">
                                        <button type="submit" class="btn btn-info" name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>