<script src="../../assets/jquery.min.js"></script>
<script src="../../assets/sweetalert2.all.min.js"></script>
<?php 
    include_once "../../config/koneksi.php";
    include_once "../../models/m_database.php";

        
    $connection = new Databases($host,$user,$password,$db);


    
        $email = strtolower(stripcslashes($_POST["email"]));
        $username = strtolower(stripcslashes($_POST["name"]));
        $password = mysqli_real_escape_string($connection->connects, $_POST["password"]);
        $password2 = mysqli_real_escape_string($connection->connects, $_POST["password2"]);
        $level = strtolower(stripcslashes($_POST['level']));
    
        // cek username sudah ada atau belum
        $res = mysqli_query($connection->connects, "SELECT email FROM users WHERE email = '$email'");
        if(mysqli_fetch_assoc($res)){
            echo "<script>alert('Username sudah terdaftar');document.location.href='../authentication/p_register.php';</script>";
            return false;//berhentikan fungsinya sampai disini
            
        }
        //cek konfirmasi password
        if($password !== $password2){
            echo "<script>alert('Password Tidak Cocok !');document.location.href='../authentication/p_register.php';</script>"; //password tidak sesuai
            return false;//berhentikan fungsinya sampai disini
        }
        
        //enkripsi/amankan password cara1
        $password = password_hash($password, PASSWORD_DEFAULT);
        //enskripsi/amankan password cara2
        //$password = md5($password);
        //var_dump($password); die;
        mysqli_query($connection->connects, "INSERT INTO users(email,name,level,password) VALUES('$email','$username','$level','$password')");
        echo "<script> 
        setTimeout(function(){
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Success Add Data !!',
                showConfirmButton: false,
                timer: 5000
            });
        },1000/2);
        setTimeout(function(){
            document.location.href='../authentication/p_login.php';
        },5000/2);
        </script>"; //password tidak sesuai
        return mysqli_affected_rows($connection->connects);
    
    ?>