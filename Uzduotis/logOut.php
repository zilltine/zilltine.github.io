<?php
session_start();
session_destroy();
Header('Location: register.php');
?>