<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA UNIT
                </h2>
            </div>
            <div class="body">
                <div class="button-demo">
                  <a href="<?php echo base_url('unit/tambah'); ?>">
                    <button type="button" class="btn bg-blue waves-effect">
                      <i class="material-icons">add</i>Tambah Unit
                    </button>
                  </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">Nama Unit</th>
                                <th style="text-align: center;">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($this->db->get('unit')->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $item->nama_unit; ?></td>
                                <td style="text-align: center;">
                                  <a href="<?php echo base_url('unit/ubah/' . $item->id_unit); ?>">
                                    <button type="button" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Ubah">
                                      <i class="material-icons">edit</i>
                                    </button>
                                  </a>
                                  <a href="javascript:void(0)">
                                    <button type="button" class="btn bg-red waves-effect" onclick="hapus('<?php echo $item->id_unit; ?>')" data-toggle="tooltip" data-placement="top" title="Hapus">
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