<!--Start Breadcrumb-->

<?php require '../../backend/connection.php' ?>

<?php 
  
  $query = "SELECT paper_id,paper_code,paper_name FROM it_papers order by paper_code";
  $fire = mysqli_query($con,$query);

 ?>




<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="index.html">Home</a></li>
      <li><a href="#">Edit IT routine</a></li>
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
              <form id="insert_form" action="backend/change_routine.php" method="POST" >

                  <div class="form-group">
                    <label for="date">Select Deparment</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="dept">
                          <option selected>-- None --</option>
                          <option value="1">IT</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Select Semester</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="sem" name="sem">
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


                  <div class="form-group">
                    <label for="date">Select Day</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="day" name="day">
                          <option selected>-- None --</option>
                          <option value="1">Monday</option>
                          <option value="2">Tuesday</option>
                          <option value="3">Wednesday</option>
                          <option value="4">Thirsday</option>
                          <option value="5">Friday</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->



                    <div class="form-group">
                    <label for="date">Select Period No.</label>
                    <div class="input-group col-md-12"> 
                      <select class="browser-default custom-select custom-select-lg mb-3" id="pno" name="pno">
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



                  <div class="form-group">
                    <label for="date">Select Subject</label>
                    <div class="input-group col-md-12">
                      <select class="browser-default custom-select custom-select-lg mb-3" id="sub" name="sub">
                          <option selected>-- Select Subject --</option>
                          <?php while($row = mysqli_fetch_array($fire)){ ?>
                          <option value="<?php echo $row['paper_id']; ?>"><?php echo $row['paper_name']." (".$row['paper_code'].")";?></option>

                        <?php } ?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  

          <hr>
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" class="btn btn-primary"  style="background-color: #26c281;padding-right: 15px;padding-left: 15px;" id="save" name="save">
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