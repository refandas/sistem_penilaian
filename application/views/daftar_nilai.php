        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Chart -->
          <div style="width: 20%;">
            <canvas id="myChart" width="1" height="1"></canvas>
          </div>

          <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['A', 'B', 'C', 'D', 'E'],
                datasets: [{
                  label: '# Jumlah',
                  data: [
                    <?php
                      $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;
                      foreach($nilai->result() as $val):
                        if($val->nilai_akhir > 80)
                          $a++;
                        else if($val->nilai_akhir > 70 && $val->nilai_akhir <= 80)
                          $b++;
                        else if($val->nilai_akhir > 55 && $val->nilai_akhir <= 70)
                          $c++;
                        else if($val->nilai_akhir > 35 && $val->nilai_akhir <= 55)
                          $d++;
                        else 
                          $e++;
                      endforeach;
                      echo $a . ", " . $b . ", " . $c . ", " . $d . ", " . $e;
                    ?>
                  ],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                  ],
                    borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            })

          </script>

          <!-- End of Chart -->

          <!-- Content -->
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
                    <td><?= $nilai->nama; ?></td>
                    <td class="text-center"><?= $nilai->harian; ?></td>
                    <td class="text-center"><?= $nilai->kuis; ?></td>
                    <td class="text-center"><?= $nilai->responsi; ?></td>
                    <td class="text-center"><?= $nilai->project; ?></td>
                    <td class="text-center">
                      <?php
                        if($nilai->nilai_akhir > 80)
                          echo 'A';
                        else if($nilai->nilai_akhir > 70 && $nilai->nilai_akhir <= 80)
                          echo 'B';
                        else if($nilai->nilai_akhir > 55 && $nilai->nilai_akhir <= 70)
                          echo 'C';
                        else if($nilai->nilai_akhir > 35 && $nilai->nilai_akhir <= 55)
                          echo 'D';
                        else 
                          echo 'E';
                      ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </form>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->