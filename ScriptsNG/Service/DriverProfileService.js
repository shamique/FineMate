app.service("DriverProfileService", function ($http) {
    this.getProfileData = function(typeId) {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/driverProfileGet.php",
            data: {
                type: typeId
            }
        });
        return response;
    }

    this.getFineHistory = function(typeId) {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/driverProfileGet.php",
            data: {
                type: typeId
            }
        });
        return response;
    }

    this.getNotifications = function(typeId) {
        var response = $http({
            method: "post",
            url: "../../ServerAPI/driverProfileGet.php",
            data: {
                type: typeId
            }
        });
        return response;
    }
});