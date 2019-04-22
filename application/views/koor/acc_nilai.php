        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3><?= $nama_mka['nama']?></h3>
          <h3>Plug <?= " " . $plug['plug']; ?></h3>
          <hr>
          <h5>Nama Asisten</h3>
          <?php foreach($asisten->result() as $asisten): ?>
            <h5>- <?= " " . $asisten->nama; ?></h3>
          <?php endforeach; ?>

            <!-- Content -->
            <form action="<?= base_url('koor/save/') . $kode_jadwal; ?>" method="post">
              <table class="table table-striped">
              <thead class="text-center">
                  <tr>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harian</th>
                  <th scope="col">Kuis</th>
                  <th scope="col">Responsi</th>
                  <th scope="col">Project</th>
                  <th scope="col">Nilai Akhir</th>
                  </tr>
              </thead>
              <tbody class="text-center">
                <?php foreach ($daftar_nilai->result() as $daftar_nilai): ?>
                      <tr>
                      <td><?= $daftar_nilai->nim; ?></td>
                      <td><?= $daftar_nilai->nama_mhs; ?></td>
                      <td><?= $daftar_nilai->harian; ?></td>
                      <td><?= $daftar_nilai->kuis; ?></td>
                      <td><?= $daftar_nilai->responsi; ?></td>
                      <td><?= $daftar_nilai->project; ?></td>
                      <td>
                        <?php
                          if($daftar_nilai->nilai_akhir > 80)
                            echo 'A';
                          else if($daftar_nilai->nilai_akhir > 75 && $daftar_nilai->nilai_akhir <= 80)
                            echo 'B';
                          else if($daftar_nilai->nilai_akhir > 60 && $daftar_nilai->nilai_akhir <= 75)
                            echo 'C';
                          else if($daftar_nilai->nilai_akhir > 35 && $daftar_nilai->nilai_akhir <= 60)
                            echo 'D';
                          else 
                            echo 'E';
                        ?>
                      </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
              </table>

              <button type="submit" class="btn btn-primary">Acc Penilaian</button>
            </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->