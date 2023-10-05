
<?php
include_once "config/config.php";

//echo "Connection has been set successfully";
$sql = "SELECT COUNT(*) total FROM products";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$prodRowCount = $pdo_statement->fetchAll();

$sql = "SELECT COUNT(*) total FROM categories";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$catRowCount = $pdo_statement->fetchAll();

$sql = "SELECT COUNT(*) total FROM brands";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$brandRowCount = $pdo_statement->fetchAll();

$sql = "SELECT COUNT(*) total FROM users";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$userRowCount = $pdo_statement->fetchAll();

if(!isset($_SESSION['login_id'])){
  if (!isset($_SESSION["registration_id"])) {
    header('Location: http://localhost:81/kdshop/login.php');
    exit;
  }
}

$whereClause = "";

if(isset($_SESSION["login_id"])) {
  $id = $_SESSION['login_id'];
  $whereClause = "google_id";
}

if(isset($_SESSION["registration_id"])) {
  $id = $_SESSION['registration_id'];
  $whereClause = "registration_id";
}

$sql = "SELECT * FROM users WHERE " . $whereClause . " = '$id'";

$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

if(!empty($result)){
  foreach($result as $row) {
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $row["email"];
    if (isset($_SESSION["login_id"])) {
      $_SESSION["profile_image"] = $row["profile_image"];
    } else {
      $_SESSION["profile_image"] = "dist/img/user.png";
    }
  }
} else {
  header('Location: http://localhost:81/kdshop/logout.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>KD Motoshop | Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include_once "include/before-body.php"; ?>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include_once "include/main-header.php"; ?>
      <?php include_once "include/main-sidebar.php"; ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <?php include_once "include/content-header.php"; ?>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <?php include_once "include/info-boxes.php"; ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include_once "include/footer.php"; ?>
    </div><!-- ./wrapper -->

    <?php include_once "include/after-footer.php"; ?>
  </body>
</html>