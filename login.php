<?php
require 'config/config.php';

if(isset($_SESSION['login_id'])){
    header('Location: http://localhost/kdshop/index.php');
    exit;
}else{
  if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email  = '$email' AND password = '$password'";
   
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();

    if(!empty($result)) {
      foreach($result as $row){
        $_SESSION["registration_id"] = $row["registration_id"];
        header('Location: http://localhost/kdshop/index.php');
        exit;      
      }
    }
  }
}

require 'vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('782236561425-ksu96jr3r2and1lmut1bc6hvv938ig4q.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/kdshop/login.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    // var_dump($token);

    if(!isset($token["error"])){
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = $google_account_info->id;
        $full_name = trim($google_account_info->name);
        $email = $google_account_info->email;
        $profile_pic = $google_account_info->picture;

        // checking user already exists or not
        $sql = "SELECT `google_id` FROM `users` WHERE `google_id`='$id'";
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();

        if(!empty($result)) {
          $_SESSION['login_id'] = $id; 
          header('Location: http://localhost:81/kdshop/index.php');
          exit;

        } else {
            $sql = "INSERT INTO users(google_id, name, email, profile_image)VALUES(:google_id, :name, :email, :profile_image)";
            $pdo_statement = $pdo_conn->prepare($sql);
            $result = $pdo_statement->execute(array(':google_id' => $id, ':name' => $full_name, ':email' => $email, ':profile_image' => $profile_pic));

            $_SESSION["login_id"] = $id;
            header("Location: http://localhost/kdshop/index.php");
            exit;
        }
    }else{
        header('Location: http://localhost/kdshop/login.php');
        exit;
    }
    
}else{
 // Google Login Url = $client->createAuthUrl(); 
}
   
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>KD Motorshop | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include_once "include/before-body.php"; ?>
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>KD</b>Motorshop</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" required> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="forgot-password.php">I forgot my password</a><br>
        <a href="register.php" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>