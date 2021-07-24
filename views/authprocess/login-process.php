<script src="../../assets/jquery.min.js"></script>
<script src="../../assets/sweetalert2.all.min.js"></script>
<?php 
session_start();
include_once '../../config/koneksi.php';
include_once '../../models/m_database.php';

$connection = new Databases($host,$user,$password,$db);

    $email = $_POST['email'];
    $password = $_POST['password'];
    $ambil = $connection->connects->query("SELECT * FROM users WHERE email='$email'");
    $ygcocok = $ambil->num_rows;

    if($ygcocok === 1){
        $row = $ambil->fetch_assoc();
        $data = [
            'id_user' => $row['id_user'],
            'email' => $row['email'],
            'username' => $row['name'],
            'level' => $row['level'],
            'password' => $row['password']
        ];

        if($data['email'] <> ''){
            $_SESSION['email'] = $data['email'];
            $_SESSION['user'] = $data['username'];
        }
        if($data['level'] == 'admin'){
            $_SESSION['admin'] = true;
        }
        if($data['level'] == 'super admin'){
            $_SESSION['s_admin'] = true;
        }

        if(password_verify($password, $data['password'])){
            $_SESSION['adm'] = $data;

            // echo "<script>alert('Login Sukses');</script>";
            echo "<div class='alert alert-info'>Login Success !!</div>";
            // echo "<meta http-equiv='refresh' content='1;url=../../?hal=dashboard'>";
            echo "<script>
            setTimeout(function(){
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Login Success !!',
                    showConfirmButton: false,
                    timer: 5000
                });
            },1000/2);
            setTimeout(function(){
                document.location.href='../../?hal=dashboard';
            },5000/2);
            </script>";
        }else{
            // echo "<script>alert('Password Salah');</script>";
            echo "<div class='alert alert-danger'>Login Failed, Wrong Password !!</div>";
            // echo "<meta http-equiv='refresh' content='1;url=../../?hal=dashboard'>";
            echo "<script>
            setTimeout(function(){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Login Failed !!',
                    showConfirmButton: false,
                    timer: 5000
                });
            },1000/2);
            setTimeout(function(){
                document.location.href='../../?hal=dashboard';
            },5000/2);
            </script>";
        }
    }else{
        // echo "<script>alert('Password Dan Email Salah');</script>";
        echo "<div class='alert alert-danger'>Login Failed, Wrong Password And Email</div>";
        // echo "<meta http-equiv='refresh' content='1;url=../../?hal=dashboard'>";
        echo "<script>
            setTimeout(function(){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Login Failed !!',
                    showConfirmButton: false,
                    timer: 5000
                });
            },1000/2);
            setTimeout(function(){
                document.location.href='../../?hal=dashboard';
            },5000/2);
            </script>";

    }

