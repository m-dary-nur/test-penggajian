<div class="container">
	<div class="header-page mt-5">
		<h5><?= $label; ?> Karyawan</h5>
		<a class="btn btn-danger" href="<?= site_url('karyawan'); ?>">kembali</a>
	</div>
	<div class="mt-5">
        <form method="post" action="<?= site_url('karyawan/'.(($action == 'edit') ? 'update/'.$data['id'] : 'create')); ?>">
            <div class="form-row">
                <div class="form-group col-5 col-xs-12">
                    <label for="jabatan_id">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-control">
                        <option value=""></value>
                        <?php for ($i = 0; $i < count($jabatan); $i++) { ?>
                            <option value="<?= $jabatan[$i]['id']; ?>" <?php if ($action == 'edit') { echo ($data['id'] == $jabatan[$i]['id']) ? 'selected' : ''; } ?>>
                                <?= $jabatan[$i]['kode'].' - '.$jabatan[$i]['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5 col-xs-12">
                    <label for="nip">NIP</label>
                    <input name="nip" class="form-control" id="nip" value="<?php if ($action == 'edit') { echo $data['nip']; } ?>" />
                </div>
                <div class="form-group col-7 col-xs-12">
                    <label for="nama">Nama Karyawan</label>
                    <input name="nama" class="form-control" id="nama" value="<?php if ($action == 'edit') { echo $data['nama']; } ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 col-xs-12">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value=""></value>                        
                        <option value="L" <?php if ($action == 'edit') { echo ($data['jenis_kelamin'] == 'L') ? 'selected' : ''; } ?>>
                            Laki - Laki
                        </option>
                        <option value="P" <?php if ($action == 'edit') { echo ($data['jenis_kelamin'] == 'P') ? 'selected' : ''; } ?>>
                            Perempuan
                        </option>
                    </select>
                </div>       
                <div class="form-group col-4 col-xs-12">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir" value="<?php if ($action == 'edit') { echo $data['tgl_lahir']; } ?>" />
                </div>
                <div class="form-group col-4 col-xs-12">
                    <label for="masa_kerja">Masa Kerja (dalam tahun)</label>
                    <input name="masa_kerja" type="number" class="form-control" id="masa_kerja" value="<?php if ($action == 'edit') { echo $data['masa_kerja']; } ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 col-xs-12">
                    <label for="telp">No. Telepon</label>
                    <input name="telp" class="form-control" id="telp" value="<?php if ($action == 'edit') { echo $data['telp']; } ?>" />
                </div>
                <div class="form-group col-6 col-xs-12">
                    <label for="email">Email</label>
                    <input name="email" class="form-control" id="email" value="<?php if ($action == 'edit') { echo $data['email']; } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" ><?php if ($action == 'edit') { echo $data['alamat']; } ?></textarea>
            </div>            
            <button class="btn btn-success">Simpan</button>
        </form>
	</div>
</div>