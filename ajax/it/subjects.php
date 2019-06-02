<!--Start Breadcrumb-->
<?php require '../../backend/connection.php' ?>

<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="">Home</a></li>
      <li><a href="">IT Subjects</a></li>
    </ol>
    <div id="social" class="pull-right">
      <a href="#"><i class="fa fa-facebook"></i></a>
    </div>
  </div>
</div>
<!--End Breadcrumb-->

<div class="container">
    <div class="row">
      <div class="col-sm-4">
        
        <div class="panel-group">
          <div class="panel-heading">
            <h3><strong>Add New Subejct</strong></h3>
            <hr>
          </div>
          <div class="panel-body">
              <form id="insert_form">
                  <div class="form-group">
                    <label for="date">Enter Subject Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="name" placeholder="Subject Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                  <div class="form-group">
                    <label for="date">Enter Subject Code</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="name" placeholder="Subject Code" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                  <div class="form-group">
                    <label for="date">Select Faculty</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3">
                          <option selected>-- Select Faculty --</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

          <hr>
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" style="background-color: #26c281" id="save" onclick="addUser()">
                        Add User
                      </button>
                    </div>
                  </div><!-- /.form group -->

                </form>
          </div>
          
        </div>
      </div>



      <div class="col-sm-8">
        
        <div class="panel-group">
          <div class="panel-heading">
            <h3><strong>Subjects and Faculty</strong></h3>
            <hr>
          </div>
          <div class="panel-body">

          </div>
          
        </div>
      </div>
    </div>

</div>