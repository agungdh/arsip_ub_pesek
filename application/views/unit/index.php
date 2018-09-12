<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA UNIT
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Unit</th>
                                <th style="text-align: center;" colspan="2">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($this->db->get('unit')->result() as $item) {
                            ?>
                            <tr>
                              <td><?php echo $item->nama_unit; ?></td>
                              <td style="text-align: right;">
                                <a href="<?php echo base_url('unit/edit/' . $item->id_unit); ?>">
                                  <button type="button" class="btn bg-blue waves-effect">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </td>
                              <td style="text-align: left;">
                                <a href="javascript:void(0)">
                                  <button type="button" class="btn bg-red waves-effect">
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