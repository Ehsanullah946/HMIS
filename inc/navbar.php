<?php 
  

   if(!isset($_SESSION)){
	    session_start();
    }

  
?>
<div class="py-1 bg-primary top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+93790575263</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Ehsanullahakbari@gmail.com</span>
					    </div>
              <?php if(!isset($_SESSION["user_id"])) { ?>
                <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                  <p class="mb-0 register-link"><a href="/HMIS/LoginForm.php">login</a></p>
                  <p class="mb-0 register-link"><a href="/HMIS/sign_up.php">Sign-Up</a></p>
                </div>
               <?php } else{ ?>
                <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                  <p class="mb-0 register-link"><a href="/HMIS/logout.php">logout</a></p>
                </div>
                <?php  } ?>
				    </div>
			    </div>
		    </div>
		  </div>
		</div>

    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){ ?>
    
 
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">Mediplus</a>
          <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
      
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

            <li class="nav-item"><a href="/HMIS/admin/dashboard.php" class="nav-link text-primary">dashbaord</a></li>
      
              <!-- Department Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="departmentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Department
                </a>
                <div class="dropdown-menu" aria-labelledby="departmentDropdown">
                  <a class="dropdown-item" href="/HMIS/admin/department/department_add.php">add new Dapartment</a>
                  <a class="dropdown-item" href="/HMIS/admin/department/department_list.php">Department list</a>
                </div>
              </li>
      
               <!-- staff dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-primary"  href="#" id="patientDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Staff
                </a>
                <div class="dropdown-menu" aria-labelledby="patientDropdown">
                  <a class="dropdown-item" href="/HMIS/admin/staff/addStaff.php">add Staff</a>
                  <a class="dropdown-item" href="/HMIS/admin/staff/staffList.php">Staff list</a>

                </div>
              </li>
             
      
              <!-- Patient Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-primary" href="#" id="patientDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Patient
                </a>
                <div class="dropdown-menu" aria-labelledby="patientDropdown">
                  <a class="dropdown-item"  href="/HMIS/admin/patient/addPatient.php">add patient</a>
                  <a class="dropdown-item"  href="/HMIS/admin/patient/patient_list.php">patient list</a>
                  <a class="dropdown-item"  href="/HMIS/admin/patient/patient_surgery.php">Patient Surgery</a>
                  <a class="dropdown-item"  href="/HMIS/admin/patient/patient_surgery_list.php">Patient Surgery info</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-primary" href="#" id="patientDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  surgery
                </a>
                <div class="dropdown-menu" aria-labelledby="patientDropdown">
                  <a class="dropdown-item"  href="/HMIS/admin/surgery/surgery_add.php">add surgery</a>
                  <a class="dropdown-item"  href="/HMIS/admin/surgery/surgery_list.php">surgery list</a>
                </div>
              </li>
             
              <li class="nav-item  "><a href="/HMIS/admin/allReport.php" class="nav-link text-primary">Report</a></li>
              <li class="nav-item  "><a href="finance.php" class="nav-link text-primary">Finance</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-primary" href="#" id="patientDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  setting
                </a>
                <div class="dropdown-menu" aria-labelledby="patientDropdown">
                  <a class="dropdown-item" href="#">User add</a>
                  <a class="dropdown-item" href="records.php">Add list</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	 
	  <?php } else{ ?>	
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Mediplus</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
       <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="department.php" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item"><a href="doctor.php" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link"><span>Contact</span></a></li>
	          <li class="nav-item cta mr-md-2"><a href="about.php" class="nav-link">Appointment</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	
	<?php }?>




