app.controller('DriverProfileController', function ($scope, DriverProfileService, $window) {
    loadDriverProfile();
    loadDriverFine();
    loadNotification();

    function loadDriverProfile() {
        var driverProfile = DriverProfileService.getProfileData(1);
        driverProfile.then(function (res) {
            $scope.fullName = res.data[0].FullName;
            $scope.NICNo = res.data[0].NIC;
            $scope.LicenseNo = res.data[0].license_number;
            $scope.firstName = res.data[0].FirstName;
            $scope.LastName = res.data[0].Surname;
            $scope.age = res.data[0].age;
            $scope.bloodGroup = res.data[0].national_card_blood_group;
            $scope.address = res.data[0].Address;
            $scope.driverStatus = res.data[0].driver_active;

            $scope.profImage = {
                'background-image': 'url(../Public/Uploads/Driver/' + res.data[0].national_card_user_img + ')'
            };

            var point = res.data[0].driver_remain_points;
            $("#percentage").text(point + " / 24");

            move((point * 4.17));

        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    };

    function loadDriverFine(){
        var driverFineServ = DriverProfileService.getFineHistory(2);
        driverFineServ.then(function (res) {
            $scope.fineHistory = res.data;
        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    }

    function loadNotification(){
        var notificationServ = DriverProfileService.getNotifications(3);
        notificationServ.then(function (res) {
            $scope.notification = res.data;
        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    }

    $scope.viewActivity = function () {
        $window.location.assign('MyActivity');
    }

    $scope.viewFine = function (fId) {
        alert(fId);
    }

    function move(pointCount) {
        var elem = document.getElementById("r-points");
        var width = 1;
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= pointCount) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
            }
        }
    }
});