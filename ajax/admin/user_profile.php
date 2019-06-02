<!--Start Breadcrumb-->
<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="">Home</a></li>
      <li><a href="">User Details</a></li>
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
            <h3><strong>Add New User</strong></h3>
            <hr>
          </div>
          <div class="panel-body">
              <form id="insert_form">
                  <div class="form-group">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Short Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="short_name" placeholder="Short Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

          <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group">
                    <label for="date">Enter Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="password" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
        
          <div class="form-group">
                    <label for="date">Confirm Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="confirm_password" placeholder="Type new password">
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
            <h3><strong>User Details</strong></h3>
            <hr>
          </div>
          <div class="panel-body">

          </div>
          
        </div>
      </div>
    </div>

</div>

<script type="text/javascript">
  

  function addUser(){

    var fullname = $('#name').val();
    var shortname = $('#short_name').val();
    var uname = $('#username').val();
    var pword = $('#password').val();
    var con_pword = $('#confirm_password').val();


    if (con_pword == pword) {
       $.ajax({
          url:"backend/add_user.php",
          type:"POST",
          data:{
            name:fullname,
            short_name:shortname,
            uname:uname,
            pword:pword
          },
          success:function(data,status){
            $('#insert_form')[0].reset();
            alert('user added');
          } 


       })
     } 
     else{
      alert('Confirm password not matching !!');
     }
  }
</script>