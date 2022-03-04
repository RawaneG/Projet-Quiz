<?php
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    //inclusion des chemins absolus
    require_once dirname(dirname(__FILE__)).'/config/constantes.php';
    //inclusion du Validator
    require_once dirname(dirname(__FILE__))."/config/validator.php";
    //inclusion du convertisseur
    require_once dirname(dirname(__FILE__))."/config/orm.php";
    //inclusion des roles
    require_once dirname(dirname(__FILE__))."/config/role.php";
    //Chargement du router
    require_once dirname(dirname(__FILE__))."/config/router.php";