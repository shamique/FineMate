app.controller('DriverProfileController', function ($scope, DriverProfileService, $window) {
    loadDriverProfile();

    function loadDriverProfile() {
        var driverProfile = DriverProfileService.getProfileData();
        driverProfile.then(function (res) {
            $scope.fullName = res.data[0][0].FullName;
            $scope.NICNo = res.data[0][0].national_card_nic;
            $scope.LicenseNo = res.data[0][0].driver_license_number;
            $scope.firstName = res.data[0][0].national_card_first_name;
            $scope.LastName = res.data[0][0].national_card_last_name;
            $scope.age = res.data[0][0].age;
            $scope.bloodGroup = res.data[0][0].national_card_blood_group;
            $scope.address = res.data[0][0].national_card_address;
            $scope.driverStatus = res.data[0][0].DriverStatus;

            $scope.profImage = {
                'background-image': 'url(../Public/Uploads/Driver/' + res.data[0][0].national_card_user_img + ')'
            };

            var point = res.data[0][0].driver_remain_points;
            $("#percentage").text(point + " / 24");

            move((point * 4.17));

            $scope.fineHistory = res.data[1];
            $scope.notification = res.data[2];

        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    };

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