<div class="men">
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= URL; ?>">Главная</a></li>
                <li>Вход</li>
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
<div class="account-in">
    <div class="container">
        <div class="col-md-3 center-block" style="float: none;">
            <form method="post" action="user/login" id="signup" role="form" data-toggle="validator"> 
                <div>
                    <h2>SIGN IN</h2>
                    <div class="form-group has-feedback">
                        <span>Login</span>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>" required>
                        <span class="glyphicon form-control-feedback login-sp" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <span>Password</span>
                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
                        <span class="glyphicon form-control-feedback login-sp" aria-hidden="true"></span>
                    </div>
                    <div class="clearfix"> </div>
                </div>    
                <div class="register-but">
                    <input type="submit" value="login">
                    <div class="clearfix"> </div>
                </div>
            </form>
            <?php if(isset($_SESSION['form_data'])) : unset($_SESSION['form_data']); endif;?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</div>


<div>
    
</div>