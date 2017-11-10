<?php include '../includes/header.php'; ?>
<style>
    /*.grid {
      width: 800px;
      height: 400px;
    }*/
    .myGrid {
        width: 1000px;
        height: 400px;
    }
</style>
<script src="../ScriptsNG/Module/LicenseIssueModule.js"></script>
<script src="../ScriptsNG/Service/LicenseIssueService.js"></script>
<script src="../ScriptsNG/Controller/LicenseIssueController.js"></script>
<div class="container mid-section license-block">
    <div class="page-caption">
        <h3>License Issue</h3>
        <hr />
    </div>
    <div ng-controller="LicenseIssueController">
        <form class="form-inline">
            <div class="form-group">
                <label>Search</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
        </form>
        <div class="table-responsive table-frame">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th ng-click="sort('fine.FineNumber')">
                            Fine Number
                            <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th>Victim</th>
                        <th>Vehicle Number</th>
                        <th>Status</th>
                        <th>View Fine</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate="fine in Fines|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
                        <td>{{fine.FineNumber}}</td>
                        <td>{{fine.Victim}}</td>
                        <td>{{fine.VehicleNumber}}</td>
                        <td>{{fine.Status}}</td>
                        <td><button class="btn-primary" ng-click="viewFine(fine.FineId)">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <dir-pagination-controls max-size="5"
                                 direction-links="true"
                                 boundary-links="true">
        </dir-pagination-controls>

        <script type="text/ng-template" id="fineForm">
            <div class="ngdialog-message">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Fine Receipt</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Fine Number</span>
                                    <label>{{fineNumber}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>Driver Name</span>
                                    <label>{{driverName}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>License Number</span>
                                    <label>{{licenseNumber}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>Vehicle Number</span>
                                    <label>{{vehicleNumber}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Penalty</span>
                                    <label>{{penalty}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>Fine Amount</span>
                                    <label>{{fineAmount}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Court Appointment Date</span>
                                    <label>{{courtAppointmentDate}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>Fine Status</span>
                                    <label>{{Status}}</label>
                                </div>
                            </div>
                            <hr style="border-style: inset; border-width: 1px; display: block; " />
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Fine Receipt No.</span>
                                        <input type="text" ng-model="recptNo" id="receiptNo" class="form-control" />
                                        <span class="input-group-addon" id="validate_PenaltyTypeId"></span>
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="ngdialog-buttons">
                <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="saveLicenseIssue()">Release License</button>
            </div>
        </script>
    </div>
</div>

<?php include '../includes/footer.php'; ?>