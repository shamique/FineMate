<?php include '../includes/header.php'; ?>
<script src="../../ScriptsNG/Module/FineModule.js"></script>
<script src="../../ScriptsNG/Service/FineService.js"></script>
<script src="../../ScriptsNG/Controller/FineController.js"></script>

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
    <div class="container mid-section">
        <!--page starts-->
        <div class="page-caption">
            <h3>Fine Submission</h3>
            <hr />
        </div>
        <div class="panel-block">
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-block">
                        <span class="input-block-addon">Fine Number</span>
                        <div class="input-inner-block">
                            <input type="text" class="form-control" ng-disabled="true" id="FineNumber" ng-model="FineNumber" />
                            <span class="input-block-addon" id="validate_FineNumber"></span>
                        </div>
                    </div>
                    <div class="input-block">
                        <span class="input-block-addon">Driver Name</span>
                        <div class="input-inner-block">
                            <input type="text" class="form-control" ng-disabled="true" id="DriverName" ng-model="DriverName" />
                            <span class="input-block-addon" id="validate_DriverName"></span>
                        </div>
                    </div>
                    <div class="input-block">
                        <span class="input-block-addon">Checkpoint</span>
                        <div class="input-inner-block">
                            <select id="CheckpointId" class="form-control" ng-model="CheckpointId"
                                    ng-options="chkpoint.CheckpointName for chkpoint in checkPoints track by chkpoint.CheckpointId"></select>
                            <span class="input-block-addon" id="validate_CheckpointId"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='input-block date' id='datetimepicker1'>
                            <span class="input-block-addon">Fine Deadline</span>
                            <div class="input-inner-block">
                                <input type='text' class="form-control date-picker" id="DateOfExpired" ng-model="DateOfExpired" />
                                <span class="input-block-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD', defaultDate: new Date()});
                                                });
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-block">
                        <span class="input-block-addon">License Number</span>
                        <div class="input-inner-block">
                            <!--<select id="DriverId" class="form-control" ng-model="DriverId"
                                      ng-options="driv.LicenseNumber for driv in drivers track by driv.DriverID" ng-change="loadDriverName()"></select>-->
                            <input type="text" class="form-control" ng-model="LicenseNumber" id="LicenseNumber" ng-blur="loadDriver()" />
                            <span class="input-block-addon" id="validate_LicenseNumber"></span>
                        </div>
                    </div>
                    <div class="input-block">
                        <span class="input-block-addon">Vehicle Number</span>
                        <div class="input-inner-block">
                            <select id="VehicleId" class="form-control" ng-model="VehicleId"
                                    ng-options="vehicle.VehicleNumber for vehicle in vehicleList track by vehicle.VechicleId" ng-blur="loadVehicleOwner()"></select>
                            <span class="input-block-addon" id="validate_VehicleId"></span>
                        </div>
                    </div>
                    <div class="input-block">
                        <span class="input-block-addon">Postal Department</span>
                        <div class="input-inner-block">
                            <select id="PostDepId" class="form-control" ng-model="PostDepId"
                                    ng-options="postDprtmnt.PostDeptName for postDprtmnt in PostalDepartments track by postDprtmnt.PostDeptId"></select>
                            <span class="input-block-addon" id="validate_PostDepId"></span>
                        </div>
                    </div>

                    <div class="input-block">
                        <span class="input-block-addon">Officer Id</span>
                        <div class="input-inner-block">
                            <select id="OfficerId" class="form-control" ng-model="OfficerId"
                                    ng-options="officer.OfficerName for officer in officerList track by officer.PoliceOfficerId"></select>
                            <span class="input-block-addon" id="validate_OfficerId"></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="bottom-clock">
                        <div class="input-block">
                            <button ng-click="AddFineDtl()" class="btn btn-primary fine-sub-btn add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                            <button ng-click="saveFine()" class="btn btn-primary fine-sub-btn submit"><i class="fa fa-check" aria-hidden="true"></i> Submit fine</button>
                        </div>
                    </div>
                </div>
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
        <div class="input-block">
        <span class="input-block-addon">Penalty Type</span>
        <select id="PenaltyTypeId" class="form-control" ng-model="PenaltyTypeId" ng-options="penType.PenaltyName for penType in PenaltyTypes track by penType.PenaltyTypeId"
        ng-change="loadCourtType()"></select>
        <span class="input-block-addon" id="validate_PenaltyTypeId"></span>
        </div>
        </div>
        <div class="col-md-4" ng-show="isCourtCase==3">Penalty only<span>
        <input ng-model="isCourt" type="checkbox" />
        </span>
        </div>
        </div>
        <br />
        <div class="row" ng-show="isCourtCase!=2">
        <div class="col-md-8">
        <div class="input-block">
        <span class="input-block-addon">Court Date</span>
        <input type='text' class="form-control" ng-disabled="isCourt" placeholder="YYYY/MM/DD" id="CourtDate" ng-model="CourtDate" />
        <span class="input-block-addon" id="validate_CourtDate"></span>
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

    <?php include '../includes/footer.php'; ?>