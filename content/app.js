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
    .when('/second', {
        templateUrl: 'pages/second.html',
        controller: 'secondController'
    })
    // This is what makes single page
});

myApp.controller('mainController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'Primary';
    
}]);

myApp.controller('secondController', ['$scope', '$log', function($scope, $log) {
    
    $scope.name = 'Secondary';
    
}]);
