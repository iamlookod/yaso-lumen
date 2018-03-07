var app = angular.module('myApp', ["ngRoute","ng-sweet-alert"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "main.html"
        })
        
});

app.controller('test', function ($scope) {
    $scope.testalert = function () {
        swal("Oops!", "Something went wrong!", "error")
    }
});