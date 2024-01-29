<?php

    require_once (__DIR__.'/../mdb/mdbPersona.php');

    $Personas = verPersonas();
   
   echo json_encode($Personas);  
