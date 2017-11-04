app.controller('loginController', function ($scope, LoginService, $window) {
    $scope.validateLogin = function () {
        var LoginStat = LoginService.checkLogin($scope.UserName, $scope.Password);

        LoginStat.then(function (stat) {
            if (stat.data != false) {
                var role = stat.data;

                if (role == 1) {
                    $window.location.assign('Driver/MyProfile');
                }
                else if (role == 3) {
                    $window.location.assign('LicenseIssue');
                }
                else if (role == 2) {
                    $window.location.assign('Driver');
                }
                else {
                    $window.location.assign('Dashboard');
                }
            }
            else {
                swal("Invalid Login", "", "error");
            }
        }, function () {
            swal("Something went wrong", "", "error");
        });
    }
});