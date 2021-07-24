<script src='../../assets/sweetalert2.all.min.js'></script>";
<?php
// session_start(); session_start();nya sudah ada di proseslogin.php
if (!isset($_SESSION['adm'])) 
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
				document.location.href='p_login.php';
			},5000/2);
	</script>";
	exit();
	//header('location:login/login.php');
}

session_destroy();
echo "<script>
		setTimeout(function(){
		Swal.fire({
			position: 'top-center',
			icon: 'success',
			title: 'You Have Logged Out !!',
			showConfirmButton: false,
			timer: 5000
			});
		},1000/2);
		setTimeout(function(){
			document.location.href='../../?hal=dashboard';
		},5000/2);
</script>";

?>