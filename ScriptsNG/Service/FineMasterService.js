app.service('FineMasterService', function ($http) {
    this.getFines = function () {
        var res = $http.get("loadFineMaster");
        return res;
    };

    this.getFineRecord = function (fineId) {
        var response = $http({
            method: "post",
            url: "getFineById",
            params: {
                fineId: fineId,
            }
        });
        return response;
    };
});