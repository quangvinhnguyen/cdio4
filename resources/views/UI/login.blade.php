
<ul id="login-dp" class="dropdown-menu">
    <li>
        <div class="row">
            <div class="col-md-12">
                <h5 style="text-align:center; color:#357ebd">Đăng Nhập</h5>
                <div class="social-buttons">
                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>

                <form class = "loginForm" name ="loginForm" action="{{ route('success') }}" method="POST">
                    <input type = "hidden" name ="_token" value = "{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                        <input type="email" id ="email" name="email" class="form-control"  placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                        <input type="password" id="password" name="password" class="form-control"  placeholder="Password" required>
                        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" id ="btDN" name="btDN" value="Đăng Nhập">

                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> keep me logged-in
                        </label>
                    </div>
                </form>
            </div>

        </div>
    </li>
</ul>
