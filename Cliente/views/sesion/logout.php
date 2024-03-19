
<?php
session_destroy();
setcookie(session_name(), '', time() - 3600, '/');

if(headers_sent()){
    echo "<script> window.location.href='http://localhost/integrador_sexto/Cliente/views/sesion/login.php'; </script>";
}else{
    header("Location: http://localhost/integrador_sexto/Cliente/views/sesion/login.php");
}
