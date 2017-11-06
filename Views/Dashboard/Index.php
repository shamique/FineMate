<div class="row">
    <div class="container dashboard-block" ng-controller="DashboardController">
        <!--profile section one-->
        <div class="row">
            <div class="col-sm-6">
                <div class="prof-sec-4 bg-sec">
                    <h4>Quick Overview</h4>
                    <table>
                        <tr>
                            <td><label>Active Users</label></td>
                            <td><label>:</label></td>
                            <td><p>{{activeUsers}}</p></td>
                        </tr>
                        <tr>
                            <td><label>Expired License</label></td>
                            <td><label>:</label></td>
                            <td><p>{{expiredLicense}}</p></td>
                        </tr>
                    </table>
                </div>
                <div class="prof-sec-4 bg-sec">
                    <h4>Monthly Figures</h4>
                    <table>
                        <tr>
                            <td><label>No. of Victims</label></td>
                            <td><label>:</label></td>
                            <td><p>{{NoOfVictims}}</p></td>
                        </tr>
                        <tr>
                            <td><label>No. of court cases</label></td>
                            <td><label>:</label></td>
                            <td><p>{{NoOfCourtCase}}</p></td>
                        </tr>
                        <tr>
                            <td><label>Fine Ratio</label></td>
                            <td><label>:</label></td>
                            <td class="col-sm-9 col-xs-5 progtd">
                                <div class="w3-progress-container">
                                    <div id="r-points" class="w3-progressbar" style="width:58.5%; background-color:#2192ef;">
                                        <div id="fineRatio" class="w3-center w3-text-white">58.5%</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="prof-sec-4 bg-sec">
                    <h4>Fine Ratio </h4>

                    <div class="row m-b-1" style="display:none;">
                        <div class="col-xs-12">
                            <div class="card shadow">
                                <h4 class="card-header">Revenue <span class="tag tag-success" id="revenue-tag">$15,341,110</span></h4>
                                <div class="card-block">
                                    @*<div id="revenue-column-chart"></div>*@
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <!--			<div class="row m-b-1">-->
                    <div class="">
                        <div class="card">
                            <div class="card-block">
                                <div id="fineRatioGraph"></div>
                                @*<div id="orders-spline-chart"></div>*@
                            </div>
                        </div>
                    </div>
                    <!--			</div> -->
                    <!-- row -->
                </div>
                <div class="prof-sec-4 bg-sec move-top-dash">
                    <h4>Top 5 Violators</h4>
                    <div class="fine-history-block dash">
                        <ul ng-repeat="to in top5">
                            <li>
                                <div class="violator-dp"><img ng-src="../../Public/Uploads/Driver/{{to.national_card_user_img}}" /></div>
                                <label><span>{{to.national_card_first_name}} {{to.national_card_last_name}}</span></label>
                                <p>Remaining points : {{to.driver_remain_points}} | No of penalty cases : {{to.NoOfVictim}}</p>
                            </li>
                            @*<li>
                                <div class="violator-dp"><img src="http://1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png" /></div>
                                <label><span>Gayan Sandamal</span></label>
                                <p>Remaining points : 24 | No of penalty cases : 8</p>
                            </li>
                            <li>
                                <div class="violator-dp"><img src="http://1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png" /></div>
                                <label><span>Sumudu Sahan</span></label>
                                <p>Remaining points : 24 | No of penalty cases : 8</p>
                            </li>*@
                        </ul>
                        @*<button class="w3-btn btn fill-button fine-history-all-btn">View All</button>*@
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-sm-6 move-2">
                <div class="prof-sec-4 bg-sec">
                    <h4>Penalty Wise Victim </h4>
                    <div class="">
                        <div class="card">
                            <div class="card-block">
                                <div id="penaltyWiseGraph"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 move-top-dash">
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('ul#notification > li > ul').hide('slow');
        $('.trigger-after').hide();

        $('.trigger-before').on('click', function () {
            $('ul#notification > li > ul').show('slow');
            $('.trigger-after').show();
            $('.trigger-before').hide();
        });
        $('.trigger-after').on('click', function () {
            $('ul#notification > li > ul').hide('slow');
            $('.trigger-after').hide();
            $('.trigger-before').show();
        });
        $('.dashboard-block').delay(3000).addClass('show-dashboard-block');
    });
</script>