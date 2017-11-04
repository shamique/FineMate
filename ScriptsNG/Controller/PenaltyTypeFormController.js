app.controller('PenaltyTypeFormController', function ($scope, PenaltyTypeFormService, $location) {
    loadPenaltyForm();

    function loadPenaltyForm() {
        var penaltyId = $location.absUrl().split('=');

        if (penaltyId[1] != null) {
            var existingPenalty = PenaltyTypeFormService.getPenaltyById(penaltyId[1]);
            existingPenalty.then(function (res) {
                $scope.Id = res.data[0].rule_violation_id;
                $scope.ViolationReason = res.data[0].rule_violation_reason;
                $("#PenaltyType").val(res.data[0].rule_violation_court_penalty_or_both);
                $scope.NoOfPoints = res.data[0].rule_violation_number_of_points;
                $scope.FineCharge = res.data[0].rule_violation_fine_charge;
            });
        }
    }
});