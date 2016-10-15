<?php
session_start();
session_destroy();
echo '<script type="text/javascript">';
echo 'top.location.href = "admin/login.html"';
echo '</script>';