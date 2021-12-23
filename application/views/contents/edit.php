<?php 
if ($assignments['kelas'] != $this->session->userdata('kelas')){
    redirect('homework', 'refresh');
}
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card bg-light my-5">
                <div class="card-header text-center">Edit Data</div>
                <div class="card-body">
                    <form action="" method="post" class="needs-validation" novalidate>
                        <?php var_dump($assignments) ?>
                        <input type="" name="id_assignment" value="<?= $assignments['id'] ?>">
                        <div class="form-group">
                            <label for="nama_mhs">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title Assingment" autocomplete="off" required value="<?= $assignments['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan Subject Assingment" autocomplete="off" required value="<?= $assignments['subject'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" name="deadline" id="deadline" placeholder="Masukkan Deadline Assingment" autocomplete="off" required value="<?= $assignments['deadline'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Masukkan Description Assingment" autocomplete="off" required value="<?= $assignments['description'] ?>">

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center px-3 py-2" name="edit">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>