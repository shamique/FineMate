<div class="container-fluid mid-section">
    <div class="page-caption">
        <h3>My Activity</h3>
        <hr />
    </div>
    <div ng-controller="MyActivityController">
        <form class="form-inline">
            <div class="form-group">
                <label>Search</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
        </form>
        <table class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>Fine Reference Number</th>
                    <th>Deadline</th>
                    <th ng-click="sort('fine.fine_active')">
                        Status
                        <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th>Total Charge</th>
                    <th>Checkpoint</th>
                    <th>More Details</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="fine in Fines|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
                    <td>{{fine.fine_reference_number}}</td>
                    <td>{{fine.fine_deadline}}</td>
                    <td>{{fine.fine_active}}</td>
                    <td>{{fine.fine_total_charge}}</td>
                    <td>{{fine.checkpoint_name}}</td>
                    <td><button class="btn-primary" ng-click="viewFine(fine.fine_id)">View</button></td>
                </tr>
            </tbody>
        </table>
        <dir-pagination-controls max-size="5"
                                 direction-links="true"
                                 boundary-links="true">
        </dir-pagination-controls>

        <script type="text/ng-template" id="fineForm">
            <div class="ngdialog-message">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Fine Detail</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Violation Reason</span>
                                    <label>{{rule_violation_reason}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>No of points</span>
                                    <label>{{rule_violation_number_of_points}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Fine charge</span>
                                    <label>{{rule_violation_fine_charge}}</label>
                                </div>
                                <div class="col-md-6">
                                    <span>Task completed</span>
                                    <label>{{fine_violation_task_completed}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Court Date</span>
                                    <label>{{fine_violation_appointment_date_court}}</label>
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