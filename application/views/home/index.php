<p>Login in. To see it in action.</p>
<form class="m-t" role="form" action="<?=site_url('home/login')?>" method="post">
    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username" required="">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required="">
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

    <!-- <a href="#"><small>Forgot password?</small></a>
    <p class="text-muted text-center"><small>Do not have an account?</small></p>
    <a class="btn btn-sm btn-white btn-block" href="<?=site_url('home/register')?>">Create an account</a> -->
</form>