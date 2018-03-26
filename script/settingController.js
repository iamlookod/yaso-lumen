angular.module('myApp')
    .controller('settingController', ['$http','$scope', '$rootScope', '$location', 'AuthenticationService',
        function ($http, $scope, $rootScope, $location, AuthenticationService) {
            var token = $rootScope.user.currentUser.token;

            $scope.submit = function(){
                if ($scope.password == $scope.repassword && $scope.password != null && $scope.repassword != null){

                    $http.post('http://system.cayasocoop.or.th/services/member/changepassword', { token: token, new_password: btoa($scope.password) }).then(function (response) {

                        if (response && response.data != '') {
                            console.log(response);
                            swal("บันทึกข้อมูลสำเร็จ", "", "success")

                        }else{
                            swal("บันทึกไม่สำเร็จ", "", "error")
                            $scope.password = null;
                            $scope.repassword = null;
                        }

                    });


                    swal("บันทึกข้อมูลสำเร็จ", "", "success")
                    $scope.password = null;
                    $scope.repassword = null;

                }else{
                    swal("รหัสผ่านไม่ตรงกัน", "", "info")
                }
            }




        }]);
