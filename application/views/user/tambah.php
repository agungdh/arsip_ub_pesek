<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                TAMBAH LOKASI
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('lokasi/aksi_tambah'); ?>">

                <label for="nama_lokasi">Nama Lokasi</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama Lokasi" type="text" name="data[nama_lokasi]" id="nama_lokasi" class="form-control" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('lokasi'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>