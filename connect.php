<?php
    require_once('config.php');
    // 连库,选库
$con = mysqli_connect(HOST,USERNAME,PASSWORD, 'info');
    if (!$con) {
        echo mysqli_error($con);
    }
    // 字符集
    if (!mysqli_query($con, 'set names utf8')) {
        echo mysqli_error($con);
    }