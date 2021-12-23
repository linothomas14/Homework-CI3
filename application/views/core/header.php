<?php
$username = $this->session->userdata('username');
$user_login = $this->db->get_where('biodata', ['username' => $username])->row_array();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tugas <?= $user_login['kelas'] ?></title>

    <!-- Bootstrap core CSS-->
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Bootstrap core JS-->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body style="overflow-x: hidden;">

    <form action="m-0 p-0" method="GET">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><?= $user_login['kelas'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2) == ""){echo 'active';}?>" aria-current="page" href="<?= base_url() ?> ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2) == "member"){echo 'active';}?>" href="<?= base_url('homework/member') ?>">Member</a>
                    </li>
                </ul>

                <p id="user">Hi, <?= $user_login['nama'] ?> 😂</p>


                <a class=" btn btn-outline-danger  my-sm-0" href="<?= base_url('homework/logout') ?>" name="logout">Logout</a>
    </form>

    </div>
    </div>
    </nav>