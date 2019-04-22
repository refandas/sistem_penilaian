        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Content -->
          <form action="" method="post" class="my-3">
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
            <tbody>
              <?php foreach ($nilai->result() as $nilai): ?>
                    <tr>
                    <td class="text-center"><?= $nilai->nim; ?></td>
                    <td><a href="<?= base_url('asisten/input_nilai/') . $nilai->nim; ?>" class="text-decoration-none">
                      <?= $nilai->nama; ?></a>
                    </td>
                    <td class="text-center"><?= $nilai->harian; ?></td>
                    <td class="text-center"><?= $nilai->kuis; ?></td>
                    <td class="text-center"><?= $nilai->responsi; ?></td>
                    <td class="text-center"><?= $nilai->project; ?></td>
                    <td>
                      <?php
                        if($nilai->nilai_akhir > 80)
                          echo 'A';
                        else if($nilai->nilai_akhir > 75 && $nilai->nilai_akhir <= 80)
                          echo 'B';
                        else if($nilai->nilai_akhir > 60 && $nilai->nilai_akhir <= 75)
                          echo 'C';
                        else if($nilai->nilai_akhir > 35 && $nilai->nilai_akhir <= 60)
                          echo 'D';
                        else 
                          echo 'E';
                      ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Kirim Nilai</button>
          </form>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->