
   <form class="form" role="form" method="post" action="includes/login.php" accept-charset="UTF-8" id="login-nav">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail2">Usernames</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail2" placeholder="Username" required>
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword2">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block sign-up-btn btn-login-submit" name="login" id="login_btn" onclick="success_alert();">Sign in</button>
    </div>
    <div class="checkbox">
        <label>
          <input type="checkbox"> keep me logged-in
          </label>
    </div>
    
</form>
