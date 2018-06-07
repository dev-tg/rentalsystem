var app = angular.module('RENTAL');

app.config(function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('app/home');
    $stateProvider
            
            .state({
                name: 'admin',
                url: '/admin',
                abstract: true,
                templateUrl: 'assets/views/adminView/rootAdmin.html',
                controller: "adminController",
                resolve: {// Any property in resolve should return a promise and is executed before the view is loaded
                    loadMyCtrl: ['$ocLazyLoad', function ($ocLazyLoad) {
                            // you can lazy load files for an existing module
                            return $ocLazyLoad.load('assets/myjs/adminController.js');
                        }]
                }
              
            })
            .state({
                name: 'admin.dashboard',
                url: '/dashboard',
                templateUrl: 'assets/views/adminView/dashboardView.html',
                controller: "dashboardController",
                resolve: {// Any property in resolve should return a promise and is executed before the view is loaded
                    loadMyCtrl: ['$ocLazyLoad', function ($ocLazyLoad) {
                            // you can lazy load files for an existing module
                            return $ocLazyLoad.load('assets/myjs/dashboardController.js');
                        }]
                }
            })
            .state({
                name: 'admin.manageVehicleTypes',
                url: '/manageVehicleTypes',
                templateUrl: 'assets/views/adminView/vehicle_types_master.html',
                controller: "dashboardController",
                resolve: {// Any property in resolve should return a promise and is executed before the view is loaded
                    loadMyCtrl: ['$ocLazyLoad', function ($ocLazyLoad) {
                            // you can lazy load files for an existing module
                            return $ocLazyLoad.load('assets/myjs/dashboardController.js');
                        }]
                }
            })
            .state({
                name: 'app',
                url: '/app',
                abstract:true,
                templateUrl: 'assets/views/homeView/userAppRoot.html',
                controller: "userAppRootCtrl",
                resolve: {// Any property in resolve should return a promise and is executed before the view is loaded
                    loadMyCtrl: ['$ocLazyLoad', function ($ocLazyLoad) {
                            // you can lazy load files for an existing module
                            return $ocLazyLoad.load('assets/myjs/userAppRootCtrl.js');
                        }]
                }
            }) 
            .state({
                name: 'app.home',
                url: '/home',
                templateUrl: 'assets/views/homeView/homePage.html',
                controller: "homeCtrl",
                resolve: {// Any property in resolve should return a promise and is executed before the view is loaded
                    loadMyCtrl: ['$ocLazyLoad', function ($ocLazyLoad) {
                            // you can lazy load files for an existing module
                            return $ocLazyLoad.load('assets/myjs/homeCtrl.js');
                        }]
                }
            })
            .state({
                name: 'app.newPost',
                url: '/newPost',
                'templateUrl': 'assets/views/homeView/newAddPost.html',
                'controller': 'newAddPost',
                params:{data:null},
                resolve: {
                    loadController: ['$ocLazyLoad', function ($ocLazyLoad) {
//                            return $ocLazyLoad.load();
                        }]
                }
            })

            .state({name: 'app.newPost.VehicleOptions',
                url: '/vehice',
                'templateUrl': 'assets/views/homeView/vehicleOptions.html',
                'controller': 'newAddPost'


            })

            .state({name: 'app.newPost.clothingOptions',
                url: '/clothing',
                'templateUrl': 'assets/views/homeView/clothingOptions.html',
                'controller': 'newAddPost'})
            .state({name: 'app.newPost.furnitureOptions',
                url: '/furniture',
                'templateUrl': 'assets/views/homeView/furnitureOptions.html',
                'controller': 'newAddPost'})

            .state({name: 'app.posts',
                url: '/posts/:type',
                'templateUrl': 'assets/views/postViews/postView.html',
                'controller': 'browsePosts',
                resolve: {
                    loadController: ['$ocLazyLoad', function ($ocLazyLoad) {
                            return $ocLazyLoad.load('assets/myjs/browsePosts.js');
                        }]
                }


            })
            
            .state({name: 'app.profile',
                url: '/profile',
                'templateUrl': 'assets/views/profileView/profileView.html',
                'controller': 'profileController',
                resolve: {
                    loadController: ['$ocLazyLoad', function ($ocLazyLoad) {
                            return $ocLazyLoad.load('assets/myjs/profileController.js');
                        }]
                }


            })
            
            


})

