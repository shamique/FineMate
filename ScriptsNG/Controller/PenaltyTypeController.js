app.controller('PenaltyTypeController', function ($scope, PenaltyTypeService, $window) {
    loadPenalty();

    function loadPenalty() {
        var penalties = PenaltyTypeService.getPenaltyTypes();
        penalties.then(function (resp) {
            $scope.penalties = resp.data;
        }, function (err) {
            $scope.Message = "Call Failed " + err.status;
        });
    };

    $scope.ViewPenalty = function (pID) {
        if (pID == 0) {
            $window.location.assign('Configuration/PenaltyTypeForm');
        }
        else {
            $window.location.assign('Configuration/PenaltyTypeForm?penaltyTypeId=' + pID);
        }
    }
});