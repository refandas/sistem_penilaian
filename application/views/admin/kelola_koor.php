        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Content -->

          <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($koor->result() as $koor): ?>
                    <tr>
                    <td><?= $koor->username; ?></td>
                    <td><?= $koor->nama; ?></td>
                    <td>
                        <?php echo $koor->aktif == 1 ? "Aktif" : "Nonaktif"; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapus_anggota/') . $koor->username; ?>" class="text-decoration-none btn btn-danger">Delete</a>
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