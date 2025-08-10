
<?php 

require_once("../checkLogin.php");
require_once("../connection.php");

if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
}

$allStaff=mysqli_query($con, "SELECT * FROM staff inner join department on department.department_id=staff.department_id");
$row_staff=mysqli_fetch_assoc($allStaff);


$totalrows=mysqli_num_rows($allStaff);
$rows_per_page=2;
$totalPage=ceil($totalrows / $rows_per_page);

$offset=($page-1) * $rows_per_page;

   $staff=mysqli_query($con, "SELECT *FROM staff inner join department on department.department_id=staff.department_id limit $offset , $rows_per_page");
   $row_staff=mysqli_fetch_assoc($staff);

?>

<?php include_once "../../inc/navbar.php"; ?>
<?php require_once "../../inc/head.php"; ?>

<div class="row mt-5">   
    <div class="col-xl-12 col-lg-12 col-md-12 mt-5 p-4 col-sm-12 col-12">
        <div class="card ">
            <h5 class="card-header bg-primary text-center text-white">STAFF LIST</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">first name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">photo</th>
                            <th scope="col">department</th>
                            <th scope="col">salary</th>
                            <th scope="col">currency</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php do{ ?>
                            <tr>
                                <td scope="row"> <?php echo $row_staff["staff_id"] ?></td>
                                <td scope="row"> <?php echo $row_staff["first_name"] ?></td>
                                <td scope="row"> <?php echo $row_staff["last_name"] ?></td>
                                <td scope="row"> <img src="<?php echo $row_staff["photo"] ?>" class="rounded-circle" width="40px" height="40px" alt="img"></td>
                                <td scope="row"> <?php echo  $row_staff["department_name"] ?></td>
                                <td scope="row"> <?php echo  $row_staff["salary"] ?></td>
                                <td scope="row"> <?php echo  $row_staff["currency"] ?></td>
                                <td>
                                    <a href="staff_edit.php?staff_id=<?php echo $row_staff["staff_id"] ?> ">
                                        <span class="bi bi-pencil-square"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete" href="staff_delete.php?staff_id=<?php echo $row_staff["staff_id"] ?> ">
                                        <span class="bi bi-trash3"></span>
                                    </a>
                                </td>
                            </tr>
                    <?php   }while($row_staff=mysqli_fetch_assoc($staff)); ?>
                    </tbody>
                </table>
                    <?php if($page>1){ ?>
                           <a href="staffList.php?page=<?php echo $page-1  ?>">◀️prev</a>
                        <?php }?>
                        <?php if($page<$totalPage){ ?>
                               <a href="staffList.php?page=<?php echo $page+1  ?>">next▶️</a>
                    <?php }?>
                 <ul class="pagination pagination-sm">
                     <?php for($x=1; $x<=$totalPage; $x++){ ?>
                        <?php if($x !=$page){ ?>
                        <li class="page-item">
                            <a class="page-link" href="staffList.php?page=<?php echo $x; ?>"><?php echo $x; ?></a>
                        </li>
                        <?php } else{?>
                            <a class="page-link" href="#"><?php echo $x; ?></a>
                            <?php }?>
                     <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php require_once "../../inc/footer.php"; ?>
<?php include_once "../../inc/jsScript.php"; ?>