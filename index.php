<?php
error_reporting(0);
session_start();
$APP_NAME = "SIAKAD";
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo htmlspecialchars($APP_NAME); ?></title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="assets/css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print" onload="this.media='all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="assets/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="./" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b><?php echo htmlspecialchars($APP_NAME); ?></b></h1>
                </a>
            </div>
            <div class="card-body login-card-body">

                <?php
                if (isset($_POST['btnLogin'])) {
                    require_once "config.php";
                    
                    // Sanitize input
                    $tuser = trim($_POST['tuser']);
                    $tpass = $_POST['tpass'];
                    
                    // Validasi input
                    if (empty($tuser) || empty($tpass)) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Username dan password harus diisi!
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
                    } else {
                        // Gunakan prepared statement untuk mencegah SQL Injection
                        $sql = "SELECT * FROM users WHERE username = ?";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("s", $tuser);
                        $stmt->execute();
                        $hasil = $stmt->get_result();
                        
                        if ($hasil->num_rows > 0) {
                            $data = $hasil->fetch_assoc();
                            
                            // Verifikasi password (gunakan password_verify untuk bcrypt)
                            // Atau jika masih pakai MD5, minimal gunakan prepared statement
                            if (md5($tpass) === $data['password']) {
                                $_SESSION['isLogin'] = true;
                                $_SESSION['level'] = $data['level'];
                                $_SESSION['user'] = $data['username'];
                                $_SESSION['user_id'] = $data['id']; // Tambahkan ID user jika ada
                                
                                // Redirect berdasarkan level
                                switch ($data['level']) {
                                    case 'admin':
                                        header("Location: admin/");
                                        exit();
                                    case 'dosen':
                                        header("Location: dosen/");
                                        exit();
                                    case 'mhs':
                                        header("Location: mahasiswa/");
                                        exit();
                                    default:
                                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                Level user tidak valid!
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                              </div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        Username atau password salah!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    Username atau password salah!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                        }
                        $stmt->close();
                    }
                }
                ?>

                <form action="" method="post">
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginEmail" type="text" class="form-control" placeholder="Username" name="tuser" required autocomplete="username" />
                            <label for="loginEmail">Username</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" type="password" class="form-control" placeholder="Password" name="tpass" required autocomplete="current-password" />
                            <label for="loginPassword">Password</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8 d-inline-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember" />
                                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Login" name="btnLogin" />
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <br><hr>

                <center>
                    <p class="mb-1">
                        <a href="forgot-password.php">I forgot my password</a>
                    </p>
                </center>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)-->
    
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="assets/js/adminlte.js"></script> <!-- Perbaiki path -->
    <!--end::Required Plugin(AdminLTE)-->
    
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            const isMobile = window.innerWidth <= 992;

            if (sidebarWrapper && window.OverlayScrollbars && !isMobile) {
                OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
</body>
</html>