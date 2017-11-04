app.controller('MyActivityController', function ($scope, MyActivityService, ngDialog) {
    loadDrivers();

    function loadDrivers() {
        var fineList = MyActivityService.getFineHistory();
        fineList.then(function (resp) {
            $scope.Fines = resp.data;
        }, function (err) {
            alert("Something went");
        });
    };

    $scope.sort = function (keyname) {
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.viewFine = function (fId) {
        $scope.Dialog = ngDialog.open({
            template: 'fineForm',
            width: '800px',
            scope: $scope
        });

        var fineRes = MyActivityService.getFineRecord(fId);

        fineRes.then(function (res) {
            $scope.rule_violation_reason = res.data[0].rule_violation_reason;
            $scope.rule_violation_number_of_points = res.data[0].rule_violation_number_of_points;
            $scope.rule_violation_fine_charge = res.data[0].rule_violation_fine_charge;
            $scope.fine_violation_task_completed = res.data[0].fine_violation_task_completed;
            $scope.fine_violation_appointment_date_court = res.data[0].fine_violation_appointment_date_court;
        }, function () {
            swal("Something went wrong", "", "error");
        });
    };

    $scope.closeDialog = function () {
        $scope.Dialog.close()
    }
});