<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Login</b> Admin</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">LOGIN PAGE</p>

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('home/login'); ?>" class="user" method="post">
                <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block ">Login</button>


                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forget Password?</a>
                </div>

                <div class="text-center">
                    <a class="small" href="<?= base_url() ?>home/register">Create new Account!</a>
                </div>
        </div>
        </form>



    </div>
</div>
</div>