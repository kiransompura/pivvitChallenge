routerApp.controller('purchaseController', function ($scope, $http, $filter) {

    $scope.plist = [];
    $scope.offerlist = [];
    //$scope.price = 0;
    $http({
        url: 'api/offer',
        method: 'get',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).success(function (response) {
        $scope.offerlist = response.data;
        console.log('response', response);
    });

    $http({
        url: 'api/purchases',
        method: 'get',
        data: $scope.purchase,

    }).success(function (response) {

        $scope.plist = response.data;
        console.log('response', $scope.plist);
    });


    $scope.addPurchase = function () {

        //$scope.purchase.offering_id = JSON.parse($scope.purchase.offering_id).id;
        $http({
            url: 'api/purchases',
            method: 'POST',
            data: $scope.purchase,

        }).success(function (response) {
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


});

