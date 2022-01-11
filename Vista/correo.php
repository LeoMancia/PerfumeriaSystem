<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/estilosCorreo.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
</head>
<body>

    <form action="Send.php" method="POST">
        <div class="form">
            <h1>Contáctanos</h1>
               
            <div class="grupo">
                <input type="text" name="nombre" id="" required><span class="barra"></span>
                <label>Nombres</label>
            </div>
            <div class="grupo">
                <input type="text" name="apellido" id="" required><span class="barra"></span>
                <label>Apellidos</label>
            </div>
            <div class="grupo">
                <input type="email" name="email" id="" required><span class="barra"></span>
                <label>Email</label>
            </div>           
            <div class="grupo">
                <input type="texto" name="asunto" id="" required><span class="barra"></span>
                <label>Asunto</label>
            </div>
            <div class="grupo">
                <textarea name="mensaje" id="" rows="3" required></textarea><span class="barra"></span>
                <label>Mensaje</label>
            </div>
           <div class="container">
               <div class="row">
                   <div class="col-sm-6">
                    <button type="submit">Enviar</button>
                   </div>
                   <div class="col-sm-6">
                  
                   </div>
               </div>
           </div>
           
        </div>
    </form>
</body>
</html>