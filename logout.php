<?php 

session_start();

session_destroy();

session_abort();

Header('Location: /');
