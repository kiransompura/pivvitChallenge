routerApp.controller('purchaseController', function ($scope, $http, $filter, DTOptionsBuilder, DTColumnDefBuilder) {

    $scope.plist = [];
    $scope.offerlist = [];
    $scope.price = 0;
    $http({
        url: 'api/offer',
        method: 'get',
    }).success(function (response) {
        $scope.offerlist = response.data;
    });

    $http({
        url: 'api/purchases',
        method: 'get',
        data: $scope.purchase,

    }).success(function (response) {
        $scope.plist = response.data;
    });


    $scope.addPurchase = function () {

        $http({
            url: 'api/purchases',
            method: 'POST',
            data: $scope.purchase,

        }).success(function (response) {
            if (response.message) {
                $scope.success = response.message;
               
            } else if (response.error)
            {
                $scope.error = response.error;
                
            }
            console.log('response', response);
        });
    }
    $scope.setPrice = function () {

        angular.forEach($scope.offerlist, function (value, key) {
            if (value.id == $scope.purchase.offering_id) {
                $scope.price = value.price * $scope.purchase.quantity;
            }
        });
    }

    $scope.dtOptions = DTOptionsBuilder.newOptions().withPaginationType('full_numbers').withDisplayLength(2);
    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1).notVisible(),
        DTColumnDefBuilder.newColumnDef(2).notSortable()
    ];

});

