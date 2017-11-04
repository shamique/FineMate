app.service('LicenseIssueService', function ($http) {
    this.getFines = function () {
        var res = $http.get("LicenseIssue/loadFineMaster");
        return res;
    };

    this.getFineRecord = function (fineId) {
        var response = $http({
            method: "post",
            url: "LicenseIssue/getFineById",
            params: {
                fineId: fineId,
            }
        });
        return response;
    };

    this.issueFine = function (fineId, receiptNo) {
        var response = $http({
            method: "post",
            url: "LicenseIssue/saveLicenseIssue",
            params: {
                fineId: fineId,
                receiptNo: receiptNo
            }
        });

        return response;
    }
});