<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                UBAH DETAIL KONTRAK
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('detail_kontrak/aksi_ubah'); ?>" enctype="multipart/form-data">

              <input type="hidden" name="where[id_detail_kontrak]" value="<?php echo $data['detail_kontrak']->id_detail_kontrak ?>">

                <label for="id_kontrak">Nama Pekerjaan</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[id_kontrak]" id="id_kontrak">
                        <?php
                        foreach ($this->db->get('kontrak')->result() as $item) {
                            ?>
                            <option <?php echo $data['detail_kontrak']->id_kontrak == $item->id_kontrak ? 'selected' : null; ?> value="<?php echo $item->id_kontrak; ?>"><?php echo $item->nama_pekerjaan; ?></option>
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
                            <option <?php echo $data['detail_kontrak']->id_cv_pt == $item->id_cv_pt ? 'selected' : null; ?> value="<?php echo $item->id_cv_pt; ?>"><?php echo $item->nama_perusahaan; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <label for="status_kontrak">Status</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[status_kontrak]" id="status_kontrak">
                        <option <?php echo $data['detail_kontrak']->status_kontrak == 'pm' ? 'selected' : null; ?> value="pm">Pemenang</option>
                        <option <?php echo $data['detail_kontrak']->status_kontrak == 'pn' ? 'selected' : null; ?> value="pn">Pendamping</option>
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