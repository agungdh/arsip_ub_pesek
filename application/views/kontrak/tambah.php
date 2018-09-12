<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                TAMBAH KONTRAK
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('kontrak/aksi_tambah'); ?>">

                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama Pekerjaan" type="text" name="data[nama_pekerjaan]" id="nama_pekerjaan" class="form-control" required>
                    </div>
                </div>
                
                <label for="id_unit">Nama Unit</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[id_unit]" id="id_unit">
                        <?php
                        foreach ($this->db->get('unit')->result() as $item) {
                            ?>
                            <option value="<?php echo $item->id_unit; ?>"><?php echo $item->nama_unit; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <label for="id_lokasi">Lokasi</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[id_lokasi]" id="id_lokasi">
                        <?php
                        foreach ($this->db->get('lokasi')->result() as $item) {
                            ?>
                            <option value="<?php echo $item->id_lokasi; ?>"><?php echo $item->nama_lokasi; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <label for="tgl_mulai_kontrak">Tanggal Mulai Kontrak</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Tanggal Mulai Kontrak" type="date" name="data[tgl_mulai_kontrak]" id="tgl_mulai_kontrak" class="form-control datepicker" required>
                    </div>
                </div>

                <label for="tgl_selesai_kontrak">Tanggal Selesai Kontrak</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Tanggal Selesai Kontrak" type="date" name="data[tgl_selesai_kontrak]" id="tgl_selesai_kontrak" class="form-control datepicker" required>
                    </div>
                </div>
                
                <label for="no_kl">Nomor KL</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nomor KL" type="text" name="data[no_kl]" id="no_kl" class="form-control" required>
                    </div>
                </div>

                <label for="nilai">Nilai</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nilai" type="number" min="0" name="data[nilai]" id="nilai" class="form-control" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('kontrak'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>