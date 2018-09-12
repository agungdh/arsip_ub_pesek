<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA KONTRAK
                </h2>
            </div>
            <div class="body">
                <div class="button-demo">
                  <a href="<?php echo base_url('kontrak/tambah'); ?>">
                    <button type="button" class="btn bg-blue waves-effect">
                      <i class="material-icons">add</i>Tambah Kontrak
                    </button>
                  </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Pekerjanaan</th>
                                <th style="text-align: center;">Nama Unit</th>
                                <th style="text-align: center;">Lokasi</th>
                                <th style="text-align: center;">Tanggal Mulai Kontrak</th>
                                <th style="text-align: center;">Tanggal Akhir Kontrak</th>
                                <th style="text-align: center;">NO KL</th>
                                <th style="text-align: center;">Nilai</th>
                                <th style="text-align: center;">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($this->db->get('kontrak')->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $item->nama_pekerjaan; ?></td>
                              <td><?php echo $this->db->get_where('unit', ['id_unit' => $item->id_unit])->row()->nama_unit; ?></td>
                              <td><?php echo $this->db->get_where('lokasi', ['id_lokasi' => $item->id_lokasi])->row()->nama_lokasi; ?></td>
                              <td><?php echo $this->pustaka->tanggal_indo($item->tgl_mulai_kontrak); ?></td>
                              <td><?php echo $this->pustaka->tanggal_indo($item->tgl_selesai_kontrak); ?></td>
                              <td><?php echo $item->no_kl; ?></td>
                              <td><?php echo $this->pustaka->rupiah($item->nilai); ?></td>
                                <td style="text-align: center;">
                                  <a href="<?php echo base_url('kontrak/ubah/' . $item->id_kontrak); ?>">
                                    <button type="button" class="btn bg-blue waves-effect">
                                      <i class="material-icons">edit</i>
                                    </button>
                                  </a>
                                  <a href="javascript:void(0)">
                                    <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_kontrak; ?>')">
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