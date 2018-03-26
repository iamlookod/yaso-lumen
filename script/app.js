'use strict';

angular.module('Authentication', []);
var app = angular.module('myApp', ["ngRoute", "ng-sweet-alert", "angular-page-loader", "ngCookies", "Authentication"]);

app.run(function ($timeout, $rootScope, $location, AuthenticationService, $cookieStore, $http) {

        $timeout(function () { 
            $rootScope.isLoading = false;  
        }, 1000)

        $rootScope.user = $cookieStore.get('user') || {};

        if ($rootScope.user.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.user.currentUser.authdata; // jshint ignore:line
        }

        $rootScope.$on('$locationChangeStart', function (event, next, current) {
            if ($location.path() !== '/login' && !$rootScope.user.currentUser) {
                $location.path('/login');
            }
        });

        $rootScope.logout = function(){
            AuthenticationService.ClearCredentials();
            $location.path('/login');
        }

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
            templateUrl: "login.html",
            controller: "loginController"
        })
        .when("/member", {
            templateUrl: "member.html",
            controller: "memberController"
        })
        .when("/setting", {
            templateUrl: "setting.html",
            controller: "settingController"
        })
        .otherwise({ 
            redirectTo: '/login' 
        });

        
        
});

// app.controller('test', function ($scope) {
//     $scope.testalert = function () {
//         swal("Oops!", "Something went wrong!", "success")
//     }
// });
