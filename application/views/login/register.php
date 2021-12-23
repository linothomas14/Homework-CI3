<div class="container">
    <div class="row justify-content-md-center pt-3">
        <div class="col-md-6 border">
            <div class="banner ">
                <h2 class="mt-3 text-center">Create Account</h2>
            </div>
            <?php if ($this->session->flashdata('username') == 'Exists') : ?>
                <div class="alert alert-warning" role="alert">
                    Username already exists!
                </div>
            <?php endif ?>

            <form class="mt-3" action="" method="POST">
                <div class="form-group">
                    <p>Username</p>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <p>Password</p>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button class="btn btn-success" type="submit" name="submit" id="btn-submit">Go</button>
            </form>
        </div>
    </div>
</div>