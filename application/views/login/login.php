<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">My Assignments</h5>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card bg-light my-5">
                <div class="card-header text-center bg-primary text-light" id="">Login Form</div>
                <div class="card-body">
                    <h5 class="card-title">My Assignments</h5>
                    <p class="card-text">Masukan username dan password untuk mengakses halaman.</p>

                    <?php if ($this->session->flashdata('salah_login')) : ?>
                        <div class="alert alert-danger" role="alert">
                            Username atau Password Salah!
                        </div>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('belum_login')) : ?>
                        <div class="alert alert-danger" role="alert">
                            Anda belum melakukan Login!
                        </div>
                    <?php endif ?>

                    <form action="" method="post" class="needs-validation">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password" autocomplete="off" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center px-3 py-2" name="login" id="submit-login">Login</button>

                        </div>
                        <hr>
                    </form>
                    <form action="" method="post" class="needs-validation" novalidate>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success text-center px-3 py-2" name="register" id="submit-register">Create New Account</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>