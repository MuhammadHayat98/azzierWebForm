<?php
session_start();


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
            <form action="POST">
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
                <button class="btn btn-outline-primary" type="button">Add</button>
                <button class="btn btn-outline-danger" type="button">Remove</button>
                <hr>
                <button class="btn btn-outline-success" type="button" id="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
    </div>

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