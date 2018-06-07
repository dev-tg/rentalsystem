angular.module('RENTAL')
        .controller('newAddPost', function ($scope, $http, AUTHURLS, USER_MANAGE_URL, LOGINURL, toastr, $ocLazyLoad, POSTURL, $state, FileUploader, $stateParams) {
            $scope.base_url = AUTHURLS.API_BASE_URL;
            document.title = "Rental|New Post";
            $http.get(AUTHURLS.API_BASE_URL + POSTURL.GETCATEGORY).then(function (res) {
                if (res.status == 200) {
                    $scope.categoryList = res.data;

                }
            });
            $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_AUTOMOBILES_CATEGORY).then(function (res) {
                if (res.status == 200) {
                    $scope.automobileTypeList = res.data;

                }
            });

            $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_STATES).then(function (res) {
                if (res.status == 200) {
                    $scope.states = res.data;

                }
            });

            $scope.getAutomobileManufracturer = function (typeId) {
                var postData = (typeId) ? typeId : $scope.post.type_id;
                $http.post(AUTHURLS.API_BASE_URL + POSTURL.GET_AUTOMOBILES_MANUFRACTURER, postData).then(function (res) {
                    if (res.status == 200) {
                        $scope.manufacturerList = res.data;

                    }
                });
            }
            $scope.getManufracturerModels = function (mfId) {
                var postData = (mfId) ? mfId : $scope.post.manufacturer_id;

                $http.post(AUTHURLS.API_BASE_URL + POSTURL.GET_MANUFRACTURER_MODELS, postData).then(function (res) {
                    if (res.status == 200) {
                        $scope.modelsList = res.data;

                    }
                });
            }
            $scope.getCities = function (stateId) {
                var postData = (stateId) ? stateId : $scope.post.state;
                $http.post(AUTHURLS.API_BASE_URL + POSTURL.GET_CITIES, postData).then(function (res) {
                    if (res.status == 200) {
                        $scope.cities = res.data;

                    }
                });
            }
            $scope.getClothingTypes = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_CLOTHING_TYPE).then(function (res) {
                    if (res.status == 200) {
                        $scope.clothingTypes = res.data;


                    }
                });
            }
            $scope.getClothingSize = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_CLOTHING_SIZE).then(function (res) {
                    if (res.status == 200) {
                        $scope.clothingSize = res.data;
                    }
                });
            }
            $scope.getClothingCategory = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_CLOTHING_CATEGORY).then(function (res) {
                    if (res.status == 200) {
                        $scope.clothingCategory = res.data;


                    }
                });
            }
            $scope.getClothingManufacturer = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_CLOTHING_MANUFACTURER).then(function (res) {
                    if (res.status == 200) {
                        $scope.clothingManufacturer = res.data;

                    }
                });
            }
            $scope.getFurnitureType = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_FURNITURE_TYPE).then(function (res) {
                    if (res.status == 200) {
                        $scope.furnitureTypes = res.data;

                    }
                });
            }
            $scope.getFurnitureCategory = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_FURNITURE_CATEGORY).then(function (res) {
                    if (res.status == 200) {
                        $scope.furnitureCategory = res.data;

                    }
                });
            }
            $scope.getFurnitureMaterial = function () {

                $http.get(AUTHURLS.API_BASE_URL + POSTURL.GET_FURNITURE_MATERIAL).then(function (res) {
                    if (res.status == 200) {
                        $scope.furnitureMaterial = res.data;

                    }
                });
            }
            $scope.getClothingTypes();
            $scope.getClothingSize();
            $scope.getClothingCategory();
            $scope.getClothingManufacturer();
            $scope.getFurnitureType();
            $scope.getFurnitureCategory();
            $scope.getFurnitureMaterial();

            $scope.selectedCategory = function () {

                ($scope.post.post_category_id == 1) ? $state.go('app.newPost.VehicleOptions') : '';
                ($scope.post.post_category_id == 2) ? $state.go('app.newPost.clothingOptions') : '';
                ($scope.post.post_category_id == 4) ? $state.go('app.newPost.furnitureOptions') : '';


                $scope.post.post_image_id = [];
                $scope.post.post_image_id = [];
            }

            $scope.savePost = function (cat) {
                if (cat == "CLOTHING") {
                    var URL = POSTURL.SAVE_CLOTHING_POST;
                    var redirect_state="clothing";
                }
                if (cat == "AUTOMOBILE") {
                    var URL = POSTURL.SAVE_POST;
                    var redirect_state="automobiles";
                }
                if (cat == "FURNITURE") {
                    var URL = POSTURL.SAVE_FURNITURE_POST;
                    var redirect_state="furniture";
                }
                $http.post(AUTHURLS.API_BASE_URL + URL, $scope.post).then(function (res) {
                    if (res.data.type == "SUCCESS") {

                        toastr.success("", res.data.message);
                      $state.go('app.posts',{type:redirect_state});
                    }
                  else{
                        $state.go('app.home');
                  }

                });

            }
            var uploader = $scope.uploader = new FileUploader({
                url: AUTHURLS.API_BASE_URL + POSTURL.UPLOAD_ATTACHMENT,
                autoUpload: "true"
            });

            // FILTERS

            uploader.filters.push({
                name: 'imageFilter',
                fn: function (item /*{File|FileLikeObject}*/, options) {
                    var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                    return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
                }
            });

            // CALLBACKS

            uploader.onWhenAddingFileFailed = function (item /*{File|FileLikeObject}*/, filter, options) {
                console.info('onWhenAddingFileFailed', item, filter, options);
            };
            uploader.onAfterAddingFile = function (fileItem) {
//            console.info('onAfterAddingFile', fileItem);
            };
            uploader.onAfterAddingAll = function (addedFileItems) {
//            console.info('onAfterAddingAll', addedFileItems);
            };
            uploader.onBeforeUploadItem = function (item) {
//            console.info('onBeforeUploadItem', item);
            };
            uploader.onProgressItem = function (fileItem, progress) {
//            console.info('onProgressItem', fileItem, progress);
            };
            uploader.onProgressAll = function (progress) {
//            console.info('onProgressAll', progress);
            };
            uploader.onSuccessItem = function (fileItem, response, status, headers) {


                $scope.post.post_image_id.push(response.value.file_id);
//            console.log($scope.post.post_image_id);


                console.info('onSuccessItem', fileItem, response, status, headers);
            };
            uploader.onErrorItem = function (fileItem, response, status, headers) {
//            console.info('onErrorItem', fileItem, response, status, headers);
            };
            uploader.onCancelItem = function (fileItem, response, status, headers) {
//            console.info('onCancelItem', fileItem, response, status, headers);
            };
            uploader.onCompleteItem = function (fileItem, response, status, headers) {
//            console.info('onCompleteItem', fileItem, response, status, headers);
            };
            uploader.onCompleteAll = function () {
//            console.info('onCompleteAll');
            };
            if ($stateParams.data)
            {
                console.log($stateParams.data);
                document.title = "Rental|EDit Post";
                var inputData = $stateParams.data;
                $scope.getCities(inputData.state);
                if(inputData.post_category_id==1){
                $scope.getManufracturerModels(inputData.manufacturer_id);
                $scope.getAutomobileManufracturer(inputData.type_id);
               }
                if(inputData.post_category_id==2){
                     $scope.getClothingTypes();
            $scope.getClothingSize();
            $scope.getClothingCategory();
            $scope.getClothingManufacturer();

                }
                
                $scope.post = inputData;

                $scope.selectedCategory();


            }
        }

        );

