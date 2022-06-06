<?php
include "funciones.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen IAW</title>
  <link href="iaw.css" rel="stylesheet" type="text/css">
</head>

<body style="text-align:center">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <p>Usuario:<br>
            <input type="text" name="user"/>
        </p>
        <p>Contraseña:<br>
            <input type="password" name="pwd"/>
        </p>
        <p>
	        <input type="submit" value="Login" name="log"/>
        </p>
    </form>
    <?php
        if(!empty($_POST['user']) && ($_POST['pwd'])){
            if(isset($_POST['log'])){
                login($conn,$_POST['user'],$_POST['pwd']);
            };
        }else{
            echo "ERROR: RELLENE AMBOS CAMPOS";
        };
        
  ?>
</body>
</html>