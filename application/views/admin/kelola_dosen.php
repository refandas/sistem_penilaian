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
            <?php foreach ($dosen->result() as $dosen): ?>
                    <tr>
                    <td><?= $dosen->username; ?></td>
                    <td><?= $dosen->nama; ?></td>
                    <td>
                        <?php echo $dosen->aktif == 1 ? "Aktif" : "Nonaktif"; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/edit_user/') . $dosen->username; ?>" class="text-decoration-none btn btn-primary">Edit</a>
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