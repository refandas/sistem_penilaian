        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

        <form action="<?= base_url('profil/save_edit/') . $user['username']; ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="<?= $user['username']; ?>" class="form-control" id="username" name="username" disabled>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="<?= $user['nama']; ?>" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?= $user['email']; ?>" class="form-control" id="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
            <a href="<?= base_url('dashboard'); ?>" class="btn btn-danger text-decoration-none">Batal</a>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->