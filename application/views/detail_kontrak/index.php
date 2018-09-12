<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA DETAIL KONTRAK
                </h2>
            </div>
            <div class="body">
                <div class="button-demo">
                  <a href="<?php echo base_url('detail_kontrak/tambah/' . $data['kontrak']->id_kontrak); ?>">
                    <button type="button" class="btn bg-blue waves-effect">
                      <i class="material-icons">add</i>Tambah Detail Kontrak
                    </button>
                  </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Perusahaan</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Berkas</th>
                                <th style="text-align: center;">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($this->db->get_where('detail_kontrak', ['id_kontrak' => $data['kontrak']->id_kontrak])->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $this->db->get_where('cv_pt', ['id_cv_pt' => $item->id_cv_pt])->row()->nama_perusahaan; ?></td>
                              <td><?php echo $item->status_kontrak == 'pm' ? 'Pemenang' : 'Pendamping'; ?></td>
                              <td><a href="<?php echo base_url('detail_kontrak/download/' . $item->id_detail_kontrak); ?>"><?php echo $item->nama_berkas; ?></a></td>
                                <td style="text-align: center;">
                                  <a href="<?php echo base_url('detail_kontrak/ubah/' . $item->id_detail_kontrak); ?>">
                                    <button type="button" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Ubah">
                                      <i class="material-icons">edit</i>
                                    </button>
                                  </a>
                                  <a href="javascript:void(0)">
                                    <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_detail_kontrak; ?>')" data-toggle="tooltip" data-placement="top" title="Hapus">
                                      <i class="material-icons">delete</i>
                                    </button>
                                  </a>
                                </td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>