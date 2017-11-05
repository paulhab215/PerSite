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

    // This is what makes single page
});

myApp.controller('mainController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'Primary';
    
}]);

myApp.controller('registerController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'registerary';
    
}]);

myApp.controller('loginController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'loginary';
    
}]);