<?php include '../includes/header.php'; ?>﻿
<div class="container mid-section">
    <div class="page-caption">
        <h3>Penalty Types</h3>
        <hr />
    </div>
    <div ng-controller="PenaltyTypeController">
        <form class="form-inline">
            <div class="form-group">
                <label>Search</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
            <button class="btn-primary search-new-button" ng-click="ViewPenalty(0)">New</button>
        </form>
        <div class="table-responsive table-frame">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th ng-click="sort('pen.rule_violation_reason')">
                            Penalty Name
                            <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                        </th>
                        <th>Points</th>
                        <th>Penalty Charge</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate="pen in penalties|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
                        <td>{{pen.rule_violation_reason}}</td>
                        <td>{{pen.rule_violation_number_of_points}}</td>
                        <td>{{pen.rule_violation_fine_charge}}</td>
                        <td><button class="btn-primary" ng-click="ViewPenalty(pen.rule_violation_id)">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true">

        </dir-pagination-controls>
    </div>
</div>
<?php include '../includes/footer.php'; ?>