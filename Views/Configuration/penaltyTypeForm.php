<div ng-controller="PenaltyTypeFormController">
    <div class="container-fluid mid-section">
        <!--page starts-->
        <div class="page-caption">
            <h3>Penalty Type</h3>
            <hr />
        </div>
        <div class="panel-body">
            <div class="col-md-offset-1 col-md-10">
                <div class="input-group">
                    <span class="input-group-addon">Violation Reason</span>
                    <input type="text" class="form-control" id="ViolationReason" ng-model="ViolationReason" />
                    <span class="input-group-addon" id="validate_ViolationReason"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Penalty Type</span>
                    <select id="PenaltyType" class="form-control">
                        <option value="1">Court</option>
                        <option value="2">Penalty Charge</option>
                        <option value="3">Both</option>
                    </select>
                    <span class="input-group-addon" id="validate_PenaltyType"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Number of points</span>
                    <input type="text" class="form-control" id="NoOfPoints" ng-model="NoOfPoints" />
                    <span class="input-group-addon" id="validate_NoOfPoints"></span>
                </div>
                <br />
                <div class="input-group">
                    <span class="input-group-addon">Fine Charge</span>
                    <input type="text" class="form-control" id="FineCharge" ng-model="FineCharge" />
                    <span class="input-group-addon" id="validate_FineCharge"></span>
                </div>
                <br />
            </div>

            <div class="col-md-offset-1 col-md-10">
                <div class="row">
                    <button ng-click="savePenaltyType()" class="btn btn-primary">Submit fine</button>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>