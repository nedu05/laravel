<div class="container  d-flex justify-content-center  w-25 signupPage mt-3">
    <form name="login" ng-submit="loginForm()" class="m-3 text-center text-danger" novalidate>
        <h4 class="m-3 text-center text-info">Login</h4>

        <div class="m-3 ">
            <input type="text" name="usname" ng-model="usname" placeholder="user_name" class="rounded-pill text-center"
                required>
            <div ng-if="login.usname.$dirty && login.usname.$invalid">
                <div ng-if="login.usname.$error.required"> username is required</div>
            </div>
        </div>


        <div class="m-3">
            <input type="password" class="rounded-pill text-center" name="uspassword" ng-model="uspassword"
                placeholder="password" required>
            <div ng-if="login.uspassword.$dirty && login.uspassword.$invalid">
                <div ng-if="login.uspassword.$error.required">password is required</div>
            </div>
        </div>

        <p class="fs-3">{{message}}</p>
        <div>
            <small class="m-3">You don,t have an account?<a href="#">signup</a></small>
        </div>
        <div>
            <small class="m-3">Are you guest?<a href="#!main">guest</a></small>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" ng-disabled="login.$invalid" class="btn btn-success m-3"> Login </button>

        </div>
    </form>

</div>