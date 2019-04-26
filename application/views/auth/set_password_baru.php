<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Set Password Baru</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
  <script>
    $(document).ready(function() {
      $('#password1, #password2').on('keyup', function () {
        if($('#password1').val() == $('#password2').val()) {
          $('#message').html('Password sama').css('color', 'green');
        }
        else {
          $('#message').html('Password berbeda').css('color', 'red');
        }
      })
    });
  </script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                  </div>

                    <h5 class="mx-3"><?= $username; ?></h5>

                  <form class="user" action="<?= base_url('auth/save_password_baru/') . $username; ?>" method="post" oninput='password2.setCustomValidity(password2.value != password1.value ? "Password tidak sama" : ""' class="validatedForm">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password1" id="password1" required placeholder="Password baru">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi password">
                    </div>
                    <div class="form-group">
                      <span id="message"></span>
                    </div>

                    <button id="btn_submit" type="submit" class="btn btn-primary btn-user btn-block">Ubah Password</button>
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('registrasi'); ?>">Buat Akun!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.js'); ?>"></script>

</body>

</html>
