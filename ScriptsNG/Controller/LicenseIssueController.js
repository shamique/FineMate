app.controller('LicenseIssueController', function ($scope, LicenseIssueService, ngDialog, $window) {
    loadFine();

    function loadFine() {
        var fineList = LicenseIssueService.getFines();
        fineList.then(function (resp) {
            $scope.Fines = resp.data;
        }, function (err) {
            $scope.Message = "Call Failed " + err.status;
        });
    };

    $scope.isPaidSelect = [{ id: 1, value: 'Paid' }, { id: 2, value: 'Not paid' }];

    $scope.sort = function (keyname) {
        $scope.sortKey = keyname;
        $scope.reverse = !$scope.reverse;
    }

    $scope.closeDialog = function () {
        $scope.Dialog.close()
    }

    $scope.FineId = 0;

    $scope.viewFine = function (fId) {
        $scope.Dialog = ngDialog.open({
            template: 'fineForm',
            width: '800px',
            scope: $scope
        });

        $scope.FineId = fId;

        var fineRes = LicenseIssueService.getFineRecord(fId);

        fineRes.then(function (res) {
            $scope.fineNumber = res.data[0].fineNumber;
            $scope.driverName = res.data[0].driverName;
            $scope.licenseNumber = res.data[0].licenseNumber;
            $scope.vehicleNumber = res.data[0].vehicleNumber;
            $scope.penalty = res.data[0].penalty;
            $scope.reason = res.data[0].reason;
            $scope.fineAmount = res.data[0].fineAmount == 0 ? "N/A" : res.data[0].fineAmount;
            $scope.courtAppointmentDate = res.data[0].appointmentDate == null ? "N/A" : $scope.getDate(res.data[0].appointmentDate);
            $scope.Status = res.data[0].Status;
            $scope.Longitude = res.data[0].Longitude,
            $scope.Lattitude = res.data[0].Lattitude
        }, function () {
            swal("Something went wrong", "", "error");
        });
    };

    $scope.getDate = function (timestamp) {
        var val = parseInt(timestamp.substr(6));
        var datevalue = new Date(parseInt(timestamp.substr(6)));
        var ret = datevalue.getFullYear() + "-" + (datevalue.getMonth() + 1) + "-" + datevalue.getDate();
        return ret;
    }

    $scope.saveLicenseIssue = function () {
        if ($("#receiptNo").val() != "") {
            var saveRecord = LicenseIssueService.issueFine($scope.FineId, $("#receiptNo").val());

            saveRecord.then(function (res) {
                if (res.data == "Success") {
                    swal("Successfully saved", "", "success");
                    $window.location.reload();
                }
                else {
                    swal("Something went wrong", "", "error");
                }
            }, function () {
                swal("Something went wrong", "", "error");
            });
        }
        else {
            showError("receiptNo", "Field cannot blank");
        }
    }

    function showError(id, errorMessage) {
        $("#" + id).parent().removeClass("input-group has-success");
        $("#" + id).parent().addClass("input-group has-error");
        $("#validate_" + id).html(errorMessage);
    }

    function showSuccess(id) {
        $("#" + id).parent().removeClass("input-group has-error");
        $("#" + id).parent().addClass("input-group has-success");
        $("#validate_" + id).html('');
    }
});