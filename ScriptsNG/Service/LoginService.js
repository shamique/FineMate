app.service("LoginService", function ($http) {
    this.checkLogin = function (Uname, password) {
        var response = $http({
            method: "post",
            url: "Login/ValidateLogin",
            params: {
                userName: Uname,
                Password: password
            }
        });
        return response;
    }
});