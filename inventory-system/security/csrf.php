<?php
if(!isset($_SESSION)) session_start();
if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32));
function csrf_token(){ return $_SESSION['csrf']; }
function verify_csrf_token($t){ if(!hash_equals($_SESSION['csrf'],$t)) die("CSRF Error"); }
?>