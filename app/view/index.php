<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content='text/html; charset=iso-8859-1' http-equiv='Content-type' />
    <meta content='width=330, height=400, initial-scale=1' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Sistem Aplikasi Bengkel Mobil</title>
    <meta name="description" content="Sistem Aplikasi Bengkel">
    <meta name="author" content="">
    <!--  -->
    <link rel="shortcut icon" href="../../assets/icon/Logo SMB.png" type="image/x-icon">
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

    function showpw() {
        var passwd = document.getElementById("passwd");
        if (passwd.type === "password") {
            document.getElementById("passwd").type = "text";
        } else {
            document.getElementById("passwd").type = "password";
        }
    }
    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
    </script>
</head>

<body id="beranda" style="background: rgba(135,191,235,0.55);">
    <nav class="navbar-nav-scroll">
        <header class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">Sahabat Motor Bengkel</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupported"
                    aria-controls="navbarSupported" aria-hidden="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarSupported">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto ms-lg-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active fs-6" aria-current="page">
                                <i class="fas fa-home-alt"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active fs-6" aria-current="page" data-bs-target="#signin"
                                data-bs-toggle="modal">
                                <i class="fas fa-sign-in-alt"></i>
                                Sign In
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#productservice" class="nav-link active fs-6" aria-current="page">
                                <i class="fab fa-product-hunt"></i>
                                Product & Services
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </nav>

    <div class="modal fade" id="signin" tabindex="-1" aria-hidden="true">
        <div class="container-fluid mx-auto mt-5">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                            aria-expanded="false"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-5 mt-5 mb-2 mb-lg-auto container-fluid bg-body-secondary rounded-1">
                            <div class="container-fluid py-5">
                                <h4 class="fs-2 text-center"><i class="fas fa-user-alt"></i> LOGIN USER</h4>
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
                                        <button class="btn btn-primary active mx-3" name="submited" type="submit">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </button>
                                        <button class="btn btn-danger active mx-3" type="reset">
                                            <i class="fas fa-eraser"></i>
                                        </button>
                                    </div>
                                </form>
                                <a href="#" class="nav-item text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#register" aria-controls="register">
                                    <h3 class="display-4 nav-link text-center mt-3 mt-lg-3 mb-2 mb-lg-2">Sign up !</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="register" tabindex="-1">
        <div class="container-fluid">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title display-5 fs-3 text-center">
                            Register Account Konsumen
                        </h4>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                            aria-expanded="false"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../action/act-register.php" method="post">
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-envelope display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <input type="text" name="userEmail" class="form-control"
                                        placeholder="masukkan username / Email ..." required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-lock display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="password" name="password" id="passwd" class="form-control"
                                            placeholder="masukkan kata sandi ..." required>
                                        <div class="input-group-text">
                                            <input type="checkbox" onclick="showpw();">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-user-alt display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="masukkan username ..." required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-user-alt display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="masukkan nama anda ..." required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-phone display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <input type="text" name="telp_kon" class="form-control"
                                        placeholder="masukkan nomer telepon ..." required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-map-location display-6 mx-1 mb-1 mb-lg-1"></h3>
                                    <input type="text" name="alamat_kon" class="form-control"
                                        placeholder="masukkan alamat rumah ..." required>
                                </div>
                            </div>
                            <div class="border border-top border-secondary mt-3 mt-lg-3 mb-2 mb-lg-2"></div>
                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary active mx-3" name="submited" type="submit">
                                    <i class="fas fa-save"></i>
                                    Simpan
                                </button>
                                <button class="btn btn-danger active mx-3" type="reset">
                                    <i class="fas fa-eraser"></i>
                                    Reset All
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-black display-3 text-center">Sahabat Motor Bengkel</h3>
    <p class="text-center">
        Jl. Pegangsaan Dua No.68, RT.8/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Jkt Utara, Daerah Khusus
        Ibukota Jakarta 14250
    </p>
    <div class="text-center">
        <a href="https://maps.app.goo.gl/ruTHWXiP6pcLYbbC6" target="_blank" class="btn btn-primary my-1 my-lg-1">
            <i class="fas fa-location-pin"></i>
            Google Maps
        </a>
    </div>

    <section class="min-vh-100">
        <div class="p-3 mb-2 mb-lg-2 d-flex justify-content-center align-items-center">
            <div class="py-5 bg-transparent container col-md-5 col-lg-5">
                <div class="d-flex justify-content-center align-items-center mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 4"></button> -->
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../../assets/main/sahabat motor.jpg" alt="sahabat motor"
                                    class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="../../assets/main/servis-1.jpg" alt="servis" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="../../assets/main/servis-2.jpg" alt="servis" class="d-block w-100">
                            </div>
                            <!-- <div class="carousel-item">
                                <img src="../../assets/main/" alt="servis" class="d-block w-100">
                            </div> -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="min-height: 50vh;" id="productservice">
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-5 mb-2 mb-lg-2 col-md-7 col-lg-7">
                <div class="container-md container-lg py-5 active" style="background-color: skyblue;">
                    <h3 class="fs-2 display-5 text-stat fw-semibold" style="color: white;">PRODUCT & SERVICE</h3>
                    <div class="border-top my-2 border-warning col-md-2 col-lg-2"></div>
                    <div class="">
                        <p class="text-start text-white fw-medium fs-4">
                            Kami menyediakan berbagai jenis service diantaranya Tune-Up, Spooring Balancing, Service
                            Rem, Jasa kuras mesin, dan lain lain.
                        </p>
                        <p class="text-start text-white fw-medium fs-4">
                            selain itu kami juga memiliki beberapa jenis paket service berkala, paket sultan, paket
                            ekonomis, dan paket bensin.
                        </p>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="card col-md-6 col-lg-6 bg-transparent border-0">
                                <div class="card-body">
                                    <img src="../../assets/main/paket.PNG" alt="" class="d-block w-100 opacity-75">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="min-height: 50vh;">
        <br>
    </div>

    <div class="container-md container-lg">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top border-dark">
            <div class="col-md-4 col-lg-4 mb-3">
                <div class="card border border-0 bg-transparent">
                    <div class="card-header border border-0 bg-transparent">
                        <h5 class="card-title">About</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="fs-6">
                                Sahabat Motor yaitu didirikan pertengahan 2016 salah satu usaha jasa yaitu sebuah
                                bengkel resmi sepeda mobil yang merupakan tempat untuk Melakukan perawatan serta
                                pemeliharaan sepeda mobil seperti perbaikan kaki – kaki mobil, service AC, Tune Up,
                                Turun mesin, service mesin, repair body dan masing banyak lainnya.
                            </p>
                            <p class="fs-6">
                                serta melayani pembelian selalu berfokus untuk memberikan pelayanan, kinerja serta
                                fasilitas yang terbaik untuk kepuasan pengguna jasa serta dapat meningkatkan profit dan
                                produktivitas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-3">
                <h5>Sahabat Motor Bengkel</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#beranda" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#productservice" class="nav-link p-0 text-body-secondary">Product
                            & Services</a></li>
                    <li class="nav-item mb-2"><a href="https://wa.me/+6285330062002"
                            class="nav-link p-0 text-body-secondary">Whatsapp</a></li>
                </ul>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Maps Sahabat Motor Bengkel</h5>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31735.507438231725!2d106.89356583476564!3d-6.138974099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698aab73077acf%3A0x276b22a7a799c001!2sBengkel%20Sahabat%20Motor%20(SM)!5e0!3m2!1sid!2sid!4v1704691591698!5m2!1sid!2sid"
                    width="390" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <p class="text-body-secondary">© Sahabat Motor Bengkel, 2024</p>
            </div>

        </footer>
    </div>
</body>

</html>