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
            var data1 = {
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
                    'rgba(51,255,0,0.9)',
                    'rgba(51,153,255,0.9)',
                    'rgba(255,255,0,0.9)',
                    'rgba(255,153,0,0.9)',
                    'rgba(255,0,0,0.9)'
                  ],
                  borderWidth: [1, 1, 1, 1, 1]
                }]
            };

            var options = {
              responsive: true,
              title: {
                display: true,
                position: "top",
                text: "Statistik nilai",
                fontSize: 18,
                fontColor: "#111"
              },
              legend: {
                display: true,
                position: "bottom",
                labels: {
                  fontColor: "#333",
                  fontSize: 16
                }
              }
            };

            // create chart class object
            var chart = new Chart(ctx, {
              type: "pie",
              data: data1,
              options: options
            });

          </script>

          <!-- End of Chart -->

          <!-- Content -->
            <table id="table-data" class="table table-striped table-bordered">
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

      <script>
        $(document).ready(function() {
          $('#table-data').DataTable();
        });
      </script>