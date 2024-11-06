<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users</h2>
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
                            <p class="text-muted font-13 m-b-30">
                                DataTables has most features enabled by default, so all you need to do to use it with
                                your own tables is to call the construction function: <code>$().DataTable();</code>
                            </p>
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Names</th>
                                        <th>Lastnames</th>
                                        <th>TypeDocument</th>
                                        <th>Document</th>
                                        <th>Username</th>
                                        <th>Rol</th>
                                        <th>Active</th>
                                        <?php if($_SESSION['rol'] == 'Administrador'): { ?>
                                        <th>Actions</th>
                                        <?php } endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($users as $value): 
                                        // Prepara los datos del usuario actual en un arreglo

                                        $user_data = [
                                            /*'name' => $value['name'],
                                            'lastname' => $value['lastname'],
                                            'typeDocument' => $value['typeDocument'],
                                            'document' => $value['document'],
                                            'username' => $value['username'],
                                            'rol' => $value['rol'],
                                            'active' => $value['active'],
                                            'idUser' => $value['idUser'],*/
                                        ];
                                    ?>
                                    <tr>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['lastname']; ?></td>
                                        <td><?php echo $value['typeDocument']; ?></td>
                                        <td><?php echo $value['document']; ?></td>
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['rol']; ?></td>
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
                                                onclick="dataUser('<?php echo $value['idPerson']; ?>', '<?php echo $value['idUser']; ?>')">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
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
                            <h4 class="modal-title" id="myModalLabel">Editar</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="idPerson" id="idPerson" />
                                <input type="hidden" name="idUser" id="idUser" />
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Type Document</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="selDocument" id="selDocument">
                                            <option value="">choose option</option>
                                            <?php foreach ($documentType as $doc): ?>
                                            <option value="<?php echo $doc['idTypeDocument']; ?>">
                                                <?php echo $doc['typeDocument']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Document <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="txtDocument" name="txtDocument" required="required"
                                            class="form-control" placeholder="Entry Your Number Document">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Names <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="txtNames" required="required" class="form-control"
                                            name="txtNames" placeholder="Entry Your Names">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Last
                                        Names</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtLastname" class="form-control col" type="text" name="txtLastname"
                                            placeholder="Entry Your Lastnames">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtUsername" class="form-control col" type="text" name="txtUsername"
                                            placeholder="Entry The Username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtEmail" class="form-control col" type="email" name="txtEmail"
                                            placeholder="Entry the Email" required="required">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtPhone" class="form-control col" type="text" name="txtPhone"
                                            placeholder="Entry the Phone Number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="txtAddress" class="form-control col" type="text" name="txtAddress"
                                            placeholder="Entry the Address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Rol</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="selRol" id="selRol">
                                            <option value="">choose option</option>
                                            <?php foreach ($roles as $rol): ?>
                                            <option value="<?php echo $rol['idRol']; ?>">
                                                <?php echo $rol['rol']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Password <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="password" id="txtPassword" class="form-control"
                                            name="txtPassword" placeholder="Entry the Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9 offset-md-3">
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-info" name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>