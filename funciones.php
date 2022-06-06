<?php
	$servername = "localhost";
	$username = "admin";
	$password = "Monitor?2";
	$db="proyecto_prueba";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	};
	function login($conn,$user,$password){
		$sql = "SELECT password FROM usuarios WHERE user='$user'";
		$result = $conn->query($sql);
			while($row = mysqli_fetch_assoc($result)) {
    		if($row['password']=$password){
				header("Location: tickets.php");
			}else{
				echo "ERROR: CONTRASEÑA INCORRECTA";
			};
  		}
	};
	function crear($conn,$nombre,$descrip,$dep,$urg){
		$sql = "INSERT INTO ticket (nombre, descripcion, departamento, urgencia)
		VALUES ('$nombre', '$descrip', '$dep', '$urg')";

		if ($conn->query($sql) == TRUE) {
 			echo "Ticket creado correctamente";
		} else {
  			echo "ERROR: TICKET NO CREADO<br>" . $conn->error;
		}
	};
	function buscar($conn,$cod){
		$sql = "SELECT * FROM ticket WHERE cod=$cod";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
    		echo "-Codigo: " . $row["cod"]."<br> - Fecha: " . $row["fecha"]."<br> - Nombre: " . $row["nombre"]."<br> -Descripcion: " . $row["descripcion"]. "<br> -Departamento: ".$row["departamento"]."<br> -Urgencia: ".$row["urgencia"];
  		}
		} else {
  			echo "ESTE TICKET NO EXISTE";
		}
    };
	function cerrar($conn,$cod){
		$sql = "SELECT * FROM ticket WHERE cod=$cod";
		$sqldel="DELETE FROM ticket WHERE cod=$cod";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
			$cod1=$row["cod"];
			$nombre=$row["nombre"];
			$desc=$row["descripcion"];
			$dep=$row["departamento"];
			$urg=$row["urgencia"];
			$fecha=$row["fecha"];
			$sql2 = "INSERT INTO ticket_historico (cod, nombre, descripcion, departamento, urgencia,fecha_creado)
			VALUES ('$cod1','$nombre','$desc','$dep','$urg','$fecha')";
			if ($conn->query($sql2) == TRUE) {
 				echo "Ticket cerrado correctamente";
			} else {
  				echo "ERROR: NO SE PUDO CERRAR EL TICKET<br>" . $conn->error;
			}
		  }
		}
		$conn->query($sqldel);
	};
?>