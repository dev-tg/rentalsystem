angular.module('RENTAL')

        .controller('adminController', function ($scope, $http, AUTHURLS, USER_MANAGE_URL, session, LOGINURL, toastr, $ocLazyLoad, $state, $rootScope) {
            if (session.getLoggedInUser().user_type==="ADMIN") {
                document.title = "Rental System | Admin";
                $rootScope.MenuSldBtn = true;

            } else {
                toastr.error("Not Allowed !");
                $state.go('app.home');
            }
        }
        );

