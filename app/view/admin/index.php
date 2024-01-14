<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Aplikasi Bengkel Mobil</title>
    <meta name="description" content="Sistem Aplikasi Bengkel">
    <meta name="author" content="">
    <!--  -->
    <link rel="shortcut icon" href="../../../assets/icon/Logo SMB.png" type="image/x-icon">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
    function passwd() {
        var pass = document.getElementById("pass");
        if (pass.type === "password") {
            document.getElementById("pass").type = "text";
        } else {
            document.getElementById("pass").type = "password";
        }
    }
    </script>
</head>

<body class="bg-danger active">
    <nav class="navbar navbar-expand-lg navbar-nav-scroll bg-body-tertiary">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Sistem Aplikasi Bengkel</a>
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupported"
                data-bs-toggle="collapse" data-bs-target="#navbarSupported">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupported">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active" aria-current="page">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Halaman Login -->

    <div class="d-grid align-items-center justify-content-center">
        <div class="p-5 mt-5 mb-2 mb-lg-auto container-fluid bg-body-secondary rounded-1">
            <div class="container-fluid py-5">
                <h3 class="display-4 fs-3 text-center"><i class="fas fa-user-alt"></i> LOGIN Admin</h3>
                <div class="border border-top border-black border-1"></div>
                <form action="act-signin.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row align-items-center mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fas fa-envelope mx-1 mb-1 mb-lg-1"></h1>
                            <input type="text" name="userEmail" class="form-control"
                                placeholder="masukkan username / Email ..." required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fas fa-lock mx-1 mb-1 mb-lg-1"></h1>
                            <div class="input-group">
                                <input type="password" name="password" id="pass" class="form-control"
                                    placeholder="masukkan kata sandi ..." required>
                                <div class="input-group-text">
                                    <input type="checkbox" onclick="passwd()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-top border-secondary mt-3 mt-lg-3 mb-2 mb-lg-2"></div>
                    <div class="modal-footer d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary active mx-3" name="submit" type="submit">
                            <i class="fas fa-sign-in-alt"></i>
                        </button>
                        <button class="btn btn-danger active mx-3" type="reset">
                            <i class="fas fa-eraser"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
</body>

</html>