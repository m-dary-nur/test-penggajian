<div class="container">
	<div class="header-page mt-5">
		<h5>Karyawan</h5>
		<a class="btn btn-primary" href="<?= site_url('karyawan/add'); ?>">Tambah</a>
	</div>
</div>
<div class="container-fluid">
	<div class="mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Jabatan</th>
					<th scope="col">NIP</th>
					<th scope="col">Nama</th>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col">Tanggal Lahir</th>
					<th scope="col">No. Telepon</th>
					<th scope="col">Email</th>
					<th scope="col">Alamat</th>
					<th scope="col">Masa Kerja</th>
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
						<td><?= $data[$i]["nip"] ?></td>
						<td><?= $data[$i]["nama"] ?></td>
						<td><?= ($data[$i]["jenis_kelamin"] == 'L') ? 'Laki - Laki' : ($data[$i]["jenis_kelamin"] == 'P' ? 'Perempuan' : '-'); ?></td>						
						<td><?= date('d M Y', strtotime($data[$i]["tgl_lahir"])) ?></td>
						<td><?= $data[$i]["telp"] ?></td>
						<td><?= $data[$i]["email"] ?></td>
						<td><?= $data[$i]["alamat"] ?></td>
						<td><?= $data[$i]["masa_kerja"] == '0' ? 'Kurang dari setahun' : $data[$i]["masa_kerja"].' Tahun' ?></td>
						<td>
							<a href="<?= site_url('karyawan/edit/'.$data[$i]['id']); ?>">Edit</a> | 
							<a href="<?= site_url('karyawan/delete/'.$data[$i]['id']); ?>">Hapus</a>
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