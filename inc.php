
<?php
include("conexion/conexion.php");
$conection=conection();

$alert='';
session_start();
if(!empty($_SESSION['active']))
{
	header('location:menu.php');
}else{

     if(!empty($_POST))
    {
	      if(empty($_POST['user']) || empty($_POST['pass']))
       {
             $alert='Ingrese su usuario y su clave';
        }else{

     	   require_once"conexion/conexion.php";
     	   $user = $_POST['user'];
     	   $pass= $_POST['pass'];

     	    $query = mysqli_query($conection,"SELECT * FROM usuario where usuario='$user' and contraseña ='$pass'");
            $result= mysqli_num_rows($query);

            if($result>0)
        {
     	    $data=mysqli_fetch_array($query);

     	    
     	    $_SESSION['id']=$data ['idusuario']; 
     	    $_SESSION['nombre']=$data ['nombre'];

     	    $_SESSION['rol']=$data ['email'];
     	    $_SESSION['usuario']=$data ['usuario']; 
     	    $_SESSION['contraseña']=$data ['rol']; 
			header('location:menu.php');
     	        }else{
     		    $alert='Verifique Nuevamente';	
     		    session_destroy();
        }
     }	

   }
}
?>
<html>
<head>
<title>login</title>
<link rel = "stylesheet" href="styles/styles.css">
</head>
	<body>
		<section>
		<div class= "container">
		<div class= "content">
			<form action = "" method = "POST">

				<div class="login-box">
				<img class ="user" src = "imag/logoc.jpg" alt="logo">
				</div>
				<h2 class = "title">Asdell Store</h2>

				<div class = "input-div one">
				<div class="i">
				<i class="fa fa-user"></i>
				</div>

				<div class="div">
				<h5 size= "23"> Nombre de usuario </h5>
				<input class="input" name ="user" type="text" id="user">
				</div>
			</div>

			<div class = "input-div pass">
			<div class="i">
				<i class="fa fa-lock"></i>
			</div>
			<div class="div">
				<h5>Contraseña</h5>
				<input class="input" name="pass" type="password"  id="pass">
			</div>
		</div><br>

		<a href="#">Olvidaste tu contraseña?</a><br>
		
		<input class="boton-neon" type = "Submit" name="Submit" value="Iniciar"/>
		<div class="alerta"><?php echo isset($alert)? $alert:'';?></div>
	</form>
</div>

</div>

<script src="main/main.js"></script>
</section>
</body>

	</body>
	</html>
