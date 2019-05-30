<?php session_start();
if(empty($_SESSION['user_id'])){
header('Location:index.php');
}
?>

<!--Start Breadcrumb-->
<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="index.html">Home</a></li>
      <li><a href="index.html">My Account</a></li>
    </ol>
    <div id="social" class="pull-right">
      <a href="#"><i class="fa fa-facebook"></i></a>
    </div>
  </div>
</div>
<!--End Breadcrumb-->



<div class="container">
    <div class="row">
      <div class="col-sm-6">
        
        <div class="panel-group">
          <div class="panel-heading">
            <h3><strong>Account Update</strong></h3>
            <hr>
          </div>
          <div class="panel-body">
            
              <form method="post" action="backend/password_change.php">
  
                  <div class="form-group">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $_SESSION['short_name']?>" name="name" placeholder="Full Name" required readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $_SESSION['user_name']?>" name="username" placeholder="Username" required readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Change Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" name="passwordnew" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
        
          <div class="form-group">
                    <label for="date">Confirm New Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" name="passwordconfirm" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <hr>
          <div class="form-group">
                    <label for="date">Enter Old Password to confirm changes</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" name="passwordold" placeholder="Type old password" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" style="background-color: #26c281" name="save">
                        Save
                      </button>
                    </div>
                  </div><!-- /.form group -->
        </form> 

          </div>
          
        </div>
      </div>

    </div>



</div>

