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
        <title>Register - SB Admin</title>
        <link href="../../assets/sb-admin-bootstrap5/css/styles.css" rel="stylesheet" />
        <script src="../../assets/fontawesome/css/all.min.css" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" class="form-input-register" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required/>
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name" required/>
                                                        <label for="name">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select name="level" id="level" class="form-control" required>
                                                            <option>...</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="super admin">Super Admin</option>
                                                        </select>
                                                        <label for="level">Levels</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" required/>
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" required/>
                                                        <label for="password2">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary" name="register" type="submit" value="Sign Up" /></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="p_login.php">Have an account? Go to login</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
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
            $('.form-input-register').on('submit', function(e){
                e.preventDefault();
                
                $.ajax({
                    type : 'POST',
                    data : new FormData(this),
                    url : '../authprocess/register-process.php',
                    contentType : false,
                    cache : false,
                    processData : false,
                    success: function(msg)
                    {
                        $('.card-body').html(msg);
                    }                    
                });
            });
        </script>
    </body>
</html>
