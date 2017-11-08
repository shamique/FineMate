app.service("FineService", function ($http) {
    this.getPenaltyTypes = function () {
        return getDataFromService(1);
    }

    this.getDrivers = function () {
        return getDataFromService(2);
    }

    this.getCheckPoints = function () {
        return getDataFromService(6);
    }

    this.getPostalDepartments = function () {
        return getDataFromService(7);
    }

    this.getOfficers = function () {
        return getDataFromService(3);
    }

    this.getFineRefNumber = function () {
        return getDataFromService(5);
    }

    this.loadDrvrName = function (drvId) {
        var response = $http({ method: "post", url: "../ServerAPI/fineFormGet.php", data: { typeId: 8, OptionalParam: drvId } });
        return response;
    }

    this.loadFineById = function (fineId) {
        return $http({ method: "get", url: "Fine/getFineById", params: { fineId: fineId } });
    }

    this.getVehicles = function () {
        return getDataFromService(4);
    }

    this.getVehicleOwner= function(vhId){
        var response = $http({ method: "post", url: "../ServerAPI/fineFormGet.php", data: { typeId: 10, OptionalParam: vhId } });
        return response;
    }

    this.saveFine = function (driverId, vehicleOwnerId, officerId, fineRefNum, checkpointId, postDeptId, fineDtlObj) {
        var response = $http({
            method: "post",
            url: "../ServerAPI/fineOperation.php",
            data: {
                driverId: driverId,
                vehicleOwnerId: vehicleOwnerId,
                officerId: officerId,
                referenceNumber: fineRefNum,
                checkPointId: checkpointId,
                postalDeptId: postDeptId,
                FineDetailList: fineDtlObj
            }
        });

        return response;
    }

    this.getFinePayment = function (fineTypId) {
        var response = $http({
            method: "post",
            url: "../ServerAPI/fineFormGet.php",
            data: {
                typeId: 9,
                OptionalParam: fineTypId
            }
        });
        return response;
    }

    function getDataFromService(typeId){
        var response = $http({
            method: "post",
            url: "../ServerAPI/fineFormGet.php",
            data: {
                typeId: typeId
            }
        });
        
        return response;
    }
});