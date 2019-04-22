        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?= $this->session->flashdata('message'); ?>
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Plug</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftar_input->result() as $daftar_input): ?>
                    <tr>
                            <td><a href="<?= base_url('asisten/input_nilai/') . $daftar_input->kode_jadwal; ?>" class="text-decoration-none">
                                <?= $daftar_input->nama_mka; ?>
                            </a></td>
                            <td class="text-center"><?= $daftar_input->plug; ?></td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->