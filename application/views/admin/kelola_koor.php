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
                      <button id="ganti" class="btn btn-primary">Ganti</button>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="<?= base_url('admin/ganti_koor/') . $koor->username; ?>" id="ganti_koor" class="my-5" method="post">
          <h4>Ganti Koor</h4>
          <select name="koor_baru" id="nama_dosen" class="form-control">
            <option selected value="null">Pilih dosen...</option>
            <?php foreach($dosen->result() as $dosen): ?>
              <option value="<?= $dosen->username; ?>"><?= $dosen->nama; ?></option>
            <?php endforeach; ?>
          </select>
          <button type="submit" class="btn btn-primary my-3" data-toggle="modal" data-target="#gantiKoorModal">Tetapkan Sebagai Koordinator</button>
        </form>

        <!-- Ganti Koor Modal -->
        <div class="modal fade" id="gantiKoorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ganti koor?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Pilih "Ganti Koor" untuk melanjutkan.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ganti Koor</a>
                </div>
              </div>
            </div>
          </div>

        <script type="text/javascript">
              $("#ganti_koor").hide();
              $(document).ready(function(){
                $("#ganti").click(function(){
                  $("#ganti_koor").toggle();
                });
              });
          </script>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->