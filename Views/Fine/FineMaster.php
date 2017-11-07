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
<script>
    $(document).ready(function () {
        $('.page-caption').delay(3000).addClass('show-page-caption');
    });
</script>

<script src="<?php echo $site_url ?>/ScriptsNG/Module/FineMasterModule.js"></script>
<script src="<?php echo $site_url ?>/ScriptsNG/Service/FineMasterService.js"></script>
<script src="<?php echo $site_url ?>/ScriptsNG/Controller/FineMasterController.js"></script>

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
</style>


<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<div class="container mid-section">
    <div class="page-caption">
        <h3>Fine Master</h3>
        <hr />
    </div>
    <div ng-controller="FineMastercontroller">
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

        @*<div map-lazy-load="https://maps.google.com/maps/api/js"
                 map-lazy-load-params="{{googleMapsUrl}}">
                <ng-map center="41,-87" zoom="3"></ng-map>
            </div>*@

        <script type="text/ng-template" id="fineForm">
            <div class="ngdialog-message">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Fine</h3>
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
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="ngdialog-buttons">
                <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="closeDialog()">Ok</button>
            </div>
        </script>
    </div>
</div>