//simple single page application
var myApp = angular.module('myApp', ['ngRoute']);

//pass into myapp config unique routes
myApp.config(function ($routeProvider) {
    
    $routeProvider
    
    //fragment identifier default/main page
    .when('/', {
        templateUrl: 'pages/main.html',
        controller: 'mainController'
    })
    //fragment identifier specified
    .when('/login', {
        templateUrl: 'pages/login.html',
        controller: 'loginController'
    })

    //fragment identifier specified
    .when('/register', {
        templateUrl: 'pages/register.html',
        controller: 'registerController'
    })

    //fragment identifier specified
    .when('/earnway', {
        templateUrl: 'pages/earnway.html',
        controller: 'earnwayController'
    })

    // This is what makes single page
});

myApp.controller('mainController', ['$scope', '$log', function($scope, $log) {
    
    
}]);

myApp.controller('registerController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'registerary';
    
}]);

myApp.controller('loginController', ['$scope', '$log', '$http','$location', function($scope, $log,$http,$location) {
    
    $scope.login;

    $scope.checkCred = function() {
          $http({
               method: 'POST',
               url:  'get.php',
              data: { username : $scope.user_name, pass: $scope.pass_main }
          }).then(function (response) {// on success
            console.log(response);
            if(response.data == "success"){
              $location.path( "/register" );
            }else{
                $scope.login.error = response.data;
            }

          }, function (response) {
               console.log(response.data,response.status);
               
          });
    };

    $scope.name = 'loginary';
    
}]);


myApp.controller('earnwayController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'earnwayary';
    
}]);