<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                UBAH UNIT
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('unit/aksi_ubah'); ?>">

                <input type="hidden" name="where[id_unit]" value="<?php echo $data['unit']->id_unit; ?>">

                <label for="nama_unit">Nama Unit</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama Unit" type="text" name="data[nama_unit]" id="nama_unit" class="form-control" required value="<?php echo $data['unit']->nama_unit; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('unit'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>