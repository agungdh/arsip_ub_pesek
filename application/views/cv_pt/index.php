<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA CV/PT
                </h2>
            </div>
            <div class="body">
                <div class="button-demo">
                  <a href="<?php echo base_url('cv_pt/tambah'); ?>">
                    <button type="button" class="btn bg-blue waves-effect">
                      <i class="material-icons">add</i>Tambah CV/PT
                    </button>
                  </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Perusahaan</th>
                                <th style="text-align: center;">Nama Direktur</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">No Telepon</th>
                                <th style="text-align: center;">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($this->db->get('cv_pt')->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $item->nama_perusahaan; ?></td>
                              <td><?php echo $item->nama_direktur; ?></td>
                              <td><?php echo $item->alamat; ?></td>
                              <td><?php echo $item->no_telepon; ?></td>
                                <td style="text-align: center;">
                                  <a href="<?php echo base_url('cv_pt/ubah/' . $item->id_cv_pt); ?>">
                                    <button type="button" class="btn bg-blue waves-effect">
                                      <i class="material-icons">edit</i>
                                    </button>
                                  </a>
                                  <a href="javascript:void(0)">
                                    <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_cv_pt; ?>')">
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