<?php

$kelas = $this->session->userdata('kelas');

$member_login = $this->db->order_by("nama", "ASC")->get_where('biodata', ['kelas' => $kelas])->result_array();

?>

<div class="container">
    <h1 class="text-center p-3">Member of <?= $this->session->userdata('kelas'); ?> 🎓</h1>


    <table class="table table-striped table-hover">
        <thead class="table-info">
            <tr>
                <th id="no">No</th>
                <th>Nama Lengkap</th>
                <th>NPM</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            foreach ($member_login as $data) : ?>
                <tr>
                    <td class=" text-center"><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['npm'] ?></td>
                    <td><?= $data['kelas'] ?></td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</div>