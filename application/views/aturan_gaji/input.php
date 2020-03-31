<div class="container">
	<div class="header-page mt-5">
		<h5><?= $label; ?> Aturan Gaji</h5>
		<a class="btn btn-danger" href="<?= site_url('aturan_gaji'); ?>">kembali</a>
	</div>
	<div class="mt-5">
        <form method="post" action="<?= site_url('aturan_gaji/'.(($action == 'edit') ? 'update/'.$data['id'] : 'create')); ?>">
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
                <div class="form-group col-4 col-xs-12">
                    <label for="masa_kerja">Masa Kerja (dalam tahun)</label>
                    <input name="masa_kerja" type="number" class="form-control" id="masa_kerja" value="<?php if ($action == 'edit') { echo $data['masa_kerja']; } ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 col-xs-12">
                    <label for="intensif">Intensif</label>
                    <input name="intensif" type="number" class="form-control" id="intensif" value="<?php if ($action == 'edit') { echo $data['intensif']; } ?>" />
                </div>
                <div class="form-group col-4 col-xs-12">
                    <label for="bonus">Bonus</label>
                    <input name="bonus" type="number" class="form-control" id="bonus" value="<?php if ($action == 'edit') { echo $data['bonus']; } ?>" />
                </div>
            </div>                 
            <button class="btn btn-success">Simpan</button>
        </form>
	</div>
</div>