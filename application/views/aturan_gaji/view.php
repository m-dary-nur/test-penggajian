<div class="container">
	<div class="header-page mt-5">
		<h5>Aturan Gaji</h5>
		<a class="btn btn-primary" href="<?= site_url('aturan_gaji/add'); ?>">Tambah</a>
	</div>
</div>
<div class="container-fluid">
	<div class="mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Jabatan</th>
					<th scope="col">Masa Kerja</th>
					<th scope="col">Intensif</th>
					<th scope="col">Bonus</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
                <?php 
                if (count($data) > 0) {
                for ($i = 0; $i < count($data); $i++) { ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $data[$i]["jabatan_nama"] ?></td>
						<td><?= $data[$i]["masa_kerja"] == '0' ? 'Kurang dari setahun' : $data[$i]["masa_kerja"].' Tahun' ?></td>
						<td><?= number_format($data[$i]["intensif"], 2) ?></td>
						<td><?= number_format($data[$i]["bonus"], 2) ?></td>
						<td>
							<a href="<?= site_url('aturan_gaji/edit/'.$data[$i]['id']); ?>">Edit</a> | 
							<a href="<?= site_url('aturan_gaji/delete/'.$data[$i]['id']); ?>">Hapus</a>
						</td>
					</tr>			
				<?php }} else { ?>
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data jabatan</td>
                    </tr>
                <?php } ?>
			</tbody>
		</table>
	</div>
</div>