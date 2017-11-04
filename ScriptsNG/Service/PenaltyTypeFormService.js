app.service('PenaltyTypeFormService', function ($http) {
    this.getPenaltyById = function (pId) {
        var response = $http({
            method: "post",
            url: "getPenaltyById",
            data: {
                penaltytypId: pId,
            }
        });

        return response;
    }
});