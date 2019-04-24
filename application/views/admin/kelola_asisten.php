        <!-- Begin Page Conte nt -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?= $this->session->flashdata('message'); ?>
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Content -->

          <table class="table table-striped">
            <thead>
                <tr class="text-center  ">
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($asisten->result() as $asisten): ?>
                    <tr>
                    <td class="text-center"><?= $asisten->username; ?></td>
                    <td><?= $asisten->nama; ?></td>
                    <td class="text-center">
                        <?php echo $asisten->aktif == 1 ? "Aktif" : "Nonaktif"; ?>
                    </td>
                    <td class="text-center">
                        <?php if($asisten->aktif == 1): ?>
                          <a href="<?= base_url('admin/nonaktif/4/') . $asisten->username; ?>" class="text-decoration-none btn btn-danger">Nonaktifkan</a>
                        <?php elseif($asisten->aktif == 0): ?>
                          <a href="<?= base_url('admin/aktifkan/4/') . $asisten->username; ?>" class="text-decoration-none btn btn-success">Aktifkan</a>
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