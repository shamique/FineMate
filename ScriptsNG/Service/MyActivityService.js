app.service('MyActivityService', function ($http) {
    this.getFineHistory = function () {
        var res = $http.get("getFineHistory");
        return res;
    };

    this.getFineRecord = function (fineId) {
        var response = $http({
            method: "post",
            url: "getFineMoreDetail",
            params: {
                fineId: fineId,
            }
        });
        return response;
    };
});