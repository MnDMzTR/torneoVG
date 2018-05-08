<?php
require_once "conexion_bd.php";

$sql1 = 'SELECT * FROM institucioneducativa';
$result1 = $conn -> query($sql1);
$instituciones = $result1 -> fetchAll();

$sql2 = 'SELECT * FROM personaje';
$result2 = $conn -> query($sql2);
$personajes = $result2 -> fetchAll();

$sql1 = 'SELECT * FROM carrera';
$result1 = $conn -> query($sql1);
$carreras = $result1 -> fetchAll();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/botones.css" rel="stylesheet" type="text/css" media="all">
    <link href="../images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" >

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <script src="../js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap-select.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/msdropdown/dd.css" />


</head>

<body id="top">
<!-- ################################################################################################ -->
<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="fl_left">
            <ul class="nospace inline pushright">
                <li><i class="fa fa-phone"></i> (386) 106 4302</li>
                <li><i class="fa fa-envelope-o"></i> luisgarcia@alumnos.udg.mx</li>
            </ul>
        </div>
        <div class="fl_right">
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="http://www.facebook.com/LuizGarcia.CA"><i class="fa fa-facebook"></i></a></li>
                <li><a class="faicon-twitter" href="https://twitter.com/RayoMonster"><i class="fa fa-twitter"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="../index.php">Torneo de videojuegos</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="login.php">Iniciar Sesión</a>
                </li>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
    </header>
</div>
<div class="wrapper row3 bgded overlay2 fondoformulario">
    <main class="hoc container clear">
        <div id="comments">
            <form method="post" action="process/add_user.php" id="form_user" onsubmit="return validateForm();">
                <h2 class="healset">Información del concursante</h2>
                <div class="one_third first">
                    <label for = "nombre"><b>Nombre(s)</b><span>*</span></label>
                    <input type="text" name="nombre" id="nombre" size="100" placeholder="Nombre(s) del concursante" maxlength="30" ><br>
                </div>
                <div class="one_third">
                    <label for = "apaterno"><b>Apellido Paterno</b><span>*</span></label>
                    <input type="text" name="apaterno" id="apaterno" size="200" placeholder="Apellido Paterno del concursante" maxlength="25" ><br>
                </div>
                <div class="one_third">
                    <label for = "amaterno"><b>Apellido Materno</b><span>*</span></label>
                    <input type="text" name="amaterno" id="amaterno" size="200" placeholder="Apellido Materno del concursante" maxlength="25" ><br>
                </div>
                <div class="one_third first">
                    <label for="combo_instituto"><b>Institución Educativa</b><span>*</span></label>
                    <select class="slcb" name="combo_instituto" id="combo_instituto" onChange="javascript:pedirDatos();">
                        <option value="00" >═══ Selecciona tu institución ═══</option>
                        <?php
                        foreach ($instituciones as $institucion){
                            echo '<option value="'.$institucion['id_institucion'].'">'.utf8_encode($institucion['nombre']).'</option>';
                        } ?>
                    </select>
                </div>
                <div class="one_third">
                    <label for="combo_carrera"><b>Carrera / Estudios</b><span>*</span></label>
                    <select class="slcb" name="combo_carrera" id="combo_carrera">
                        <option value="0">═══ Seleccione una institución ═══</option>
                        <?php foreach ($carreras as $carrera){
                        echo '<option value="'.$carrera['idCarrera'].'">'.utf8_encode($carrera['nombre_carrera']).'</option>';
                        } ?>
                    </select>
                </div>
                <div class="one_third">
                    <label for="txtpersonaje"><b>Personaje</b><span>*</span></label>
                    <select name="combo_personaje" id="combo_personaje">
                        <option value="0" >══════ Elige tu personaje ══════</option>
                        <?php
                        foreach ($personajes as $personaje){
                            echo '<option value="'.$personaje['idPersonaje'].'">'.utf8_encode($personaje['nombre']).'</option>';
                        } ?>
                    </select>
                </div>
                <h2 class="healset">Información de la cuenta</h2>
                <div class="one_third first form-group">
                    <label for="nickname"><b>Nickname / Username</b><span>*</span></label>
                    <input class="" id="nickname" name="nickname" type="text" placeholder="Nombre de usuario">
                </div>
                <div class="one_third">
                    <label for="password"><b>Contraseña</b><span>*</span></label>
                    <input class="" id="password" name="password" type="password" placeholder="Contraseña" >
                </div>
                <div class="one_third">
                    <label for="email"><b>Email</b><span>*</span></label>
                    <input class="" id="email" name="email" type="email" placeholder="Correo electronico" >
                </div>
                <div>
                    <div class="one_half center first" >
                        <input type="submit" name="submit" value="Registrarse">
                    </div>
                    <div class="one_half center">
                        <input type="reset" value="Limpiar Campos">
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<div class="wrapper row4">
    <footer id="footer" class="hoc topspace-0 clear">
        <!-- ################################################################################################ -->
        <br>
        <!-- ################################################################################################ -->
        <div class="group">
            <div class="one_half first">
                <h6 class="title">Contacto</h6>
                <address class="btmspace-15">
                    Luis Ángel García Castro<br>
                    Carretera Guadalajara - Ameca Km 45.5<br>
                    Ameca, Jalisco, México<br>
                    C.P. 46600
                </address>
                <ul class="nospace">
                    <li class="btmspace-10"><span class="fa fa-phone"></span> (386) 106 4302</li>
                    <li><span class="fa fa-envelope-o"></span> luisgarcia@alumnos.udg.mx</li>
                </ul>
            </div>
            <div class="one_half">
                <h6 class="title">Comunicate</h6>
                <p>Guadalajara[Matriz] (33) 3105 7071</p>
                <p>México D.F.  (55) 3105 7071</p>
                <p>Arabia Saudita.  +966 (5) 105 7071</p>
                <p>Ahualulco de Mdo.  (386) 105 7071</p>
            </div>
        </div>
        <!-- ################################################################################################ -->
    </footer>
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="../../index.php">AKBARIA STORE متجر أكباريا</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/validacionCampos.js" type="text/javascript"></script>
</body>
</html>