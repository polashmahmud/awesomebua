//Angular Routes

homePage.config(function($routeProvider){
    $routeProvider
        .when('/',
            {
                controller: 'welcomeController',
                templateUrl: 'views/welcome.html'
            })
        .when('/booking',
            {
                controller: 'bookingController',
                templateUrl: 'views/booking.html'
            })
        .when('/dashboard',
            {
                controller: 'dashboardController',
                templateUrl: 'views/dashboard.html'
            })
        .when('/login',
            {
                controller: 'loginController',
                templateUrl: 'views/login.html'
            })
        .when('/profile',
            {
                controller: 'profileController',
                templateUrl: 'views/profile.html'
            })
        .when('/register',
            {
                controller: 'registerController',
                templateUrl: 'views/register.html'
            })

        .otherwise(
            {
                retirectTo: '/'
            }
        )
});

homePage.controller('dashboardController', function($scope){
   $scope.header = 'dashboard';
});

homePage.controller('loginController', function($scope){
   $scope.header = 'login';
});

homePage.controller('profileController', function($scope){
   // $scope.header = 'profile';
});

homePage.controller('registerController', function($scope){
   $scope.header = 'register';
});

homePage.controller('welcomeController', function($scope){
   $scope.header = 'welcome';
});




