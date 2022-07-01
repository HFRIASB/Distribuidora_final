<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">INICIAR SESI&Oacute;N</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/logotipo2.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Iniciar sesion</h3>
			      		</div>
								
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuario</label>
			      			<input type="text" class="form-control" placeholder="Escriba el usuario" id="usuario" autocomplete="new-password">
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contrase&ntilde;a</label>
		              <input type="password" class="form-control" placeholder="Escriba la Contrase&ntilde;a" id="password">
		            </div> <br>
		            <div class="form-group">
		            	<button class="form-control btn btn-primary rounded submit px-3" onclick="Verificar_Usuario()">Iniciar Sesion</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
							</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#"onclick="AbrirModalRestablecer()">Olvidaste la contrase&ntilde;a?</a?>
									</div>
		            </div>
		          </form>
		         
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>


	<div class="modal fade" id="modal_restablecer_contra" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
          
            <h4 class="modal-title"><b>Restablecer Contrase&ntilde;a</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for=""><b>Ingrese el email registrado del usuario para enviarle su contrase&ntilde;a restablecida</b></label>
                    <input type="text" class="form-control" id="txt_email" 
                    placeholder="Ingrese Email" ><br>
                </div>           
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Restablecer_contra()">Enviar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>



	<script src="sweetalert2/sweetalert2.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	<script src="../js/console_usuario.js"></script>

	</body>
	<script>
	</script>
</html>

