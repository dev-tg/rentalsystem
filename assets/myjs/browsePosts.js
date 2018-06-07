angular.module('RENTAL')
        .controller('browsePosts', function ($scope, $http, AUTHURLS, USER_MANAGE_URL, LOGINURL, toastr, $ocLazyLoad, POSTURL, $state, DTOptionsBuilder, $rootScope, DTColumnBuilder, DTColumnDefBuilder, $stateParams) {
            
                    var state = $stateParams.type;
            $rootScope.$on('$stateChangeSuccess',
                    function (event, toState, toParams, fromState, fromParams) {
                        alert();
                    })
            var start = 0;
            $scope.item = 1;
            var end = 2;
            $scope.BASE_URL = AUTHURLS.API_BASE_URL;
//$scope.viewDetails=true;
            $scope.posts = [];
            $scope.getPosts = function () {
                
                if (state == "automobiles") {
                    URL = POSTURL.GET_POSTS;
                    document.title = "Rental | Autoobiles Posts";
                }
                 if (state == "clothing") {
                     $scope.posts = [];
                    URL = POSTURL.GET_CLOTHING_POSTS;
                    document.title = "Rental | Clothing Posts";
                } if (state == "furniture") {
                     $scope.posts = [];
                    URL = POSTURL.GET_FURNITURE_POSTS;
                    document.title = "Rental | Furnitue Posts";
                }
                if (state == "all") {
                     $scope.posts = [];
                    URL = POSTURL.GET_ALL_POSTS;
                    document.title = "Rental | Posts";
                }
                
                $http.post(AUTHURLS.API_BASE_URL + URL).then(function (res) {
                    if (res.status == 200) {
                        $scope.posts = res.data;

                    }
                });
            }
            $scope.getPosts();

            $scope.showtable = function () {
                $scope.viewDetails = false;
            }
            $scope.ViewPostDetails = function (indx) {

                $scope.viewPost = $scope.posts[indx];
                console.log($scope.viewPost);
                $scope.viewDetails = true;
                $scope.getfilePaths($scope.viewPost.post_image_id);
console.log($scope.viewPost.post_image_id);
            };
            $scope.back = function () {
                $scope.viewDetails = false;
            }
            $scope.getfilePaths = function (filepaths) {
                $http.post(AUTHURLS.API_BASE_URL + POSTURL.GET_FILE_PATHS, filepaths).then(function (res) {
                    if (res.status == 200) {

                        $scope.viewPost.file_paths = res.data;
//                  
                    }
                });
            }

        });

