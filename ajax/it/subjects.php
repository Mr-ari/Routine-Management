<!--Start Breadcrumb-->
<?php require '../../backend/connection.php' ?>

<?php 
  
  $query = "SELECT user_id,short_name FROM users where role='teacher'";
  $fire = mysqli_query($con,$query);

 ?>

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
                      <input type="text" class="form-control pull-right" id="subject_code" placeholder="Subject Code" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                  <div class="form-group">
                    <label for="date">Select Faculty</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="faculty">
                          <option selected>-- Select Faculty --</option>
                          <?php while($row = mysqli_fetch_array($fire)){ ?>
                          <option value="<?php echo $row['user_id']; ?>"><?php echo $row['short_name'];?></option>

                        <?php } ?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                  <div class="form-group">
                    <label for="date">Select Semester</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="sem">
                          <option selected>-- None --</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

          <hr>
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary"  style="background-color: #26c281;padding-right: 15px;padding-left: 15px;" id="save" onclick="addSubject()">
                        Save
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

<script type="text/javascript">


  function addSubject(){

    var name = $('#name').val();
    var sub_code = $('#subject_code').val();
    var sem = $('#sem').val();
    var faculty = $('#faculty').val();

       $.ajax({
          url:"backend/add_subject.php",
          type:"POST",
          data:{
            subname:name,
            subc:sub_code,
            semester:sem,
            fac:faculty
          },
          success:function(data,status){
            $('#insert_form')[0].reset();
            alert('Subjet added');
          } 


       })
  }
</script>