app.service("DriverProfileService", function ($http) {
    this.getProfileData = function () {
        return $http.get("loadDriverProfile");
    }
});