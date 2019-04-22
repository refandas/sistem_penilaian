        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('asisten/save/') . $nilai['nim']; ?>" method="post">
            <div class="form-group">
                <h5><?= $nilai['nim']; ?></h5>
                <h5><?= $nilai['nama']; ?></h5>
            </div>

            <div class="form-group">
                <label for="harian">Harian</label>
                <input type="text" value="<?= $nilai['harian']; ?>" class="form-control" id="harian" name="harian" placeholder="Harian">
            </div>
            <div class="form-group">
                <label for="kuis">Kuis</label>
                <input type="text" value="<?= $nilai['kuis']; ?>" class="form-control" id="kuis" name="kuis" placeholder="kuis">
            </div>
            <div class="form-group">
                <label for="responsi">Responsi</label>
                <input type="text" value="<?= $nilai['responsi']; ?>" class="form-control" id="responsi" name="responsi" placeholder="responsi">
            </div>
            <div class="form-group">
                <label for="project">Project</label>
                <input type="text" value="<?= $nilai['project']; ?>" class="form-control" id="project" name="project" placeholder="project">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->