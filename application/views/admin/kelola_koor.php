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
            <?php foreach ($koor->result() as $koor): ?>
                    <tr>
                    <td class="text-center"><?= $koor->username; ?></td>
                    <td><?= $koor->nama; ?></td>
                    <td class="text-center">
                        <?php echo $koor->aktif == 1 ? "Aktif" : "Nonaktif"; ?>
                    </td>
                    <td class="text-center">
                      <a href="" class="text-decoration-none btn btn-primary">Ganti</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="<?= base_url('admin/ganti_koor/') . $koor->username; ?>" id="ganti_koor" class="my-5" method="post">
          <h4>Ganti Koor</h4>
          <select name="koor_baru" id="nama_dosen" class="form-control">
            <option value="null">Pilih dosen...</option>
            <?php foreach($dosen->result() as $dosen): ?>
              <option value="<?= $dosen->username; ?>"><?= $dosen->nama; ?></option>
            <?php endforeach; ?>
          </select>
          <button type="submit" class="btn btn-primary my-3">Tetapkan Sebagai Koordinator</button>
        </form>

        <script type="text/javascript">
              $("#plug_prak").hide();
              $(document).ready(function(){
                $("#pencarian_lanjut").click(function(){
                  $("#plug_prak").toggle();
                });
              });
          </script>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->