<?php
require_once "admin/connection.php"; 

if (isset($_POST["username"])) {
    $role = "user"; 
    $username = getValue($_POST["username"]);
    $password = getValue($_POST["password"]);
    $email = getValue($_POST["email"]);

    $result = mysqli_prepare($con, "INSERT INTO users(username,password,email,role) VALUES (? ,?,?,?)");

    mysqli_stmt_bind_param($result,"ssss",$username, password_hash($password,PASSWORD_DEFAULT), $email , $role);
    
    mysqli_stmt_execute($result);

    if ($result) {
        header("Location: LoginForm.php?register=success");
    } else {
        header("Location: LoginForm.php?register=failed");
    }
}
?>

    <?php require_once "inc/head.php"; ?>
    <?php include_once "inc/navbar.php"; ?> 
     
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pt-5 pl-5 mt-5 m-auto">
              <div class="card mt-5 mb-5">
            <h5 class="card-header bg-primary">Login Form</h5>
            <?php if(isset($_GET["login"])) {?>
          <div class="alert alert-danger">
            incorect username or password
          </div>
            <?php }?>
            <?php if(isset($_GET["logout"])) {?>
          <div class="alert alert-success">
           you are successfully logout
          </div>
            <?php }?>
            <?php if(isset($_GET["notLogin"])) {?>
          <div class="alert alert-alert">
            sorry your not login yet!
          </div>
            <?php }?>
            <div class="card-body">
                <form method="POST"  id="form">
                    <div class="form-group row">
                        <div class="col-9 col-lg-10">
                            <input id="" type="text" required="" name="username" data-parsley-type="text" placeholder="Username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-9 col-lg-10">
                            <input id="inputPassword2" name="password" type="password" required placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-9 col-lg-10">
                            <input id="inputEmail" name="email" type="email" required placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <div class="col-6 col-lg-10  border-2">
                            <input id="inputEmail" name="submit" type="submit" class="form-control bg-primary">
                        </div>
                    </div>
        
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once "inc/footer.php"; ?>
<?php require_once "inc/jsScript.php"; ?>   