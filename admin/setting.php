<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$_SESSION['user_id']=-1;

require '../functions.php';

$db=connectToDatabase();
$id=-1;
$name="";
$val="";
var_dump($_POST);
if (isset($_POST['edit']))
{
$select="select * from setting where id=?";

    $id=$_POST['id'];

    $s= $db->prepare($select);
    $s->bindValue(1,$id);
    $s->execute();
while (($row=$s->fetch(PDO::FETCH_ASSOC)))
{
    $name=$row['name'];
    $val=$row['val'];
}

}else if (isset($_POST['delete']))
{
$select="delete  from setting where id=?";

    $id=$_POST['id'];

    $s= $db->prepare($select);
    $s->bindValue(1,$id);
    $s->execute();
    $id=-1;

}
if (isset($_POST['save']))
{
    $id=intval($_POST['id']);
    $name=$_POST['name'];
    $val=$_POST['val'];
   $insert= "INSERT INTO `setting` ( `name`, `val`) VALUES ( ?, ?);";
   $update="UPDATE `setting` SET `name` = ?, `val` = ? WHERE `setting`.`id` = ?;";
   if ($id==-1)
   {
      $s= $db->prepare($insert);
      $s->bindValue(1,$name);
      $s->bindValue(2,$val);

   }else{
       $s= $db->prepare($update);
       $s->bindValue(1,$name);
       $s->bindValue(2,$val);
       $s->bindValue(3,$id);
var_dump("up");
   }
$s->execute();

}


$statement = $db->prepare('select * from English.setting');
$statement->execute();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <!-- forms -->
      <div class="container-fluid">
      <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Type</label>
                   <?php    echo " <input type='hidden' name='id' value='$id'/> "; ?>

                      <select name="name" class="form-control" >
                          <option value="Phone" <?php echo $name=="Phone" ?  "selected":"";?>>Phone</option>
                          <option value="Email" <?php echo $name=="Email" ?  "selected":"";?>>Email</option>
                          <option value="Social" <?php echo $name=="Social" ?  "selected":"";?>>Social</option>
                        </select>
                        
                    </div>
                    <div class="mb-3">

                      <label for="exampleInputPassword1" class="form-label">Value</label>
                      <input type="text" name="val" value="<?php echo $val; ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
              
            </div>
          </div>
          <!-- forms -->
        <!--  Row 1 -->
       
        <div class="row">
          
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <!-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Assigned</h6>
                        </th> -->
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Value</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=0;
                    while (($row=$statement->fetch(PDO::FETCH_ASSOC)))
                    {
                        $i++;
                        $id = $row['id'];
                        $name = $row['name'];
                        $val = $row['val'];
                        echo " 
                              <tr>
                              <td class='border-bottom-0'><h6 class='fw-semibold mb-0'>$i</h6></td>
                              <td class='border-bottom-0'>
                                $name                
                              </td>
                              <td class='border-bottom-0'>
                                <p class='mb-0 fw-normal'>$val</p>
                              </td>
                              <td class='border-bottom-0'>
                                <div class='d-flex align-items-center gap-2'>
                                <form action='' method='post'>
                                
                                <input type='hidden' value='$id' name='id'/>
                                <button type='submit' name='edit' class='btn btn-secondary m-1'>Edit</button>
                  <button type='submit' name='delete' class='btn btn-danger m-1'>Delete</button>  
</form>
             

                                </div>
                              </td>
                            
                            </tr> ";
                    }
                    /*
                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                      $id = $row['id'];
                      $name = $row['name'];
                      $val = $row['val'];
                    echo " 
                              <tr>
                              <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                              <td class="border-bottom-0">
                                  <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                  <span class="fw-normal">Web Designer</span>                          
                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">Elite Admin</p>
                              </td>
                              <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                                </div>
                              </td>
                            
                            </tr> ";
                    }
                    */
                    ?>
                     
                                          
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>