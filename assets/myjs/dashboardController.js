angular.module('RENTAL')

    .controller('dashboardController', function ($scope, $http, AUTHURLS, USER_MANAGE_URL, LOGINURL,toastr,$ocLazyLoad,$state,$rootScope) {
      
        document.title = "Rental System | Dashboard";

 $scope.chartConfig= {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Posts'
        },
        xAxis: {
            categories: ['Posts']
        },
        yAxis: {
            title: {
                text: 'No of Posts'
            }
        },
        series: [ {
            name: 'Clothing',
            data: [10]
        },{
            name: 'Automobile',
            data: [15]
        },{
            name: 'Furniture',
            data: [12]
        }
    ]
    
    }

}
        
        );

