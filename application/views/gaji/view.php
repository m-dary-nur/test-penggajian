<div class="container">
	<div class="header-page mt-5">
		<h5>Gaji</h5>
		<a class="btn btn-primary" href="<?= site_url('gaji/add'); ?>">Tambah</a>
	</div>
</div>
<div class="container-fluid">
	<div class="mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
                    <th scope="col">#</th>
					<th scope="col">Kode Penggajian</th>
					<th scope="col">NIP</th>
					<th scope="col">Karyawan</th>
					<th scope="col">Tgl Penerimaan</th>
					<th scope="col">Nominal</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
                <?php 
                if (count($data) > 0) {
                for ($i = 0; $i < count($data); $i++) { ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><?= $data[$i]["kode_penggajian"] ?></td>
						<td><?= $data[$i]["nip"] ?></td>
						<td><?= $data[$i]["nama"] ?></td>
						<td><?= date('d M Y', strtotime($data[$i]["tgl_penerimaan"])) ?></td>
						<td><?= number_format($data[$i]["nominal"], 2) ?></td>
						<td>
							<a href="<?= site_url('gaji/delete/'.$data[$i]['id']); ?>">Hapus</a>
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