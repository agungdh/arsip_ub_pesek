<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                TAMBAH DETAIL KONTRAK
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('detail_kontrak/aksi_tambah'); ?>" enctype="multipart/form-data">

                <label for="id_kontrak">Nama Pekerjaan</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[id_kontrak]" id="id_kontrak">
                        <?php
                        foreach ($this->db->get('kontrak')->result() as $item) {
                            ?>
                            <option value="<?php echo $item->id_kontrak; ?>"><?php echo $item->nama_pekerjaan; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <label for="id_cv_pt">Nama Perusahaan</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[id_cv_pt]" id="id_cv_pt">
                        <?php
                        foreach ($this->db->get('cv_pt')->result() as $item) {
                            ?>
                            <option value="<?php echo $item->id_cv_pt; ?>"><?php echo $item->nama_perusahaan; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <label for="status_kontrak">Status</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[status_kontrak]" id="status_kontrak">
                        <option value="pm">Pemenang</option>
                        <option value="pn">Pendamping</option>
                    </select>
                </div>

                <label for="berkas">Berkas</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Berkas" type="file" name="berkas" id="berkas" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('detail_kontrak'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>