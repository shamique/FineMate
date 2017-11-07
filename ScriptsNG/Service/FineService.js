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

    this.saveFine = function (licenseNumber, vehicleId, officerId, deadline, fineRefNum, checkpointId, postDeptId, fineDtlObj) {

        var response = $http({
            method: "post",
            url: "Fine/saveFineRecord",
            data: {
                licenseNumber: licenseNumber,
                vehicleId: vehicleId,
                officerId: officerId,
                fineDeadline: deadline,
                fineRefNum: fineRefNum,
                checkpointId: checkpointId,
                postDepartmentId: postDeptId,
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