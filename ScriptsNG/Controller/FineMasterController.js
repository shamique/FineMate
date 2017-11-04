app.controller('FineMastercontroller', function ($scope, FineMasterService, ngDialog, NgMap) {
    loadFine();

    //NgMap.getMap().then(function (map) {
    //    console.log(map.getCenter());
    //    console.log('markers', map.markers);
    //    console.log('shapes', map.shapes);
    //});

    //Function  to load all Orders
    function loadFine() {
        var fineList = FineMasterService.getFines();
        fineList.then(function (resp) {
            $scope.Fines = resp.data;
        }, function (err) {
            $scope.Message = "Call Failed " + err.status;
        });
    };

    $scope.sort = function (keyname) {
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.closeDialog = function () {
        $scope.Dialog.close()
    }

    $scope.viewFine = function (fId) {
        $scope.Dialog = ngDialog.open({
            template: 'fineForm',
            width: '800px',
            scope: $scope
        });

        var fineRes = FineMasterService.getFineRecord(fId);

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

    $scope.getDate = function(timestamp) {
        var val = parseInt(timestamp.substr(6));
        var datevalue = new Date(parseInt(timestamp.substr(6)));
        var ret = datevalue.getFullYear() + "-" + (datevalue.getMonth() + 1) + "-" + datevalue.getDate();
        return ret;
    }
});