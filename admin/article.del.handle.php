<?php
/**
 * Created by PhpStorm.
 * User: lu
 * Date: 2017/7/29
 * Time: 22:53
 */
    require_once ('../connect.php');
    $id = $_GET['id'];
    $deleteSql = "delete from article where id=$id";
if (mysqli_query($con, $deleteSql)){
    echo "<script>alert('文章删除成功');window.location.href='article.manage.php';</script>";
} else {
    echo "<script>alert('文章删除失败');window.location.href='article.manage.php';</script>";
}