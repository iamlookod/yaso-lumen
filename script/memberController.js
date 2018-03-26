angular.module('myApp')
    .controller('memberController', ['$http','$scope', '$rootScope', '$location', 'AuthenticationService',
        function ($http, $scope, $rootScope, $location, AuthenticationService) {
            var token = $rootScope.user.currentUser.token;
            $http.post('http://localhost:8888/yaso-coop/services/member/data', { token: token  }).then(function (response) {

                if (response) {
                    $scope.data = response.data;
                    $scope.date_rq = thaidate(response.data.member_date_rq);
                    $scope.date_rg = thaidate(response.data.member_date_rg);
                    $scope.birthdate = thaidate(response.data.member_birth);
                }

            });

            function thaidate(param){
                var dt = param.split("-");
                var day = dt[2];
                var month = dt[1];
                var year = parseInt(dt[0]) + 543;

                return day+"/"+month+"/"+year;

            }

        }]);