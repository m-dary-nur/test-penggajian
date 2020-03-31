
<div class="container">
	<div class="header-page mt-5">
		<h5><?= $label; ?> Jabatan</h5>
		<a class="btn btn-danger" href="<?= site_url('jabatan'); ?>">kembali</a>
	</div>
	<div class="mt-5">
        <form method="post" action="<?= site_url('jabatan/'.(($action == 'edit') ? 'update/'.$data['id'] : 'create')); ?>">
            <div class="form-row">
                <div class="form-group col-5 col-xs-12">
                    <label for="kode">Kode Jabatan</label>
                    <input name="kode" class="form-control" id="kode" value="<?php if ($action == 'edit') { echo $data['kode']; } ?>" />
                </div>            
                <div class="form-group col-7 col-xs-12">
                    <label for="nama">Nama Jabatan</label>
                    <input name="nama" class="form-control" id="nama" value="<?php if ($action == 'edit') { echo $data['nama']; } ?>" />
                </div>
            </div>
            <div class="form-row">            
                <div class="form-group col-6 col-xs-12">
                    <label for="standar">Standar Gaji</label>
                    <input name="standar" type="number" class="form-control" id="standar" value="<?php if ($action == 'edit') { echo $data['standar_gaji']; } ?>" />
                </div>            
            </div>            
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="3"><?php if ($action == 'edit') { echo $data['keterangan']; } ?></textarea>
            </div>            
            <button class="btn btn-success">Simpan</button>
        </form>
	</div>
</div>