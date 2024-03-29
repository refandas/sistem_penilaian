        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?= $this->session->flashdata('message'); ?>
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Content -->

          <table class="table table-striped">
            <thead>
                <tr class="text-center">
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dosen->result() as $dosen): ?>
                    <tr>
                    <td class="text-center"><?= $dosen->username; ?></td>
                    <td><?= $dosen->nama; ?></td>
                    <td class="text-center">
                        <?php echo $dosen->aktif == 1 ? "Aktif" : "Nonaktif"; ?>
                    </td>
                    <td class="text-center">
                        <?php if($dosen->aktif == 1): ?>
                          <a href="<?= base_url('admin/nonaktif/3/') . $dosen->username; ?>" class="text-decoration-none btn btn-danger">Nonaktifkan</a>
                        <?php elseif($dosen->aktif == 0): ?>
                          <a href="<?= base_url('admin/aktifkan/3/') . $dosen->username; ?>" class="text-decoration-none btn btn-success">Aktifkan</a>
                        <?php endif; ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->