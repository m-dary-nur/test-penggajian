<div class="container">
	<div class="header-page mt-5">
		<h5>Jabatan</h5>
		<a class="btn btn-primary" href="<?= site_url('jabatan/add'); ?>">Tambah</a>
	</div>
</div>
<div class="container">
	<div class="mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Kode</th>
					<th scope="col">Jabatan</th>
					<th scope="col">Standar Gaji</th>
					<th scope="col">Keterangan</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			<?php 
                if (count($data) > 0) {
                for ($i = 0; $i < count($data); $i++) { ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $data[$i]["kode"] ?></td>
						<td><?= $data[$i]["nama"] ?></td>
						<td><?= number_format($data[$i]["standar_gaji"], 2) ?></td>
						<td><?= $data[$i]["keterangan"] ?></td>
						<td>
							<a href="<?= site_url('jabatan/edit/'.$data[$i]['id']); ?>">Edit</a> | 
							<a href="<?= site_url('jabatan/delete/'.$data[$i]['id']); ?>">Hapus</a>
						</td>
					</tr>			
				<?php }} else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data jabatan</td>
                    </tr>
                <?php } ?>
			</tbody>
		</table>
	</div>
</div>