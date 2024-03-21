<?php

if(isset($_SESSION['username'])){
    echo "<li class='nav-link text-danger'>".$_SESSION['username']."</li>";

    echo "<li><a class='btn btn-warning text-danger' href='/chieu5/account/logout'>Logout</a>";
    
}else{
    echo "<li><a class='nav-link text-danger' href='/chieu5/account/register'>Đăng ký</a>";
    echo "<li><a class='nav-link text-danger' href='/chieu5/account/login'>Đăng nhập</a>";
}
