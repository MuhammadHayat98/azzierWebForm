<?php
session_start();

if ($_SESSION['auth'] != 1 || !isset($_SESSION['auth'])) {
    header('Location: ../index.php');
    exit();
}
require "../libs/PPMLib/XMLHandler.php";
if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['auth'] = 1;

    $wo = $_POST['WO'];
    $hours = $_POST['hours'];
    $timeType = $_POST['type'];
    $comment = $_POST['comments'];

    $array = array(
        'WOLabour' => array(
            'Comments' => $comment,
            'Hours' => $hours,
            'LaborType' => $timeType,
            'WoNum' => $wo,
            'EmpId' => $_SESSION['username'],
            'Craft' => ''
        )
    );
$xmlHandler = new XMLHandler($array);
$result = $xmlHandler->getXML();


//send xml file to azzier
$client = new http\Client;
$request = new http\Client\Request;
$body = new http\Message\Body;
$body->addForm(array(
  'xml' => $result,
  'interfacename' => 'WOTIMEENTRY'
), NULL);
$request->setRequestUrl('https://csuntest.azzier.com/api/interface');
$request->setRequestMethod('POST');
$request->setBody($body);
$request->setHeaders(array(
  'postman-token' => '9ec9d460-61ca-cfb1-8625-3d84d7a82890',
  'cache-control' => 'no-cache',
  'password' => 'monday9*9',
  'username' => 'interface_rw'
));
$client->enqueue($request)->send();
$response = $client->getResponse();
echo $response->getBody();

     

} else {
    $message = '<label>Please enter your time tracking information</label>';
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Azzier Time tracking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <style>
        body {
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">
                <img src="../img/ppm.svg" alt="CSUN Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Time Tracking
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link">Welcome,
                            <?php echo $_SESSION['username']; ?>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="../php/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Azzier Time tracking</h1>
            </div>
        </div>

        <div class="row">
            <form  method="POST">
                    <hr>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="clientTitle">WO #</label>
                        <input type="text" class="form-control" name="WO" id="WO" required>
                    </div>
                    <div class="form-group col">
                        <label for="clientTitle">Hours</label>
                        <input type="text" class="form-control" name="hours" id="hours" required>
                    </div>
                    <div class="form-group col">
                        <label for="clientTitle">Time Type</label>
                        <input type="text" class="form-control" name="type" id="type" required>
                    </div>
                    <div class="form-group col">
                        <label for="clientTitle">Comments</label>
                        <input type="text" class="form-control" name="comments" id="comments" required>
                    </div>
                </div>
                <!-- Add function after POST works
                <button class="btn btn-outline-primary" type="button">Add</button>
                <button class="btn btn-outline-danger" type="button">Remove</button>
                -->
                <hr>
                <button class="btn btn-outline-success" type="submit" id="submit" name="submit" valu>Submit</button>
                <?php
                if (isset($message)) {
                    echo '<label class="text-danger">' . $message . '</label>';
                }
                ?>
            </form>
        </div>
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