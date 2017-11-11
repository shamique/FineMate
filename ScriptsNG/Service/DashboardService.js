app.service("DashboardService", function ($http) {
    this.getDataForDashboard = function (typeId) {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/dashboardGet.php",
            data: {
                type: typeId
            }
        });

        return response;
    }
});