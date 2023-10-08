<?php

/** @var $title string
 *  @var $totalPage int
 *  @var $page int
 * */
require_once ROOT_DIR . "public/components/NavBar.php";
require_once ROOT_DIR . "public/components/Pagination.php";
require_once ROOT_DIR . "public/components/SortFilter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/public/js/Search.js"></script>
    <script src="/public/js/SortFilter.js"></script>
    <link rel="stylesheet" href="/public/css/Global.css" type="text/css">
    <link rel="stylesheet" href="/public/css/NavBar.css" type="text/css">
    <link rel="stylesheet" href="/public/css/Pagination.css" type="text/css">

    <link rel="stylesheet" href="/public/css/AlbumCard.css" type="text/css">
    <link rel="stylesheet" href="/public/css/AlbumPage.css" type="text/css">
    <link rel="stylesheet" href="/public/css/SortFilter.css" type="text/css">

    <title>
        <?php
            if (isset($title))
            {
                echo $title;
            }
        ?>
    </title>
</head>
<body>
    <?php
        echo NavBar(currentPage: "Albums");
    ?>

    <?php
        echo DropDown();
    ?>

    <div class="album-container">
        {{content}}
    </div>

    <?php
        echo Pagination(totalPage: $totalPage, currentPage: $page);
    ?>
</body>
</html>
