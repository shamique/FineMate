app.service('DriverViewService', function ($http) {
    this.getDriverList = function () {
        var res = $http.get("../../ServerAPI/driverMasterGet.php");
        return res;
    };
});