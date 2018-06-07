angular.module("RENTAL")
.factory('session',function(){
    var userData=null;
    
    return {getLoggedInUser: function () {
                    if (userData) {
                        return userData;
                    } else {
                        return undefined;
                    }
                }, setUserData: function (value) {
                    userData = value;
                },
               
            };

});