<?php
/**
 * Created by PhpStorm.
 * User: lu
 * Date: 2017/7/29
 * Time: 14:21
 */

    require_once('../connect.php');
    // 把传递过来的信息入库，入库之前对信息进行校验
    if (isset($_POST['title']) && empty($_POST['title'])) {
        echo "<script>alert('标题不能为空');window.location.href='article.add.html'</script>";
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $dateline = time();
    $insertSql = "insert into article(title, author, description, content, dateline) values('$title','$author', '$description', '$content', '$dateline')";
     if (mysqli_query($con, $insertSql)){
         echo "<script>alert('文章发布成功');window.location.href='article.add.html';</script>";
    } else {
         echo "<script>alert('文章发布失败');window.location.href='article.add.html';</script>";
     }