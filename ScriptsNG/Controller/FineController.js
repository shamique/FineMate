app.controller("FineController", function ($scope, FineService, $location, ngDialog) {
    loadPenaltyTypes();
    loadDrivers();
    loadCheckPoints();
    loadPostalDepartments();
    loadOfficers();
    loadVehicles();
    //initDropDownSuggest(["PenaltyTypeId", "DriverId", "CheckpointId", "PostDepId", "OfficerId", "VehicleId"]);
    loadNewFineNumber();

    function loadNewFineNumber() {
        var fineRes = FineService.getFineRefNumber();

        fineRes.then(function (res) {
            $scope.FineNumber = res.data;
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function initDropDownSuggest(obj) {
        obj.forEach(function (key, value) {
            $("#" + key).select2();
        });
    }

    function loadPenaltyTypes() {

        var getPenaltyData = FineService.getPenaltyTypes();
        getPenaltyData.then(function (res) {
            $scope.PenaltyTypes = res.data;
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function loadDrivers() {
        var Drivers = FineService.getDrivers();
        Drivers.then(function (res) {
            $scope.drivers = res.data
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function loadCheckPoints() {
        var CheckPoints = FineService.getCheckPoints();
        CheckPoints.then(function (res) {
            $scope.checkPoints = res.data;
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function loadPostalDepartments() {
        var PostalDepartments = FineService.getPostalDepartments();
        PostalDepartments.then(function (res) {
            $scope.PostalDepartments = res.data
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function loadOfficers() {
        var Officers = FineService.getOfficers();
        Officers.then(function (res) {
            $scope.officerList = res.data;
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }

    function loadVehicles() {
        var Vehicles = FineService.getVehicles();
        Vehicles.then(function (res) { $scope.vehicleList = res.data; }, function () { swal("Something went wrong", "", "error"); });
    }

    function openDriverPopUP() {
        $scope.Dialog = ngDialog.open({
            template: 'driverForm',
            width: '800px',
            scope: $scope
        });
    }

    function openFineForm() {
        $scope.Dialog = ngDialog.open({
            template: 'fineDetails',
            width: '800px',
            scope: $scope
        });
    }

    $scope.loadDriver = function () {
        var getDriver = FineService.loadDrvrName($scope.LicenseNumber);

        getDriver.then(function (res) {
            if (res.data.length == 0) {
                $scope.DriverName = "";
                swal("Invalid license number", "", "error");
            }
            else {
                openDriverPopUP();
                $scope.DriverName = res.data[0].FullName;
                $scope.firstName = res.data[0].FirstName;
                $scope.surname = res.data[0].Surname;
                $scope.fullName = res.data[0].FullName;
                $scope.nicNumber = res.data[0].NIC;
                $scope.DOB = parseDate(res.data[0].DOB);
                //$scope.LicenseIssueDate = parseDate(res.data[0].LicenseIssueDate);
                $scope.address = res.data[0].Address;
            }

        }, function () { swal("Something went wrong", "", "error"); })
    }

    $scope.isCourtCase = 1;

    $scope.loadCourtType = function () {
        var getPayment = FineService.getFinePayment($("#PenaltyTypeId").val());
        getPayment.then(function (res) {
            if (res != null) {
                $scope.isCourtCase = res.data.rule_violation_court_penalty_or_both;
            }
        }, function () { swal("Something went wrong", "", "error"); });
    }

    $scope.closeDialog = function () {
        $scope.Dialog.close()
    }

    function parseDate(timestamp) {
        var val = parseInt(timestamp.substr(6));
        var datevalue = new Date(parseInt(timestamp.substr(6)));
        var ret = datevalue.getMonth() + 1 + "/" + datevalue.getDate() + "/" + datevalue.getFullYear();
        return ret;
    }

    $scope.saveFine = function () {
        var check = validation();

        if (check == true) {
            var fineObj = $scope.getFineDetail();

            if (fineObj.length > 0) {
                var saveFine = FineService.saveFine($scope.LicenseNumber, $scope.VehicleId.VechicleId, $scope.OfficerId.PoliceOfficerId, $('#DateOfExpired').val(),
                    $scope.FineNumber, $scope.CheckpointId.CheckpointId, $scope.PostDepId.PostDeptId, fineObj);

                saveFine.then(function (msg) {
                    if (msg.data == "Success") {
                        swal("Successfully saved", "", "success");
                    }
                    else {
                        swal("Something went wrong", "", "error");
                    }
                }, function () {
                    swal("Something went wrong", "", "error");
                });
            }
            else {
                openFineForm();
            }
        }
        else {
            swal("Mandatory fields cannot blank", "", "error");
        }
    }

    $scope.AddFineDtl = function () {
        openFineForm();
    }

    $scope.getFineDetail = function () {
        var fDtlObj = [];

        for (var i = 0; i < $scope.fineList.length; i++) {
            //fDtlObj.push({
            //    FineAmount: $scope.fineList[i]["FineAmount"], Points: $scope.fineList[i]["Points"], FineTypId: $scope.fineList[i]["FineTypId"], courtDate: null
            //});
            var obj = {};
            obj["FineAmount"] = $scope.fineList[i]["FineAmount"];
            obj["Points"] = $scope.fineList[i]["Points"];
            obj["FineTypId"] = $scope.fineList[i]["FineTypId"];
            obj["courtDate"] = $scope.fineList[i]["courtDate"];;

            fDtlObj.push(obj);
        }
        return fDtlObj;
    }

    $scope.fineList = [];

    $scope.AddToGrid = function () {
        var getPayment = FineService.getFinePayment($("#PenaltyTypeId").val());

        getPayment.then(function (res) {
            if (res != null) {
                $scope.fineList.push({
                    'FineAmount': res.data.rule_violation_fine_charge, 'Points': res.data.rule_violation_number_of_points,
                    'FineType': res.data.rule_violation_reason, 'FineTypId': res.data.rule_violation_id, 'courtDate': $("#CourtDate").val()
                });

                $("#CourtDate").val("");
            }
            else {
                $scope.FineAmount = "";
            }
        }, function () { swal("Something went wrong", "", "error"); });
    }

    $scope.removeRow = function (FineId) {
        var index = -1;
        var fineArr = eval($scope.fineList);
        for (var i = 0; i < fineArr.length; i++) {
            if (fineArr[i].FineTypId === FineId) {
                index = i;
                break;
            }
        }
        if (index === -1) {
            swal("Something went wrong", "", "error");
        }

        $scope.fineList.splice(index, 1);
    }

    function validation() {
        var inputFields = {
            "FineNumber": $scope.FineNumber, "DriverName": $scope.DriverName
        };

        var count = 0;

        angular.forEach(inputFields, function (value, key) {
            if (value == null || value == "") {
                showError(key, "Cannot blank");
                count++;
            }
            else {
                showSuccess(key);
            }
        });

        if (count == 0) {
            return true;
        }
        else {
            return false;
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