app.controller('DashboardController', function ($scope, DashboardService) {
    loadDataToDashboard();

    function loadDataToDashboard() {
        var DashboardData = DashboardService.getDataForDashboard();
        DashboardData.then(function (res) {
            bindOverViewData(res.data[0]);
            loadFineRatioGraph(res.data[1]);
            loadPenaltyWiseGraph(res.data[2]);
            
            $scope.top5 = res.data[3];
        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    }

    function bindOverViewData(data) {
        $scope.activeUsers = data[0].Value;
        $scope.expiredLicense = data[1].Value;
        $scope.NoOfVictims = data[2].Value;
        $scope.NoOfCourtCase = data[3].Value;
        $("#fineRatio").text(data[4].Value+"%");
        move((data[4].Value));
    }

    function move(pointCount) {
        var elem = document.getElementById("r-points");
        var width = 1;
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= pointCount) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
            }
        }
    }

    $scope.FineRatioMonth = [];
    $scope.FineRatioValue = [];

    function loadFineRatioGraph(data) {
        for (var i = 0; i < data.length; i++) {
            $scope.FineRatioMonth.push(data[i].Monthh);
            $scope.FineRatioValue.push(data[i].VictimCount);
        }

        initFineRatioGraph();
    }

    function initFineRatioGraph() {
        $('#fineRatioGraph').highcharts({
            title: {
                text: ''
            },
            xAxis: {
                categories: $scope.FineRatioMonth
            },
            labels: {
                items: [{
                    style: {
                        left: '50px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [{
                name: 'Victim Count',
                type: 'spline',
                data: $scope.FineRatioValue
            }]
        });
    }

    function loadPenaltyWiseGraph(data) {
        var element = [];

        for (var i = 0; i < data.length; i++) {
            var item = {
                name: data[i].PenaltyType,
                y: data[i].PenaltyCount
            };
            element.push(item);
        }

        initPenaltyWiseGraph(element);
    }

    function initPenaltyWiseGraph(legendArray) {
        $(function () {
            $('#penaltyWiseGraph').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ' '
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Penalty',
                    colorByPoint: true,
                    data: legendArray
                }]
            });
        });
    }
});