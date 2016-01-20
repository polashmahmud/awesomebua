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

homePage.controller('loginController', function($scope,$http){
   $scope.header = 'login';
   $scope.login = {};
   $scope.postLogin = function(){
        $http.post('api/login', $scope.login).then(
          function successCallback(response){
            if(response.data == 'OK') {
              log('you are logged in');
              window.location.href ='http://localhost:8000/#/booking';
            } else {
              log('sorry try again');
            }
          },
          function successCallback(response){
            log('connection interaption');
          }
        );
   };
  // $scope.successCallback = function(data){
  //   log("OK");
  //  };
  //  $scope.errorCallback = function(){};
});

homePage.controller('profileController', function($scope){
   // $scope.header = 'profile';
});

homePage.controller('registerController', function($scope, $http){
   $scope.header = 'register';
   $scope.register = {};
   $scope.postRegister = function(){
      $http.post('api/register', $scope.register).then(successCallback, errorCallback);
   };
   $scope.successCallback = function(data){
    alert("OK");
   };
   $scope.errorCallback = function(){};
});

homePage.controller('welcomeController', function($scope){
   $scope.header = 'welcome';
});




