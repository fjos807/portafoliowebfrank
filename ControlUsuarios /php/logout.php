<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: http://localhost:3000/ControlUsuarios%20/index.html');
?>