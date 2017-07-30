<?php
    require_once ('connect.php');
    $id = intval($_GET['id']);
    $sql = "select * from article where id=$id";
    $query = mysqli_query($con, $sql);
    if ($query&&mysqli_num_rows($query)){
        $row = mysqli_fetch_assoc($query);
    }else{
        echo '当前文章不存在';
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <link rel="stylesheet" href="admin/reset.css"/>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-width: 720px;
        }

        .header {
            display: flex;
            padding: 0 30px;
            justify-content: space-between;
            height: 100px;
            border-bottom: 1px solid #dcdcdc;
            color: #fff;
            background: #2A9B9A;
            background: -webkit-linear-gradient(left, #2A9B9A, #95D1D1);
            background: -moz-linear-gradient(left, #2A9B9A, #95D1D1);
            background: -o-linear-gradient(left, #2A9B9A, #95D1D1);
        }

        .header .title {
            align-self: center;
            font-size: 24px;
            font-weight: 400;
        }

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .nav {
            align-self: flex-end;
            height: 40px;
            line-height: 40px;
            display: flex;
        }

        .nav a {
            padding: 5px;
            background: -webkit-linear-gradient(left, #10B4FF, #0C40E8); /* 背景色渐变 */
            -webkit-background-clip: text; /* 规定背景的划分区域 */
            -webkit-text-fill-color: transparent; /* 防止字体颜色覆盖 */
            white-space: nowrap;
        }

        .article-list{
            padding-top: 30px;
          width: 980px;
        }

        .list-item_header{
            display: flex;
            justify-content: center;
            flex: 1;
            padding-bottom: 3px;
            border-bottom: 5px solid #dcdcdc;
        }
        .list-item_title{
            padding: 0 30px 0 80px;
            font-size: 30px;
            color: #20c1c0;
        }
        .list-item_author{
            align-self: flex-end;
            font-size: 14px;
            color: #999;
            white-space: nowrap;
        }
        .list-item_section p{
            color: #333;
        }

        .list-item_content{
            padding: 20px 0;
            text-indent: 2em;
        }
    </style>
</head>
<body>
<header class="header">
    <h1 class="title">php与mysql探秘</h1>
    <nav class="nav">
        <a href="article.add.html">文章</a>
        <a href="article.manage.php">关于我们</a>
        <a href="article.manage.php">联系我们</a>
    </nav>
</header>
<section class="main">
    <section class="article-list">

                    <header class="list-item_header">
                        <h1 class="list-item_title"><?php echo $row[title] ?></h1>
                        <span class="list-item_author">作者：<?php echo $row[author] ?></span>
                    </header>
                    <section class="list-item_section">
                        <article class="list-item_content"><?php echo $row[content] ?></article>
                    </section>
                </section>
    </section>
</body>
</html>