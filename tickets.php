<?php
    include "funciones.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen IAW</title>
  <link href="tickets.css" rel="stylesheet" type="text/css">
</head>

<body style="text-align:center">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>Creador de tickets
        <p>Nombre del ticket:<br>
            <input type="text" name="nombre_t"/>
        </p>
        <p>Descripcion del ticket:<br>
            <input type="text" name="descripcion_t"/>
        </p>
        <p>Departamento:
        <?php
		      $dep=array("d1"=>"d1","d2"=>"d2","d3"=>"d3","d4"=>"d4");
		        foreach ($dep as $tipo => $valor){
			      print "<input type='radio' name='depa' value=".$valor.">".$tipo."</input>";
		      }
		    ?>
        </p>
        <p>Urgencia:
        <?php
		      $urg=array("Poca"=>"Poca","Normal"=>"Normal","Mucha"=>"Mucha","Critico"=>"Critico");
		        foreach ($urg as $tipo => $valor){
			      print "<input type='radio' name='urg' value=".$valor.">".$tipo."</input>";
		      }
		    ?>
        </p>
        <p>
	        <input type="submit" value="Crear ticket" name="crear"/>
        </p>
        <?php
        if(isset($_POST['crear'])){
            crear($conn,$_POST['nombre_t'],$_POST['descripcion_t'],$_POST['depa'],$_POST['urg']);
        };
        ?>
        </fieldset>
        <fieldset>Buscador
        <p>Codigo del ticket:<br>
            <input type="number" name="search_t" min="1"/>
        </p>
        <p>
	        <input type="submit" value="Buscar ticket" name="search"/>
            <input type="submit" value="Cerrar ticket" name="close"/>
        </p>
        <input id="cerrar" type="submit" value="Cerrar sesion" name="logout"/>
        <?php
        if(isset($_POST['search'])){
            buscar($conn,$_POST['search_t']);
        };
        if(isset($_POST['close'])){
            cerrar($conn,$_POST['search_t']);
        };
        ?>
        </fieldset>
    </form>
    <?php
        if(isset($_POST['logout'])){
            header("Location: login_p.php");
        };
    ?>
</body>
</html>