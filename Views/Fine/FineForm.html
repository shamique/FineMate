<script src="../../Resources/DateTimePicker/bootstrap-datetimepicker.min.js"></script>
<link href="../../Resources/ngDialog/css/ngDialog.css" rel="stylesheet" />
<link href="../../Resources/ngDialog/css/ngDialog-theme-default.css" rel="stylesheet" />
<script src="../../Resources/ngDialog/js/ngDialog.js"></script>

<script src="../../ScriptsNG/Module/FineModule.js"></script>
<script src="../../ScriptsNG/Service/FineService.js"></script>
<script src="../../ScriptsNG/Controller/FineController.js"></script>

<link href="../../Content/Stylesheet/custom.css" rel="stylesheet" />
<link href="../../Content/Stylesheet/responsive.css" rel="stylesheet" />
<link href="../../Content/bootstrap/MaterialSwitch.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('.page-caption').delay(3000).addClass('show-page-caption');
    });
</script>

<style>
    .page-caption {
        position: relative;
        top: -50px;
        opacity: 0;
        transition: 1s;
    }

    .show-page-caption {
        top: 0px;
        opacity: 1;
        transition: 1s;
    }

    .fine-sub-btn {
        width: 100%;
        margin-bottom: 10px;
    }
</style>


<div ng-controller="FineController">
    <div class="container-fluid mid-section">
        <!--page starts-->
        <div class="page-caption">
            <h3>Fine Submission</h3>
            <hr />
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon">Fine Number</span>
                    <input type="text" class="form-control" ng-disabled="true" id="FineNumber" ng-model="FineNumber" />
                    <span class="input-group-addon" id="validate_FineNumber"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">License Number</span>
                    @*<select id="DriverId" class="form-control" ng-model="DriverId"
                        ng-options="driv.LicenseNumber for driv in drivers track by driv.DriverID" ng-change="loadDriverName()"></select>*@
                    <input type="text" class="form-control" ng-model="LicenseNumber" id="LicenseNumber" ng-blur="loadDriver()" />
                    <span class="input-group-addon" id="validate_LicenseNumber"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Driver Name</span>
                    <input type="text" class="form-control" ng-disabled="true" id="DriverName" ng-model="DriverName" />
                    <span class="input-group-addon" id="validate_DriverName"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Vehicle Number</span>
                    <select id="VehicleId" class="form-control" ng-model="VehicleId"
                            ng-options="vehicle.VehicleNumber for vehicle in vehicleList track by vehicle.VechicleId"></select>
                    <span class="input-group-addon" id="validate_VehicleId"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Checkpoint</span>
                    <select id="CheckpointId" class="form-control" ng-model="CheckpointId"
                            ng-options="chkpoint.CheckpointName for chkpoint in checkPoints track by chkpoint.CheckpointId"></select>
                    <span class="input-group-addon" id="validate_CheckpointId"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Postal Department</span>
                    <select id="PostDepId" class="form-control" ng-model="PostDepId"
                            ng-options="postDprtmnt.PostDeptName for postDprtmnt in PostalDepartments track by postDprtmnt.PostDeptId"></select>
                    <span class="input-group-addon" id="validate_PostDepId"></span>
                </div>
                <br />
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <span class="input-group-addon">Fine Deadline</span>
                        <input type='text' class="form-control" id="DateOfExpired" ng-model="DateOfExpired" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({ format: 'YYYY-MM-DD', defaultDate: new Date() });
                                });
                            </script>
                        </span>
                    </div>
                </div>
                <br />

                <div class="input-group">
                    <span class="input-group-addon">Officer Id</span>
                    <select id="OfficerId" class="form-control" ng-model="OfficerId"
                            ng-options="officer.OfficerName for officer in officerList track by officer.PoliceOfficerId"></select>
                    <span class="input-group-addon" id="validate_OfficerId"></span>
                </div>
                <br />
            </div>

            <div class="bottom-clock">
                <div class="col-sm-6">
                    <button ng-click="AddFineDtl()" class="btn btn-primary fine-sub-btn">Add</button><br />
                </div>
                <br />
                <div class="col-sm-6">
                    <button ng-click="saveFine()" class="btn btn-primary fine-sub-btn">Submit fine</button>
                </div>
                <br />
            </div>
        </div>
    </div>

    <script type="text/ng-template" id="driverForm">
        <div class="ngdialog-message">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Driver Details</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <span>First Name</span>
                                <label>{{firstName}}</label>
                            </div>
                            <div class="col-md-6">
                                <span>Surname</span>
                                <label>{{surname}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span>Full Name</span>
                                <label>{{fullName}}</label>
                            </div>
                            <div class="col-md-6">
                                <span>NIC Number</span>
                                <label>{{nicNumber}}</label>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <div class="ngdialog-buttons">
            <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="closeDialog()">Ok</button>
        </div>
    </script>

    <script type="text/ng-template" id="fineDetails">
        <div class="ngdialog-message">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Fine Details</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">Penalty Type</span>
                                    <select id="PenaltyTypeId" class="form-control" ng-model="PenaltyTypeId"
                                            ng-options="penType.PenaltyName for penType in PenaltyTypes track by penType.PenaltyTypeId"
                                            ng-change="loadCourtType()"></select>
                                    <span class="input-group-addon" id="validate_PenaltyTypeId"></span>
                                </div>
                            </div>
                            <div class="col-md-4" ng-show="isCourtCase==3">
                                Penalty only<span>
                                    <input ng-model="isCourt" type="checkbox" />
                                </span>
                            </div>
                        </div>
                        <br />
                        <div class="row" ng-show="isCourtCase!=2">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">Court Date</span>
                                    <input type='text' class="form-control" ng-disabled="isCourt" placeholder="YYYY/MM/DD" id="CourtDate" ng-model="CourtDate" />
                                    <span class="input-group-addon" id="validate_CourtDate"></span>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <button type="button" ng-click="AddToGrid()" class="ngdialog-button ngdialog-button-primary">Add Item</button>
                        </div>
                        <br />
                        <div class="row">
                            <div class="table-responsive table-frame">
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th>Fine Type</th>
                                            <th>Points</th>
                                            <th>Amount</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="fine in fineList">
                                            <td>
                                                {{fine.FineType}}
                                            </td>
                                            <td>
                                                {{fine.Points}}
                                            </td>
                                            <td>
                                                {{fine.FineAmount}}
                                            </td>
                                            <td>
                                                <a href="#" ng-click="removeRow(fine.FineTypId)"><img src="img/remove.png" /></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
</div>