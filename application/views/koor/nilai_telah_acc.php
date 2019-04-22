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
                <?php foreach ($nilai->result() as $nilai): ?>
                    <tr>
                        <?php if($nilai->acc == 1): ?>
                            <td><a href="<?= base_url('koor/acc_nilai/') . $nilai->kode_jadwal; ?>" class="text-decoration-none">
                                <?= $nilai->nama_mka; ?>
                            </a></td>
                            <td class="text-center"><?= $nilai->plug; ?></td>
                        <?php endif; ?>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->