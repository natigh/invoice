<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Register Person</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
        <!-- Smart Wizard -->
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">Step 1<br /><small>Personal Data</small></span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">Step 2<br /><small>User</small></span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">Step 3<br /><small>Extra Data</small></span>
              </a>
            </li>
          </ul>

          <form class="form-horizontal form-label-left" method="post">
            <div id="step-1">
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Type Document</label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="selDocument">
                    <option value="">choose option</option>
                    <?php foreach ($documentType as $doc): ?>
                      <option value="<?php echo $doc['idTypeDocument']; ?>"><?php echo $doc['typeDocument']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Document <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="document" name="txtDocument" required="required" class="form-control" placeholder="escribe tu Documento">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Names <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="names" required="required" class="form-control" name="txtNames" placeholder="escribe tus Nombres">
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Lastnames</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="lastName" class="form-control col" type="text" name="txtLastNames" placeholder="escribe tus Apellidos">
                </div>
              </div>
            </div>

            <div id="step-2">
              <h2 class="StepTitle">Step 2 Content</h2>
              <div class="form-group row">
                <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="username" class="form-control col" type="text" name="txtUsername" placeholder="escribe tu Usuario">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Password <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="password" id="password" class="form-control" name="txtPassword" placeholder="Password">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Rol</label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="selRol">
                    <option value="">choose option</option>
                    <?php foreach ($roles as $rol): ?>
                      <option value="<?php echo $rol['idRol']; ?>"><?php echo $rol['rol']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div id="step-3">
              <h2 class="StepTitle">Step 3 Content</h2>
              <div class="form-group row">
                <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="email" class="form-control col" type="email" name="txtEmail" placeholder="escribe tu correo electronico" required="required">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="birthDate" class="date-picker form-control" required="required" type="date" name="txtBirthDate" placeholder="Selecciona fecha de nacimiento">
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="phone" class="form-control col" type="text" name="txtPhone" placeholder="digita tu numero de celular">
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="address" class="form-control col" type="text" name="txtAddress" placeholder="escribe tu direccion">
                </div>
              </div>
            </div>
      
              <div class="form-group row">
                <div class="col-md-9 col-sm-9 offset-md-3">
                  <button type="button" class="btn btn-primary" onclick="historyGoBack()" >Cancel</button>
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
