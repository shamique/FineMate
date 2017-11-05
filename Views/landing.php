<!DOCTYPE html>

<html ng-app="app">
    <?php include 'includes/header.php'; ?>


        <section class="page-content-block">
            <div class="page-loader" id="page-loader">

            </div>
        </section>


        <footer>
            <div class="footer-frame">
                <div class="container-fluid">
                    <p class="text-center">Powered by 3Bit Squad</p>
                </div>
            </div>
        </footer>

        <!--<script src="../Resources/UIBlocking.js"></script>
            <script>
                $(document).ajaxStart(function () {
                    $.blockUI({ message: '<h3><img src="../img/ajax-loader.gif" /><br/> Just a moment...</h3>' });
                });
                $(document).ajaxComplete(function () {
                    $.unblockUI();
                });
            </script> -->

    </body>


    <style>
    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            var rId = $("#roleId").text();
            if (rId == 2) { //Police
                $("#mnu_dashboard").css("display", "none");
                $("#sub_mnu_finemaster").css("display", "none");
                $("#sub_mnu_issuelist").css("display", "none");
                $("#mnu_configuration").css("display", "none");
                $("#MnuMyprof").css("display", "none");
                $("#MnuMyActivity").css("display", "none");
                $("#logoURL").attr("href", "../Fine");
            } else if (rId == 3) { //Post Office
                $("#mnu_dashboard").css("display", "none");
                $("#sub_mnu_fineform").css("display", "none");
                $("#sub_mnu_finemaster").css("display", "none");
                $("#mnu_configuration").css("display", "none");
                $("#MnuMyprof").css("display", "none");
                $("#MnuMyActivity").css("display", "none");
                $("#logoURL").attr("href", "../LicenseIssue");
            }
            //else if (rId == 4) { //Vehicle Owner

            //}
            else if (rId == 1) { //Driver
                $("#mnu_dashboard").css("display", "none");
                $("#driver-menu-item").css("display", "none");
                $("#mnu_fine").css("display", "none");
                $("#mnu_configuration").css("display", "none");
                $("#logoURL").attr("href", "../Driver/MyProfile");
            }
        });

        function loadPages(pageName) {
            alert(pageName);
            $("#frame").attr('src', pageName);
        }

        $('#page-loader').load('Dashboard/index.php');
    </script>

    <style>
    </style>