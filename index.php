<?php
include 'php/config.php';
session_start();
echo session_id();
print_r($_SESSION);
$_SESSION['auth'] = 0;
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$pass = $_POST['password'];
$ldaprdn = "uid=" . $username . ",ou=People, ou=Auth, o=CSUN";
$result = ldap_search($ldap, $ldaprdn, "");
if($result) {
    $_SESSION["username"] = $username;
}
if($ldap) {
    $ldapbind = ldap_bind($ldap, $ldaprdn, $pass);
        if($ldapbind && $_SESSION["username"] == $username) {
            $_SESSION['auth'] = 1;
            header("Location: form");
        }
        else {
            $message = '<label>Incorrect username or password</label>';
            
        }
  
    }

}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Azzier Time Tracking - CSUN PPM</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
            crossorigin="anonymous">
    </head>

    <body>
        <!-- Just an image -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="img/ppm.svg" alt="CSUN Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
        <!-- End NavBar-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center" style="padding:30px;">Login</h1>
                </div>
            </div>
            <div class="jumbotron wumbo">
                <div class="col-md">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Username" name="username"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <?php
                        if (isset($message)) {
                             echo '<label class="text-danger">'.$message.'</label>';
                        }
                    ?>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit" value="Submit" onclick="">Submit</button>
                    </form>
                </div>
            </div>
            <footer>
            © PPM-MIS
            </footer>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
                crossorigin="anonymous"></script>
    </body>

    </html>