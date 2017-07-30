<?php
/**
 * Created by PhpStorm.
 * User: lu
 * Date: 2017/7/29
 * Time: 14:21
 */

    require_once('../connect.php');
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $dateline = time();
    $updateSql = "update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline where id=$id";
     if (mysqli_query($con, $updateSql)){
         echo "<script>alert('文章修改成功');window.location.href='article.manage.php';</script>";
    } else {
         echo "<script>alert('文章修改失败');window.location.href='article.manage.php';</script>";
     }