<?php

session_start();

if(isset($_SESSION['login'])) echo 'login';
else echo 'out';
