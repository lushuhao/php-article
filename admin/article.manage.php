<?php
/**
 * Created by PhpStorm.
 * User: lu
 * Date: 2017/7/29
 * Time: 22:52
 */

require_once('../connect.php');
$selectSql = 'select * from article where 1';
$query = mysqli_query($con, $selectSql);
if ($query&&mysqli_num_rows($query)) {
    while ($row = mysqli_fetch_assoc($query)) {
        $data .= "<section class=\"list-item\">
                <span class=\"list-item_cell\">$row[id]</span>
                <span class=\"list-item_cell\">$row[title]</span>
                <span class=\"list-item_cell\"><a href='article.del.handle.php?id=$row[id]'>删除</a>&nbsp;<a href='article.modify.php?id=$row[id]'>修改</a></span>
            </section>";  //拼一个html
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章管理列表</title>
    <link rel="stylesheet" href="reset.css"/>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        .header {
            padding: 20px;
            border-bottom: 1px solid #dcdcdc;
        }

        .header .title {
            font-size: 20px;
            font-weight: 400;
        }

        .main {
            flex: 1;
            display: flex;
        }

        .nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
            width: 150px;
        }

        .nav a {
            padding-bottom: 30px;
            color: #20c1c0;
            white-space: nowrap;
        }

        .article {
            box-sizing: border-box;
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 100%;
            border-left: 1px solid #dcdcdc;
        }

        .article-title {
            padding-bottom: 20px;
            text-align: center;
            font-size: 18px;
        }

        .article-list {
            border: 1px solid #666;
        }

        .list-item {
            display: flex;
            align-items: center;
            height: 40px;
        }

        .list-item_cell {
            height: 40px;
            line-height: 40px;
            border-right: 1px solid #999;
            border-bottom: 1px solid #999;
            text-align: center;
        }

        .list-item_cell:first-child {
            width: 50px;
        }

        .list-item_cell:last-child {
            width: 100px;
            border-right: none;
        }

        .list-item_cell:last-child a {
            color: #417EF3;
        }

        .list-item_cell:nth-child(2) {
            flex: 1;
        }
    </style>
</head>
<body>
<header class="header">
    <h1 class="title">后台管理系统</h1>
</header>
<section class="main">
    <nav class="nav">
        <a href="article.add.html">发布文章</a>
        <a href="article.manage.php">管理文章</a>
    </nav>
    <section class="article">
        <header class="article-title">文章管理列表</header>
        <section class="article-list">
            <section class="list-item">
                <span class="list-item_cell">编号</span>
                <span class="list-item_cell">标题</span>
                <span class="list-item_cell">操作</span>
            </section>
            <?php
            echo $data;
            ?>
        </section>
    </section>
</section>
</body>
</html>