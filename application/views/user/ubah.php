<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                UBAH USER
            </h2>
        </div>
        <div class="body">
            <form method="post" action="<?php echo base_url('user/aksi_ubah'); ?>">

                <input type="hidden" name="where[id_user]" value="<?php echo $data['user']->id_user; ?>">

                <label for="nama">Nama</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Nama" type="text" name="data[nama]" id="nama" class="form-control" required value="<?php echo $data['user']->nama; ?>">
                    </div>
                </div>

                <label for="username">Username</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Username" type="text" name="data[username]" id="username" class="form-control" required value="<?php echo $data['user']->username; ?>">
                    </div>
                </div>

                <label for="password">Password</label>
                <div class="form-group">
                    <div class="form-line">
                        <input placeholder="Masukkan Password" type="password" name="data[password]" id="password" class="form-control">
                    </div>
                </div>
                
                <label for="level">Level</label>
                <div class="form-group">
                    <select class="form-control show-tick" data-live-search="true" name="data[level]" id="level">
                        <option <?php echo $data['user']->level == 'a' ? 'selected' : null; ?> value="a">Admin</option>
                        <option <?php echo $data['user']->level == 'p' ? 'selected' : null; ?> value="p">Pengguna</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success waves-effect">SIMPAN</button>
                <a href="<?php echo base_url('user'); ?>" class="btn btn-primary waves-effect">BATAL</a>
            </form>
        </div>
    </div>
</div>