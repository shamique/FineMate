app.service('FineMasterService', function ($http) {
    this.getFines = function () {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/fineMasterGet.php",
            data: {
                fineId: 0,
            }
        });
        return response;
    };

    this.getFineRecord = function (fineId) {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/fineMasterGet.php",
            data: {
                fineId: fineId,
            }
        });
        return response;
    };
});