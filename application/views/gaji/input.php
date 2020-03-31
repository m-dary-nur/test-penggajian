<div class="container">
	<div class="header-page mt-5">
		<h5><?= $label; ?> Gaji</h5>
		<a class="btn btn-danger" href="<?= site_url('gaji'); ?>">kembali</a>
	</div>
	<div class="mt-5">
        <form method="post" action="<?= site_url('gaji/'.(($action == 'edit') ? 'update/'.$data['id'] : 'create')); ?>">
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
                <div class="form-group col-7 col-xs-12">
                    <label for="karyawan_id">Karyawan <span id="jabatan"></span></label>
                    <select name="karyawan_id" id="karyawan_id" class="form-control">
                        <option value=""></value>                        
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 col-xs-12">
                    <label for="kode_penggajian">Kode Penggajian</label>
                    <input name="kode_penggajian" class="form-control" id="kode_penggajian" />
                </div>
                <div class="form-group col-4 col-xs-12">
                    <label for="nominal">Nominal</label>
                    <input name="nominal" type="number" readonly class="form-control" id="nominal" />
                </div>
                <div class="form-group col-4 col-xs-12">
                    <label for="tgl_penerimaan">Tanggal Penerimaan</label>
                    <input name="tgl_penerimaan" type="date" class="form-control" id="tgl_penerimaan" value="<?= date('Y-m-d'); ?>" />
                </div>
            </div>    
            <input name="karyawan_nip" style="display: none" />             
            <input name="karyawan_nama" style="display: none" />             
            <button class="btn btn-success">Simpan</button>
        </form>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        const karyawanList = <?= count($karyawan) ? json_encode($karyawan) : '[]' ; ?>;
        const jabatanList = <?= count($jabatan) ? json_encode($jabatan) : '[]' ; ?>;
        const aturan_gajiList = <?= count($aturan_gaji) ? json_encode($aturan_gaji) : '[]' ; ?>;

        const getKaryawan = (filter = '') => karyawanList.filter(x => x.jabatan_id == filter);

        if (karyawanList.length > 0) {            
            for (let i = 0; i < karyawanList.length; i++) {
                $("#karyawan_id").append(`<option value="${karyawanList[i]['id']}">${karyawanList[i]['nip'] + ' - ' + karyawanList[i]['nama']}</option>`)
            }
        }

        $("#jabatan_id").on("change", function ({ target: { value } }) {                        
            const newKaryawan = getKaryawan(value)
            const jabatanText = $("#jabatan_id option:selected").text().split(' - ')

            if (value) {
                $("#jabatan").text(`dengan jabatan ${jabatanText[1]}`);
            } else {
                $("#jabatan").text('');
            }

            $("#karyawan_id").empty().append(`<option value=""></option>`);
            $("#nominal").val('')
            for (let i = 0; i < newKaryawan.length; i++) {
                $("#karyawan_id").append(`<option value="${newKaryawan[i]['id']}">${newKaryawan[i]['nip'] + ' - ' + newKaryawan[i]['nama']}</option>`)
            }        
        })

        $("#karyawan_id").on("change", function ({ target: { value } }) {
            const iKaryawan = karyawanList.findIndex(x => x.id == value);
            const karyawan = karyawanList[iKaryawan];
            if (iKaryawan !== -1) {                
                $("#karyawan_nip").val(karyawan.nip);
                $("#karyawan_nama").val(karyawan.nama);
                const jabatan = jabatanList.find(x => x.id == karyawan.jabatan_id);
                const aturan_gaji = aturan_gajiList.filter(x => x.jabatan_id == karyawan.jabatan_id && karyawan.masa_kerja >= x.masa_kerja).reduce((p, n) => (p.masa_kerja > n.masa_kerja) ? p : n);
                if (jabatan && aturan_gaji) {
                    const standar_gaji = parseFloat(jabatan.standar_gaji);
                    const intensif = aturan_gaji.intensif ? parseFloat(aturan_gaji.intensif) : 0;
                    const bonus = aturan_gaji.bonus ? parseFloat(aturan_gaji.bonus) : 0;
                    $("#nominal").val(standar_gaji + intensif + bonus);
                }
            } else {
                $("#nominal").val('')
            }

            $("#nominal").val()
        })
    })
</script>