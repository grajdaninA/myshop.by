<div class="men">
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= URL; ?>">Главная</a></li>
                <li>Регистрация</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!-- errors -->
<div class="content" style="padding-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['errors'])):?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['errors']; unset($_SESSION['errors']);?>
                </div>
                <?php endif;?>
                <?php if (isset($_SESSION['success'])):?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                </div>
                <?php endif;?>
            </div>
        </div> 
    </div>
</div>
<!-- end errors -->
<?php if(!app\models\User::checkAuth()):?>
<div class="account-in">
    <div class="container">
        <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator"> 
            <div class="register-top-grid">
                <h2>PERSONAL INFORMATION</h2>
                <div class="form-group has-feedback">
                    <span>Login<label>*</label></span>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <span>Name<label>*</label></span>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true" ></span>
                </div>
                <div class="form-group has-feedback">
                    <span>Email Address<label>*</label></span>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <span>Address<label>*</label></span>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                    <div class="clearfix"> </div>
                    <a class="news-letter" href="#">
                    <label class="checkbox">
                        <input type="checkbox" name="checkbox" checked="">
                        <i> </i>Sign Up for Newsletter
                    </label>
                </a>
            </div>
            <div class="register-bottom-grid">
                <h2>LOGIN INFORMATION</h2>
                <div class="form-group has-feedback">
                    <span>Password<label>*</label></span>
                    <input type="password" id="password" placeholder="Password" name="password" class="form-control" data-error="Bruh, that password is invalid" data-minlength="6" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <span>Confirm Password<label>*</label></span>
                    <input type="password" data-match="#password" id="confirmPassword" name="confirmPassword" class="form-control" data-match-error="Whoops, these don't match" data-minlength="6" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="register-but">
                <input type="submit" value="submit">
                <div class="clearfix"> </div>
            </div>
        </form>
        <?php if(isset($_SESSION['form_data'])) : unset($_SESSION['form_data']); endif;?>
        <div class="clearfix"> </div>
        
    </div>
</div>
<?php else :?>
<div class="container"><div class="register-top-grid"><h3>You are logged in as: <?= $_SESSION['user']['login'];?></h3></div></div>
<?php endif;?>
</div>
