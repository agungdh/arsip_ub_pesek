<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA DETAIL KONTRAK
                </h2>
            </div>
            <div class="body">
                <?php
                if ($this->session->level == 'a') {
                  ?>
                  <div class="button-demo">
                    <a href="<?php echo base_url('detail_kontrak/tambah'); ?>">
                      <button type="button" class="btn bg-blue waves-effect">
                        <i class="material-icons">add</i>Tambah Detail Kontrak
                      </button>
                    </a>
                  </div>
                  <?php
                } 
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">Nama Pekerjaan</th>
                                <th style="text-align: center;">Lokasi</th>
                                <th style="text-align: center;">Nilai RAB (Rp)</th>
                                <th style="text-align: center;">Bagian (Unit)</th>
                                <th style="text-align: center;">Tahun</th>
                                <th style="text-align: center;">Tanggal Mulai Kontrak</th>
                                <th style="text-align: center;">Tanggal Selesai Kontrak</th>
                                <th style="text-align: center;">No KL</th>
                                <th style="text-align: center;">Nama Perusahaan</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Berkas</th>
                                <?php
                                if ($this->session->level == 'a') {
                                  ?>
                                  <th style="text-align: center;">Proses</th>
                                  <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($this->db->query('SELECT *, YEAR(k.tgl_mulai_kontrak) tahun_kontrak FROM detail_kontrak dk, kontrak k, unit u, lokasi l, cv_pt cv WHERE dk.id_kontrak = k.id_kontrak AND k.id_unit = u.id_unit AND k.id_lokasi = l.id_lokasi AND dk.id_cv_pt = cv.id_cv_pt')->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $item->nama_pekerjaan; ?></td>
                              <td><?php echo $item->nama_lokasi; ?></td>
                              <td><?php echo $this->pustaka->rupiah($item->nilai); ?></td>
                              <td><?php echo $item->nama_unit; ?></td>
                              <td><?php echo $item->tahun_kontrak; ?></td>
                              <td><?php echo $this->pustaka->tanggal_indo($item->tgl_mulai_kontrak); ?></td>
                              <td><?php echo $this->pustaka->tanggal_indo($item->tgl_selesai_kontrak); ?></td>
                              <td><?php echo $item->no_kl; ?></td>
                              <td><?php echo $item->nama_perusahaan; ?></td>
                              <td><?php echo $item->status_kontrak == 'pm' ? 'Pemenang' : 'Pendamping'; ?></td>
                              <td><a href="<?php echo base_url('detail_kontrak/download/' . $item->id_detail_kontrak); ?>"><?php echo $item->nama_berkas; ?></a></td>
                                <?php
                                if ($this->session->level == 'a') {
                                  ?>
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
                                <?php
                                }
                                ?>
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