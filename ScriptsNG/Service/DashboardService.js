app.service("DashboardService", function ($http) {
    this.getDataForDashboard = function () {
        return $http.get("Dashboard/loadDataForDashboard");
    }
});