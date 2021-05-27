<?php
    session_name("imobiliaria_pc");
    session_start();
    session_destroy();

    header('location:../login.php?msg=Você foi deslogado.');
?>