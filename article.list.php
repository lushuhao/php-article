<?php
    require_once ('connect.php');
    $sql = 'select * from article order by dateline desc';
    $query = mysqli_query($con, $sql);
    if ($query&&mysqli_num_rows($query)){
        while($row = mysqli_fetch_assoc($query)){
           $data[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
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
            flex: 2;
            padding: 30px;
        }

        .article-list_item{
            padding-bottom: 30px;
        }

        .list-item_header{
            display: flex;
            flex: 1;
            padding-bottom: 3px;
            border-bottom: 5px solid #dcdcdc;
        }
        .list-item_title{
            padding-right: 30px;
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

        .list-item_footer{
            padding-bottom:1px;
            border-bottom: 3px solid #dcdcdc;
        }
        .list-item_footer a{
            font-size: 12px;
            color: #2A9B9A;
        }
        .article-aside{
            padding-top: 40px;
            flex: 1;
            min-width: 100px;
        }
        .article-aside_title{
            color: #20c1c0;
            font-size: 20px;
            border-bottom: 5px solid #dcdcdc;
        }
        .article-aside_form{
            flex: 1;
            display: flex;
            padding-top: 20px;
        }
        .article-aside_search{
            width: 80%;
            margin-right: 10px;
            border: 1px solid #dcdcdc;
        }
        .article-aside_submit{
            width: 20%;
            padding: 0;
            margin-right: 5px;
            white-space: nowrap;
        }
        .article-aside_submit:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
<header class="header">
    <h1 class="title">php与mysql探秘</h1>
    <nav class="nav">
        <a href="article.list.php">文章</a>
        <a href="article.about.html">关于我们</a>
        <a href="article.concat.html">联系我们</a>
    </nav>
</header>
<section class="main">
    <section class="article-list">
        <?php
        if (empty($data)){
            echo '当前没有文章';
        } else{
            foreach ($data as $value) {
                ?>
                <section class="article-list_item">
                    <header class="list-item_header">
                        <h1 class="list-item_title"><?php echo $value[title]?></h1>
                        <span class="list-item_author">作者：<?php echo $value[author]?></span>
                    </header>
                    <section class="list-item_section">
                        <p class="list-item_content"><?php echo $value[description]?></p>
                    </section>
                    <footer class="list-item_footer">
                        <a href="article.show.php?id=<?php echo $value[id]?>">查看详情 >></a>
                    </footer>
                </section>
                <?php
            }
        }
        ?>
    </section>
    <aside class="article-aside">
        <h1 class="article-aside_title"">search</h1>
        <form class="article-aside_form" action="article.search.php" method="get">
            <input class="article-aside_search" name="search" />
            <button class="article-aside_submit" value="Submit">搜索</button>
        </form>
    </aside>
</section>
</body>
</html>