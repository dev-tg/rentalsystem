var app = angular.module('RENTAL', [
    'rentalConstant',
    'toastr',
    'angucomplete-alt',
    'ui.router',
    'oc.lazyLoad',
    'infinite-scroll',
    'datatables',
    'ngAnimate',
    'angularFileUpload',
    'ngThumb',
   'ui.carousel',
   'highcharts-ng',
  'blockUI'
])
        .directive("sideMenu",function(){
            return{
                templateUrl:'assets/views/adminView/sideMenu.html'
            }
        })

;