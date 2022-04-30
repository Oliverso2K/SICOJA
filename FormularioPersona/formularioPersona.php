<?php
    $conexion = pg_connect("host=localhost dbname=SICOJA user=postgres password=password");

	$sql = "SELECT * FROM alumnos";
	$consulta = pg_query($conexion,$sql);

    // Creo que la consulta2 no es necesaria para este formulario
    $sql = "SELECT * FROM municipios";
    $consulta2 = pg_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/d2400a49aa.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularioStyles.css">
    <title>Formulario Vivienda</title>
</head>

<body>

    <header>
        <div class="logo">
            <img src="Recursos/logo_blanco.png" alt="Logo SICOJA en color blanco">
            <h2 class="nombre-sicoja"> SISTEMA DE CONSULTA DE INGRESOS Y GASTOS EN LOS HOGARES DE JALISCO </h2>
        </div>
        <ul class="menu">
            <li><a href="" class="">Inicio</a></li>
            <li><a href="" class="">Consulta Individual</a>
                <ul>
                    <li><a href="" class="">Ingresos</a>
                        <ul>
                            <li><a href="" class="">Totales</a></li>
                            <li><a href="" class="">Por transacción</a></li>
                        </ul>
                    </li>
                    <li><a href="" class="">Gastos</a>
                        <ul>
                            <li><a href="" class="">Totales</a></li>
                            <li><a href="" class="">Por transacción</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="" class="">Consulta por Hogar</a>
                <ul>
                    <li><a href="" class="">Ingresos</a></li> 
                    <li><a href="" class="">Gastos</a></li> 
                </ul>
            </li>
            <li><a href="" class="">Negocios</a></li>
            <li><a href="" class="">Soy censador</a></li>
        </ul>
    </header>

    <div class="titulo-ventana">
        <h5> Soy censador > Censar > Individuo</h1>
            <h2> CENSAR INVIDIVUO </h2>
    </div>

    <div class="contenedor">
        <section class="contFormulario">
            <h2>Agregar Individuo </h2>
            <form action="insertar.php" method="POST">

                <input type="text" name="nombres" placeholder="Nombre(s)" class="input" required>
                <input type="text" name="apellidos" placeholder="Apellido(s)" class="input" required>
                <input type="text" name="curp" placeholder="CURP" class="input" required>
                <text class="inputTitle">Fecha de nacimiento</text>
                <input type="date" name="fecha_nacimiento" class="input" required>
                
                <text>Sexo</text>
                <div class="selection"> 
                    <input type="radio" name="genero" value="femenino">Femenino</input>
                    <input type="radio" name="genero" value="masculino">Masculino</input>
                    <input type="radio" name="genero" value="otro">Otro</input>
                </div>

                <text>Estado Civil</text>
                <select name="estado_civil" class="input" requeried>
                    <option value="soltero">Soltero</option>
                    <option value="casado">Casado</option>
                    <option value="unión libre">Unión Libre</option>
                    <option value="viudo">Viudo</option>

                </select>
                <input type="number" name="id_vivienda" placeholder="ID de la vivienda" class="input" required>


                <input type="submit" value="Registrar" class="botonRegistrar">
           
            </form>
        </section>

        <section class="tabla">
            <h2>Registros de Individuos </h2>

            <div class="buscar">
                <input type="text" placeholder="Buscar por ID del individuo, nombre o CURP" requeried>
                <div class="btnBuscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>

            <section class="contTabla">
                <table>
                    <!-- Para el encabezado de la tabla -->
                    <thead class="encabezados">
                        <tr>
                            <th>ID</th>
                            <th>CURP</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Estado civil</th>
                            <th>Género</th>
                            <th>Edad</th>
                            <th>ID vivienda</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <!-- Contenido de las filas -->
                    <tbody>
                            <!-- <?php
                                while ($fila = pg_fetch_array($consulta)){
                            ?>
                        <tr>
                            <th><?php echo $fila['id']?></th>
                            <th><?php echo $fila['dirección']?></th>
                            <th><?php echo $fila['colonia']?></th>
                            <?php $id_municipio = $fila['id_municipio'];
                                $sql = "SELECT * FROM municipios WHERE id='$id_municipio'";
                                $consulta_municipio = pg_query($conexion,$sql);
                                $municipio = pg_fetch_array($consulta_municipio);
                            ?>
                            <th> <?php echo $municipio['nombre']?></th>
                            <th></th>
                            <th> <a class="icons" href="#" id='btn-abrir-popup'><i class="fa-solid fa-pencil"></i></a></th>
                            <!-- <th> <a class="icons" href="actualizar.php?id=<?php echo $fila['id'] ?>" id="btn-abrir-popup"><i class="fa-solid fa-pencil"></i></a></th> -->
                            <th> <a class="icons" href=""><i class="fa-solid fa-eye"></i></a></th>
                            <th> <a class="icons" href="eliminar.php?id=<?php echo $fila['id'] ?>"><i class="fa-solid fa-trash"></i></a></th>
                        </tr>

                        <?php
                            }
                        ?> -->
                    </tbody>
                </table>
            </section>
        </section>
    </div>

    <footer>
        <div class="contFooter">
            <div class="infoFooter">
                <p>Proyecto Final - Seminario de Solución de Problemas de Bases de Datos</p>
            </div>

            <div class="copyright">
                <p>SICOJA © 2022</p>
            </div>
        </div>
    </footer>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"> </i> </a>
            <h3>Editar registro</h3>
            
            <form action="">
                <div class="contInputs">
                    <input type="text" placeholder="Dirección">
                    <input type="text" placeholder="Colonia">
                    <select name="id_municipio" class="input">
                        <!-- <?php
                            while ($filaMunicipio = pg_fetch_array($consulta2)){
                        ?>
                        <option value="<?php echo $filaMunicipio['id']?>"> <?php echo $filaMunicipio['nombre']?> </option>
                        <?php
                            }
                        ?> -->
                    </select>
                </div>
                <input type="submit" class="btn-submit" value="Actualizar">
            </form>
        </div>
    </div>

    <script src="popup.js"></script>

</body>

</html>