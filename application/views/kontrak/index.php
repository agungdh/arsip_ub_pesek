<div class="row clearfix">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="card">
        <div class="header">
            <h2>
                FILTER
            </h2>
        </div>
        <div class="body">

                <label for="bulan">Bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Bulan" type="number" min="1" max="12" id="bulan" class="form-control" required value="<?php echo date('n'); ?>">
                    </div>
                </div>
                
                <label for="tahun">Tahun</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Tahun" type="number" min="1900" max="2900" id="tahun" class="form-control" required value="<?php echo date('Y'); ?>">
                    </div>
                </div>
        </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="card">
        <div class="header">
            <h2>
                ORDER
            </h2>
        </div>
        <div class="body">

                <label for="bulan">Bulan</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" id="order">
                      <option value="tanggala">Tanggal Terendah</option>
                      <option value="tanggalz">Tanggal Tertinggi</option>
                      <option value="raba">RAB Terendah</option>
                      <option value="rabz">RAB Tertinggi</option>
                    </select>
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
                    DATA KONTRAK
                </h2>
            </div>
            <div class="body">
                <?php
                if ($this->session->level == 'a') {
                  ?>
                  <div class="button-demo">
                    <a href="<?php echo base_url('kontrak/tambah'); ?>">
                      <button type="button" class="btn bg-blue waves-effect">
                        <i class="material-icons">add</i>Tambah Kontrak
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
                                <th style="text-align: center;">Nama Pekerjanaan</th>
                                <th style="text-align: center;">Nama Unit</th>
                                <th style="text-align: center;">Lokasi</th>
                                <th style="text-align: center;">Tanggal Mulai Kontrak</th>
                                <th style="text-align: center;">Tanggal Selesai Kontrak</th>
                                <th style="text-align: center;">NO KL</th>
                                <th style="text-align: center;">Nilai</th>
                                <th style="text-align: center;">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>