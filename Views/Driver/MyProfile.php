<script src="<?php echo $site_url ?>/ScriptsNG/Module/DriverProfileModule.js"></script>
<script src="<?php echo $site_url ?>/ScriptsNG/Service/DriverProfileService.js"></script>
<script src="<?php echo $site_url ?>/ScriptsNG/Controller/DriverProfileController.js"></script>

<div class="row">
    <div class="container" ng-controller="DriverProfileController">
        <!--profile section one-->
        <div class="row">
            <div class="col-sm-6">
                <div class="prof-sec-1 bg-sec">
                    <div class="prof-dp" ng-style="profImage"></div>
                    <ul id="notification">
                        <li class="">
                            <div class="notification-count">{{notification.length}}</div>
                            <img class="trigger trigger-before hvr-buzz-out" src="../img/notification.png" />
                            <img class="trigger trigger-after hvr-buzz-out" src="../img/notification.png" />
                            @*<ul>
                                    <li>
                                        <h5>Fine is paid</h5>
                                        <p>"Descripttion of the fine. Descripttion of the fine. Descripttion of the fine. "</p>
                                        <hr />
                                    </li>
                                    <li>
                                        <h5>Pay the fine #345654</h5>
                                        <p>"Descripttion of the fine. Descripttion of the fine. "</p>
                                        <hr />
                                    </li>
                                </ul>*@

                            <ul>
                                <div ng-repeat="noti in notification">
                                    <li>
                                        <h5><b> {{noti.Title}}</b></h5>
                                        <p>{{noti.Desc}}</p>
                                        <hr />
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                    <div class="col-xs-12"><h3 class="user-name">@ViewBag.userName</h3></div>
                    <div class="prof-entry-user-data col-xs-12">
                        <div class="col-sm-4">
                            <div class="col-xs-12">
                                <h5>Full Name</h5>
                            </div>
                            <div class="col-xs-12">
                                <p>{{fullName}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-xs-12">
                                <h5>NIC No</h5>
                            </div>
                            <div class="col-xs-12">
                                <p>{{NICNo}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-xs-12">
                                <h5>License No</h5>
                            </div>
                            <div class="col-xs-12">
                                <p>{{LicenseNo}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="prof-sec-4 bg-sec">
                    <h4>Driver Bio</h4>
                    <table>
                        <tr>
                            <td><label>First Name</label></td>
                            <td><label>:</label></td>
                            <td><p>{{firstName}}</p></td>
                        </tr>
                        <tr>
                            <td><label>Last Name</label></td>
                            <td><label>:</label></td>
                            <td><p>{{LastName}}</p></td>
                        </tr>
                        <tr>
                            <td><label>Blood Group</label></td>
                            <td><label>:</label></td>
                            <td><p>{{bloodGroup}}</p></td>
                        </tr>
                        <tr>
                            <td><label>Address</label></td>
                            <td><label>:</label></td>
                            <td><p>{{address}}</p></td>
                        </tr>
                        <tr>
                            <td><label>License Status</label></td>
                            <td><label>:</label></td>
                            <td><p>{{driverStatus}}</p></td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <!--profile section two-->
            <div class="col-sm-6">
                <div class="prof-sec-2 bg-sec">
                    <h4>Remaining Points</h4>
                    <div class="w3-progress-container">
                        <div id="r-points" class="w3-progressbar" style="width:20%; background-color:#2192ef;">
                            <div id="demo" class="w3-center w3-text-white"><span id="percentage"></span></div>
                        </div>
                    </div>
                    @*<button class="w3-btn btn fill-button" onclick="fillbar()">Fill</button>*@
                </div>
                
                <div class="prof-sec-3 bg-sec">
                    <h4>Fine History</h4>
                    <div class="fine-history-block">
                        <ul ng-repeat="fine in fineHistory">
                            <li>
                                <i class="fa fa-history fa-1x" aria-hidden="true"></i>
                                <label><span>{{fine.FineDate}}</span> | <span>{{fine.FineTime}}</span> | <span>{{fine.checkpoint_name}}</span></label>
                                <p>{{fine.RuleLIst}}</p>
                                <button class="btn fill-button fine-history-btn" ng-click="viewFine(fine.fine_id)">View</button>
                            </li>
                        </ul>
                        <button class="w3-btn btn fill-button fine-history-all-btn" ng-click="viewActivity()">View All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--profile section four-->
            <div class="col-sm-6">
                
            </div>
            <!--profile section three-->
            <div class="col-sm-6 move-3">
                
            </div>
        </div>
    </div>
</div>

