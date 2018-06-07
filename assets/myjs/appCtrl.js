var app = angular.module('RENTAL')
        .controller('appCtrl', function ($scope, $state, AUTHURLS, LOGINURL, $http, session) {
            $http.get(AUTHURLS.API_BASE_URL + LOGINURL.GET_SESSION).then(function (res) {
                if(res.data.result==="SUCCESS"){
                    session.setUserData(res.data.value);
                    
                }else{
                     session.setUserData(null);
                }
            }, )

        })