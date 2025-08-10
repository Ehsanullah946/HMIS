
<?php
require_once "admin/connection.php"; 

if (isset($_POST["username"])) {
    $username = getValue($_POST["username"]);
    $password = getValue($_POST["password"]);

    $result = mysqli_prapare($con, "SELECT * FROM users WHERE username=?");
    mysqli_stmt_bind_param($con,"s",$username);
    mysqli_stmt_execute($result);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["role"] = $row["role"];

            if (isset($_POST["keep"])) {
                setcookie("user", $row["user_id"], time() + 3600 ,'/');
            }


            switch ($row["role"]) {
                case "admin":
                    header("Location: admin/dashboard.php");
                    break;
                case "doctor":
                    header("Location: doctor/patient_list.php");
                    break;
                case "nurse":
                    header("Location: nurse/index.php");
                    break;
                case "user":
                default:
                    header("Location: index.php");
                    break;
            }
            exit;
        } else {
            header("Location: LoginForm.php?login=wrong_password");
            exit;
        }
    } else {
        header("Location: LoginForm.php?login=user_not_found");
        exit;
    }
}

?>

 <?php require_once "inc/head.php"; ?>
    <?php include_once "inc/navbar.php"; ?> 
     
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pt-5 pl-5 mt-5 m-auto text-center   mt-5">
              <div class="card mb-5 mt-5 text-center">
            <h5 class="card-header text-white bg-primary">Login Form</h5>
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
            <?php if(isset($_GET["regester"])) {?>
          <div class="alert alert-success">
           you are successfully Regester
          </div>
            <?php }?>
            <?php if(isset($_GET["notLogin"])) {?>
          <div class="alert alert-alert">
            sorry your not login yet!
          </div>
            <?php }?>
            <div class="card-body justify-content-center ">
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
                        <div class="col-sm-6 pl-0 d-flex">
                            <p class="text-right">
                              <input type="submit" value="login" class="btn btn-primary px-5">
                            </p>
                            <div class="ml-3 d-flex"> 
                                <label class="w-fix" for="">Remember Me 😴</label>
                                <input class="ml-3" type="checkbox" name="keep">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php require_once "inc/footer.php"; ?>


<?php require_once "inc/jsScript.php"; ?>