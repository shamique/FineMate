<script>
    $(document).ready(function () {
        $('.page-caption').delay(3000).addClass('show-page-caption');
    });
</script>

<script src="../ScriptsNG/Module/DriverViewModule.js"></script>
<script src="../ScriptsNG/Service/DriverViewService.js"></script>
<script src="../ScriptsNG/Controller/DriverViewController.js"></script>

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

<div class="container mid-section">
    <div class="page-caption">
        <h3>Driver</h3>
        <hr />
    </div>
    <div ng-controller="DriverViewController">
        <form class="form-inline">
            <div class="form-group">
                <label>Search</label>
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
            </div>
        </form>
        <table class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th ng-click="sort('drive.FineNumber')">
                        License Number
                        <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                    </th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Full Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="driver in Drivers|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
                    <td>{{driver.license_number}}</td>
                    <td>{{driver.FirstName}}</td>
                    <td>{{driver.Surname}}</td>
                    <td>{{driver.FullName}}</td>
                    <td>{{driver.NIC}}</td>
                    <td>{{driver.Address}}</td>
                </tr>
            </tbody>
        </table>
        <dir-pagination-controls max-size="5"
                                 direction-links="true"
                                 boundary-links="true">
        </dir-pagination-controls>
    </div>
</div>