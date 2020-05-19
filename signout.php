<?php
session_start();
$out=session_destroy();
if($out)
{
    header('Location: ./index.html');
}
?>