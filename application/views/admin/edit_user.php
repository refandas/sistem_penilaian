        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="<?= $user['username']; ?>" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="<?= $user['nama']; ?>" class="form-control" id="nama" name="nama">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->