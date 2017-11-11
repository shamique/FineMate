app.controller('loginController', function ($scope, LoginService, $window) {
    $scope.validateLogin = function () {
        var LoginStat = LoginService.checkLogin($scope.UserName, $scope.Password);

        LoginStat.then(function (stat) {
            var role = stat.data[0];
            if (role != null) {
                if (role == 1) {
                    $window.location.assign('Driver/MyProfile');
                }
                else if (role == 5) {
                    $window.location.assign('Dashboard');
                }
                else {
                    swal("Invalid Login", "", "error");
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