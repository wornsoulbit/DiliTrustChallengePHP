<?php

namespace App\core;

//good to help me write DRY code
#[\Attribute]
class LoginFilter {

    function execute() {
        if (!isset($_SESSION['user_id'])) {
            header('location:' . BASE . '/Default/index');
        }
    }

}

?>