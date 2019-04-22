        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
          <hr>
          <!-- Content -->
        <form action="<?= base_url('penilaian/lihat_nilai'); ?>" method="post">
            <div class="form-group">
                <label for="tahun_ajar">Tahun Ajaran</label>
                <select id="tahun_ajar" class="form-control" name="tahun_ajar">
                    <option selected>Choose...</option>
                    <?php foreach($tahun->result() as $tahun): ?>
                        <option value="<?= $tahun->tahun_ajar; ?>"><?= $tahun->tahun_ajar; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="kode_mka">Mata Kuliah</label>
                <select id="kode_mka" class="form-control" name="kode_mka">
                    <option selected>Choose...</option>
                    <?php foreach($mka->result() as $mka): ?>
                        <option value="<?= $mka->kode_mka; ?>"><?= $mka->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group" id="plug_prak">
                <label for="plug">Plug</label>
                <select id="plug" class="form-control" name="plug">
                    <option selected value="null"></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lihat Nilai</button>
            <a href="#" class="btn btn-dark" id="pencarian_lanjut">Pencarian Lanjut</a>


            <script type="text/javascript">
                $("#plug_prak").hide();
                $(document).ready(function(){
                    $("#pencarian_lanjut").click(function(){
                        $("#plug_prak").toggle();
                    });
                });
            </script>

        </form>

          <!-- End of Content -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->