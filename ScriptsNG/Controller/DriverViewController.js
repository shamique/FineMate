app.controller('DriverViewController', function ($scope, DriverViewService) {
    loadDrivers();

    function loadDrivers() {
        var driverList = DriverViewService.getDriverList();
        driverList.then(function (resp) {
            $scope.Drivers = resp.data;
        }, function (err) {
            alert("Something went");
        });
    };

    $scope.sort = function (keyname) {
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
});