angular.module('Authentication')
    .controller('loginController', ['$scope', '$rootScope', '$location', 'AuthenticationService',
        function ($scope, $rootScope, $location, AuthenticationService) {
        // AuthenticationService.ClearCredentials();

        $scope.login = function(){
            AuthenticationService.Login($scope.username, btoa($scope.password),function (response){
                AuthenticationService.ClearCredentials();
                if (response && response.data != ''){
                    AuthenticationService.SetCredentials(response.data);
                    $location.path('/');
                }else{
                    $scope.error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                }

            })
        };

}]);