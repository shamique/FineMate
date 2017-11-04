app.service("FineService", function ($http) {
    this.getPenaltyTypes = function () {
        return $http.get("Fine/getPenaltyTypes");
    }

    this.getDrivers = function () {
        return $http.get("Fine/getDrivers");
    }

    this.getCheckPoints = function () {
        return $http.get("Fine/getCheckpoints");
    }

    this.getPostalDepartments = function () {
        return $http.get("Fine/getPostalDepartments");
    }

    this.getOfficers = function () {
        return $http.get("Fine/getPoliceOfficers");
    }

    this.getFineRefNumber = function () {
        return $http.get("Fine/loadFineReferenceNumber");
    }

    this.loadDrvrName = function (drvId) {
        var response = $http({ method: "get", url: "Fine/loadDriver", params: { licenseNumber: drvId } });
        return response;
    }

    this.loadFineById = function (fineId) {
        return $http({ method: "get", url: "Fine/getFineById", params: { fineId: fineId } });
    }

    this.getVehicles = function () {
        return $http.get("Fine/loadVehicles");
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
            url: "Fine/getFineAmount",
            params: {
                penaltyTypeId: fineTypId
            }
        });
        return response;
    }
});