app.service('PenaltyTypeService', function ($http) {
    this.getPenaltyTypes = function () {
        return $http.get("Configuration/getPenaltyList");
    }
});