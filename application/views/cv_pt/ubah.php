<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                UBAH CV/PT
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('cv_pt/aksi_ubah'); ?>">

                <input type="hidden" name="where[id_cv_pt]" value="<?php echo $data['cv_pt']->id_cv_pt; ?>">

                <label for="nama_perusahaan">Nama Perusahaan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama Perusahaan" type="text" name="data[nama_perusahaan]" id="nama_perusahaan" class="form-control" required value="<?php echo $data['cv_pt']->nama_perusahaan; ?>">
                    </div>
                </div>
                
                <label for="nama_perusahaan">Nama Direktur</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama Direktur" type="text" name="data[nama_direktur]" id="nama_direktur" class="form-control" required value="<?php echo $data['cv_pt']->nama_direktur; ?>">
                    </div>
                </div>
                
                <label for="nama_perusahaan">Alamat</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Alamat" type="text" name="data[alamat]" id="alamat" class="form-control" required value="<?php echo $data['cv_pt']->alamat; ?>">
                    </div>
                </div>
                
                <label for="nama_perusahaan">Nomor Telepon</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nomor Telepon" type="text" name="data[no_telepon]" id="no_telepon" class="form-control" required value="<?php echo $data['cv_pt']->no_telepon; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('cv_pt'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>