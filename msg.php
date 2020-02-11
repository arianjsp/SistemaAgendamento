<?php
if(isset($_SESSION['msg']))
{
    //echo "<BR><BR><BR><BR>";
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>