app.service('DriverViewService', function ($http) {
    this.getDriverList = function () {
        var res = $http.get("Driver/getAllDrivers");
        return res;
    };
});