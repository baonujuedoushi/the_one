<?php /* Smarty version Smarty-3.1.16, created on 2016-01-11 09:57:24
         compiled from "admin\loginout.php" */ ?>
<?php /*%%SmartyHeaderCode:1988856930c04d59f80-28776508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7477849e7d6c295d0af30447033eec305ac6bdd3' => 
    array (
      0 => 'admin\\loginout.php',
      1 => 1451278874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988856930c04d59f80-28776508',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_56930c04dd40a9_03935712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56930c04dd40a9_03935712')) {function content_56930c04dd40a9_03935712($_smarty_tpl) {?><<?php ?>?php
session_start();
session_destroy();
echo '<script type="text/javascript">';
echo 'top.location.href = "admin/login.html"';
echo '</script>';<?php }} ?>
