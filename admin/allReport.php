
<?php require_once "auth.php"; ?>
<?php check_access(["admin"]); ?>

<?php 

 require_once("connection.php");

  $numberOfPatient=mysqli_query($con, "SELECT COUNT(*) as numberOfPatient FROM patient");
   $row_patient=mysqli_fetch_assoc($numberOfPatient);


  $numberOfStaff=mysqli_query($con, "SELECT COUNT(*) as numberOfStaff FROM staff");
   $row_staff=mysqli_fetch_assoc($numberOfStaff);

   
  $department=mysqli_query($con, "SELECT COUNT(*) as numberOfDepartment FROM department");
   $row_department=mysqli_fetch_assoc($department);


  $surgery=mysqli_query($con, "SELECT SUM(s.price) AS total_profit FROM patient_surgery ps JOIN 
        surgery s ON ps.surgery_id = s.surgery_id");

$row_surgery = mysqli_fetch_assoc($surgery);
echo "Total Profit from All Patients: " . $row_surgery['total_profit'];


?>

<html>
  
  <?php require_once("../inc/navbar.php")?>
  <?php require_once("inc/dash_head.php")?>
  <?php require_once("../inc/head.php")?>

  <section class="hero-wrap"  style="background-image: url('../images/bg_3.jpg');" data-section="home" data-stellar-background-ratio="0.5" data-spy="scroll" data-target=".site-navbar-target" data-offset="200">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
       
        <div class="row mt-5">
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
                  <div class="card mt-5">
                      <div class="card-body">
                          <h5 class="text-muted">OUR PATIENT 🙇</h5>
                          <div class="metric-value d-inline-block">
                              <h2 class="mb-1 text-primary"><?php echo  $row_patient["numberOfPatient"] ?> PATIENT</h2>
                          </div>
                          <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                          </div>
                      </div>
                      <div id="sparkline-revenue"><canvas width="211" height="100" style="display: inline-block; width: 211.594px; height: 100px; vertical-align: top;"></canvas></div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="text-muted">OUR STAFF 👨‍🔬</h5>
                          <div class="metric-value d-inline-block">
                              <h2 class="mb-1 text-danger"><?php echo  $row_staff["numberOfStaff"]?> STAFF </h1>
                          </div>
                          <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                          </div>
                      </div>
                      <div id="sparkline-revenue2"><canvas width="211" height="100" style="display: inline-block; width: 211.594px; height: 100px; vertical-align: top;"></canvas></div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="text-muted">DEPARTMENT🏛️</h5>
                          <div class="metric-value d-inline-block">
                              <h2 class="mb-1 text-primary"><?php echo $row_department["numberOfDepartment"] ?> DEPARTMEN</h2>
                          </div>
                          <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                          <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                          </div>
                      </div>
                      <div id="sparkline-revenue3"><canvas width="211" height="120" style="display: inline-block; width: 211.594px; height: 100px; vertical-align: top;"></canvas></div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="text-muted">CUSH💸</h5>
                          <div class="metric-value d-inline-block">
                         
                              <h2 class="mb-1 text-warning"><?php echo $row_surgery["total_profit"] ?> AFG</h2>
                          </div>
                          <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                          <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                          </div>
                      </div>
                      <div id="sparkline-revenue4"><canvas width="211" height="100" style="display: inline-block; width: 211.594px; height: 100px; vertical-align: top;"></canvas></div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 pt-5 ftco-animate">
          </div>
        </section>
          </div>
        </div>
        </div>

  <?php require_once("inc/dash_script.php") ?>
  <?php require_once("../inc/footer.php") ?>
  </html>


