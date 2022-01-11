<?php

        require '../js/SMTP.php';
        require '../js/PHPMailer.php';
        require '../js/OAuth.php';
        require '../js/Exception.php';


     //Correo que recibirá el mensaje
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $asunto = $_POST['asunto'];
     $email = $_POST['email'];

     $email_message = "Detalles del formulario de contacto:\n\n";
     $email_message .= "Nombre/s: " . $_POST['nombre'] . "\n";
     $email_message .= "Apellido/s: " . $_POST['apellido'] . "\n";
     $email_message .= "E-mail: " . $_POST['email'] . "\n\n";
     $email_message .= "Comentarios: " . $_POST['mensaje'] . "\n\n";
      
     $mail = new PHPMailer\PHPMailer\PHPMailer();
     $mail->isSMTP();
 
     $mail->SMTPDebug = 0;
     $mail->Host = 'smtp.gmail.com';
     $mail->Port = 587;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Username = 'messence101@gmail.com';
     $mail->Password = 'essence1234+';
     $mail->setFrom($email, $nombre);
     $mail->addAddress('messence101@gmail.com', 'Usuario de Magic Essence');
     $mail->Subject = $asunto;
     $mail->Body = nl2br($email_message);
     $mail->isHTML(true);
     
     if (!$mail->send()) {
         
        header('Location: ../vista/error.html');
     }
     else {
        echo "<script>alert('Correo Enviado Exitosamente')</script>";
        echo "<script> setTimeout(\"location.href = 'adm_catalogo.php'\", 1000)</script>";
     }
     
 
    
    
    




?>