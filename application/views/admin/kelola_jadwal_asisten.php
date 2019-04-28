        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <form action="<?= base_url('admin/set_jadwal_asisten'); ?>" method="post">

            <div class="form-group">
                <label for="asisten">Asisten</label>
                <select id="asisten" class="form-control" name="username">
                    <option selected>Choose...</option>
                    <?php foreach ( $daftar_asisten->result() as $daftar_asisten ): ?>
                        <option value="<?= $daftar_asisten->username; ?>"><?= $daftar_asisten->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <select id="jadwal" class="form-control" name="kode_jadwal">
                    <option selected>Choose...</option>
                    <?php foreach ( $daftar_jadwal->result() as $daftar_jadwal ): ?>
                        <option value="<?= $daftar_jadwal->kode_jadwal; ?>">
                            <?= 
                                $daftar_jadwal->nama . " - " . 
                                $daftar_jadwal->plug . " - " .
                                $daftar_jadwal->tahun_ajar . " | " .
                                $daftar_jadwal->hari . " " .
                                $daftar_jadwal->waktu . " - ".
                                $daftar_jadwal->tempat; 
                            ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->