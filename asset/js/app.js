var app = angular.module('myApp', ["ngRoute", "ng-sweet-alert", "angular-page-loader"]);

app.run(function ($timeout, $rootScope) {

        $timeout(function () { // simulate long page loading 
            $rootScope.isLoading = false; // turn "off" the flag 
        }, 1000)

    })


app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "main.html"
        })
        .when("/index", {
            templateUrl: "main.html"
        })
        .when("/login", {
            templateUrl: "login.html"
        })
        .when("/member", {
            templateUrl: "member.html",
            controller: "memberController"
        })
        
});

app.controller('memberController', function ($scope, $http) {
    $http.get('http://localhost:8888/yaso-coop/services/login/get').then(function(response){
        
        if(response.data.status == 200){
            $scope.data = response.data.data;
        }

    });

});

app.controller('test', function ($scope) {
    $scope.testalert = function () {
        swal("Oops!", "Something went wrong!", "success")
    }
});