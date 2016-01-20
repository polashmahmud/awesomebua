<!doctype html>
<html lang="en" ng-app="awesomeBua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Angular Route Test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="favicon.png">
</head>
<body>
    <div class="container">
        <div class="navbar navbar-default">
            <div class="navbar-inner">
                <a class="navbar-brand" href="#/">Route Test</a>
                <ul class="nav navbar-nav">
                    <li> <a href="#/booking"> Booking </a> </li>
                    <li> <a href="#/dashboard"> Dashboard </a> </li>
                    <li> <a href="#/login"> Login </a> </li>
                    <li> <a href="#/register"> Register </a> </li>
                    <li> <a href="{{ URL::to('api/logout') }}"> Logout </a> </li>
                </ul>
            </div>
        </div>

        <div ng-view=""></div>
        <!--this space for dynamic view-->
    </div>

    <!--jQuery/Angular-->
    <script src="js/jquery-2.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/controller.js"></script>
    <script src="js/booking.js"></script>
    <script src="js/logincheck.js"></script>
</body>
</html>