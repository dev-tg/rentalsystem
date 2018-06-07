angular.module('RENTAL')
        .controller('profileController', function ($scope, $http, AUTHURLS, MYDATA, toastr, POSTURL,$ocLazyLoad,$state,$rootScope) {
            console.log($rootScope.session);
            document.title = "Profile";
    $scope.editPost=function(post){
        $state.go('app.newPost',{data: post});
    }
            $scope.getProfile = function () {
                $http.get(AUTHURLS.API_BASE_URL + MYDATA.GET_PROFILE).then(function (res) {
                    if (res.status == 200) {
                        $scope.profile = res.data;

                    }
                });
            }
            $scope.getPosts = function () {
                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_MY_ALL_POSTS).then(function (res) {
                    if (res.status == 200) {
                        $scope.myPosts = res.data;

                    }
                });
            }
            $scope.getPosts();
            $scope.getProfile();
            $scope.editUser = function () {
                $scope.user = $scope.profile;
            }
            $scope.updateProfle = function () {
                $http.post(AUTHURLS.API_BASE_URL + MYDATA.UPDATE_PROFILE, $scope.user).then(function (res) {
                    if (res.status == 200) {
                        toastr.success(res.data.message);
                        $scope.getProfile();


                    }
                });

            }
            $scope.deletePost=function(post){
                $http.post(AUTHURLS.API_BASE_URL + POSTURL.DELETE_POST,{id:post.id,post_category_id:post.post_category_id}).then(function (res) {
                    if (res.status == 200) {
                        if(res.data.type==='SUCCESS'){
                        toastr.warning(res.data.message);
                        $scope.getPosts();}
                    else{
                        toastr.error(res.data.message)
                    }


                    }
                });

                
            }
        });

