<script src='../../assets/sweetalert2.all.min.js'></script>";
<?php 
session_start();
if (isset($_SESSION['adm'])) 
{
	echo "<script>
        setTimeout(function(){
            Swal.fire({
				position: 'top-center',
				icon: 'warning',
				title: 'Access Denied !!',
				showConfirmButton: false,
				timer: 5000
				});
        },1000/2);
        setTimeout(function(){
            document.location.href='../../?hal=dashboard';
        },5000/2);
    </script>";  
	exit();
		  //header('location:login/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="../../assets/sb-admin-bootstrap5/css/styles.css" rel="stylesheet" />
        <script src="../../assets/fontawesome/css/all.min.css" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="form-input-login" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <div class="d-grid"><input type="submit" name="login" value="Sign In" class="btn btn-primary" /></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="p_register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Fiyannur 2021</div>
                            <div>
                                <!-- <a href="#">Privacy Policy</a> -->
                                <a href="https://www.instagram.com/_fynrizky/">@_fynrizky</a>
                                &middot;
                                <!-- <a href="#">Terms &amp; Conditions</a> -->
                                <a href="https://fynrkun.github.io/">Portofolio</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../../assets/jquery.min.js"></script>
        <script src="../../assets/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/sb-admin-bootstrap5/js/scripts.js"></script>
        <script>
            $('.form-input-login').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    data: new FormData(this),
                    url : '../authprocess/login-process.php',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg)
                    {  
                        $('.card-body').html(msg);
                    }

                });
            });
        </script>
    </body>
</html>
