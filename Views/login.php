<html ng-app="app">
    <?php include 'includes/header.php'; ?>
    <body id="fm-login">
        <div class="login-bg-image" style="background-image: url(../Content/image/bg.jpg);"></div>

        <div class="cover-block">
            <div class="fm-logo-block">
                <img src="../Content/image/fm-logo.png" class="img-responsive fm-logo" />
            </div>
            <div class="doors door-one"></div>
            <div class="doors door-two"></div>
        </div>

        <div class="fm-login-form-frame">
            <div class="fm-login-form" ng-controller="loginController">
                <div class="fm-logo-block">
                    <img src="../Content/image/fm-logo.png" class="img-responsive fm-logo" />
                </div>
                <form>
                    <!--username-->
                    <div class="col-md-4 fm-login-caption">
                        Username
                    </div>
                    <div class="col-md-8 fm-login-field">
                        <input type="text" ng-model="UserName" placeholder="Type you username"/>
                    </div>
                    <!--password-->
                    <div class="col-md-4 fm-login-caption">
                        Password
                    </div>
                    <div class="col-md-8 fm-login-field">
                        <input type="password" ng-model="Password"  placeholder="Type you password"/>
                    </div>
                    <p class="col-md-12 fm-login-forgot-pw">
                        <a href="#">
                            Forgot your password?
                        </a>
                    </p>
                    <div class="col-sm-12 fm-remember-me">
                        <input type="checkbox"/><div class="rmb-txt">Remember me</div>
                    </div>
                    <div class="col-sm-12 fm-login-button-frame">
                        <input type="submit" value="Login" ng-model="Login" ng-click="validateLogin()" class="col-md-6 fm-login-btn">
                        <input type="button" value="Sign up" class="col-md-6 fm-signup-btn">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


<script>
    $(document).ready(function () {
        $('.cover-block .fm-logo-block > img.fm-logo').addClass('after');
        setTimeout(function () {
            $('.cover-block').addClass('after');
            setTimeout(function () {
                $('.doors').addClass('after');
                setTimeout(function () {
                    $('.cover-block').remove();
                }, 500);
                $('.fm-login-form').addClass('after');
            }, 500);
            $('.cover-block .fm-logo-block > img.fm-logo.after').addClass('after1');
        }, 1000);
    });
</script>