<div class="container">
	<h1 class="text-center p-3">Assignment 3IA01 🔥</h1>
	<a class="btn btn-info mb-3" href="<?= base_url('homework/tambah') ?>">Add Assignment</a>
	<table class="table table-striped table-hover">
		<thead class="table-success">
			<tr>
				<th id="no">No</th>
				<th>Deadline</th>
				<th>Subject</th>
				<th>Title</th>
				<th>Description</th>
				<th>Posted by</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($assignments as $data) : ?>
				<tr>
					<td class=" text-center"><?= $no++ ?></td>
					<td><?= $data['deadline'] ?></td>
					<td><?= $data['subject'] ?></td>
					<td><?= $data['title'] ?></td>
					<td style="max-width: 350px;"><?= $data['description'] ?></td>
					<td>Yulyano Thomas Djaya</td>
					<td class="align-middle text-center">
						<a class="align-middle btn btn-success">Edit</a>

						<a href="<?= base_url('homework/delete/' . $data['id']) ?>" onclick="return confirm('Data akan dihapus. Anda yakin?')" class="align-middle btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>