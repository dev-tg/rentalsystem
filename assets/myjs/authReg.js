angular.module('RENTAL')

        .controller('authReg', function ($scope, $http, AUTHURLS, USER_MANAGE_URL, LOGINURL, session, $state, toastr, $rootScope) {
            $scope.countries = [
                {"id": "1", "name": "India"},
                {"id": "2", "name": "US"}
            ]

            $scope.register = function () {
                $http({
                    method: 'POST',
                    url: AUTHURLS.API_BASE_URL + USER_MANAGE_URL.REGISTER,
                    data: $scope.userReg,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (jsondata) {
                    if (jsondata.data.type === 'SUCCESS')
                    {
                        toastr.success(jsondata.data.message);
                        $scope.userReg = {};
                    }
                }, function (jsondata) {
                    console.log("ErrorCode:" + jsondata.status);
                });
            }
            $scope.checkUser = function () {
                $http({
                    method: 'POST',
                    url: AUTHURLS.API_BASE_URL + USER_MANAGE_URL.CHECKUSER,
                    data: $scope.userReg.username,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (jsondata) {
                    if (jsondata.status == '200')
                    {
                        $scope.userExist = jsondata.data.isExist
                    }
                }, function (jsondata) {
                    console.log("ErrorCode:" + jsondata.status);
                });
            }

            $scope.login = function () {


                $http({
                    method: 'POST',
                    url: AUTHURLS.API_BASE_URL + LOGINURL.LOGIN,
                    data: $scope.userLogin,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (jsondata) {
                    if (jsondata.data.type === 'TRUE')
                    {
                        session.setUserData(jsondata.data.value);
                        if (session.getLoggedInUser().user_type === "ADMIN") {
                            $state.go('admin.dashboard');
                        }
                        window.location = AUTHURLS.API_BASE_URL + LOGINURL.HOME;
                        $state.go('admin.dashboard');
                        toastr.success(jsondata.data.message, "");
                        ;
                    } else {
                        toastr.error(jsondata.data.message, "");
                    }
                }, function (jsondata) {
                    console.log("ErrorCode:" + jsondata.status);
                });

            }

        }
        );

