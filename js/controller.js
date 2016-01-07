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


homePage.controller('bookingController', function($scope){
   $scope.header = 'booking';

   $scope.days = [
                { "weekDate": "SAT", "date" : 01},
                { "weekDate": "SUN", "date" : 02},
                { "weekDate": "MON", "date" : 03},
                { "weekDate": "TUS", "date" : 04},
                { "weekDate": "WED", "date" : 05},
                { "weekDate": "THU", "date" : 06},
                { "weekDate": "FRI", "date" : 07},
                { "weekDate": "SAT", "date" : 09},
                { "weekDate": "SUN", "date" : 10},
                { "weekDate": "MON", "date" : 11},
                { "weekDate": "TUS", "date" : 12},
                { "weekDate": "WED", "date" : 13},
                { "weekDate": "THU", "date" : 14},
                { "weekDate": "FRI", "date" : 15},
                { "weekDate": "SAT", "date" : 16},
                { "weekDate": "SUN", "date" : 17},
                { "weekDate": "MON", "date" : 18},
                { "weekDate": "TUS", "date" : 19},
                { "weekDate": "WED", "date" : 20},
                { "weekDate": "THU", "date" : 21},
                { "weekDate": "FRI", "date" : 22},

            ];
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





// CALENDAR JSON








