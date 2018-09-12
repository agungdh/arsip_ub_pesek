<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                DATA KONTRAK
            </h2>
        </div>
        <div class="body">
          <label for="nama_pekerjaan">Nama Pekerjaan</label>
          <div class="form-group">
              <div class="form-line">
                  <input placeholder="Masukkan Nama Pekerjaan" type="text" name="data[nama_pekerjaan]" id="nama_pekerjaan" class="form-control" required value="<?php echo $data['kontrak']->nama_pekerjaan; ?>" readonly>
              </div>
          </div>
          
          <label for="id_unit">Nama Unit</label>
          <div class="form-group">
              <select class="form-control show-tick" data-live-search="true" name="data[id_unit]" id="id_unit" disabled>
                  <?php
                  foreach ($this->db->get('unit')->result() as $item) {
                      ?>
                      <option <?php echo $item->id_unit == $data['kontrak']->id_unit ? 'selected' : null; ?> value="<?php echo $item->id_unit; ?>"><?php echo $item->nama_unit; ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          
          <label for="id_lokasi">Lokasi</label>
          <div class="form-group">
              <select class="form-control show-tick" data-live-search="true" name="data[id_lokasi]" id="id_lokasi" disabled>
                  <?php
                  foreach ($this->db->get('lokasi')->result() as $item) {
                      ?>
                      <option <?php echo $item->id_lokasi == $data['kontrak']->id_lokasi ? 'selected' : null; ?> value="<?php echo $item->id_lokasi; ?>"><?php echo $item->nama_lokasi; ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          
          <label for="tgl_mulai_kontrak">Tanggal Mulai Kontrak</label>
          <div class="form-group">
              <div class="form-line">
                  <input placeholder="Masukkan Tanggal Mulai Kontrak" type="text" name="data[tgl_mulai_kontrak]" id="tgl_mulai_kontrak" class="form-control datepicker" required value="<?php echo $this->pustaka->tanggal_indo($data['kontrak']->tgl_mulai_kontrak); ?>" readonly>
              </div>
          </div>

          <label for="tgl_selesai_kontrak">Tanggal Selesai Kontrak</label>
          <div class="form-group">
              <div class="form-line">
                  <input placeholder="Masukkan Tanggal Selesai Kontrak" type="text" name="data[tgl_selesai_kontrak]" id="tgl_selesai_kontrak" class="form-control datepicker" required value="<?php echo $this->pustaka->tanggal_indo($data['kontrak']->tgl_selesai_kontrak); ?>" readonly>
              </div>
          </div>
          
          <label for="no_kl">Nomor KL</label>
          <div class="form-group">
              <div class="form-line">
                  <input placeholder="Masukkan Nomor KL" type="text" name="data[no_kl]" id="no_kl" class="form-control" required value="<?php echo $data['kontrak']->no_kl; ?>" readonly>
              </div>
          </div>

          <label for="nilai">Nilai</label>
          <div class="form-group">
              <div class="form-line">
                  <input placeholder="Masukkan Nilai" type="text" name="data[nilai]" id="nilai" class="form-control" required value="<?php echo $this->pustaka->rupiah($data['kontrak']->nilai); ?>" readonly>
              </div>
          </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                TAMBAH DETAIL KONTRAK
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('detail_kontrak/aksi_tambah'); ?>" enctype="multipart/form-data">

                <input type="hidden" name="data[id_kontrak]" value="<?php echo $data['kontrak']->id_kontrak; ?>">

                <label for="id_cv_pt">CV/PT</label>
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
                
                <label for="status_kontrak">Status Kontrak</label>
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
                <a href="<?php echo base_url('detail_kontrak/index/' . $data['kontrak']->id_kontrak); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>