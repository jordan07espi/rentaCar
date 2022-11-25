<?php

    #se recogen los datos que llegan desde el formulario
    $user_for_login = array_filter($_POST,function($current){
        return $current!=='Login';
    },ARRAY_FILTER_USE_BOTH);

    var_dump($user_for_login);






?>

