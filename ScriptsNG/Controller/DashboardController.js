app.controller('DashboardController', function ($scope, DashboardService) {
    loadDataToDashboard();

    function loadDataToDashboard() {
        var DashboardData = DashboardService.getDataForDashboard(1);
        DashboardData.then(function (res) {
            bindOverViewData(res.data);
        }, function (err) {
            swal("Something went wrong", "", "error");
        });

        var FineRatioService = DashboardService.getDataForDashboard(2);
        FineRatioService.then(function (res) {
            loadFineRatioGraph(res.data);
        }, function (err) {
            swal("Something went wrong", "", "error");
        });

        var PenaltyWiseServiceG = DashboardService.getDataForDashboard(3);
        PenaltyWiseServiceG.then(function (res) {
            loadPenaltyWiseGraph(res.data);
        }, function (err) {
            swal("Something went wrong", "", "error");
        });

        var Top5Ser = DashboardService.getDataForDashboard(4);
        Top5Ser.then(function (res) {
            $scope.top5 = res.data;
        }, function (err) {
            swal("Something went wrong", "", "error");
        });
    }

    function bindOverViewData(data) {
        $scope.activeUsers = data[0].Valuee;
        $scope.expiredLicense = data[0].Valuee;
        $scope.NoOfVictims = data[0].Valuee;
        $scope.NoOfCourtCase = data[0].Valuee;
        //$("#fineRatio").text(data[0].Valuee+"%");
        //move((data[0].Valuee));
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
            $scope.FineRatioValue.push(data[i].Valuee);
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