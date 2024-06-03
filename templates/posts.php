<?php
    include_once('partials/header.php');
    require_once('../_inc/classes/Posts.php');
?>

    <div class="content">
        <div class="contentImages">
            <?php
                $posts_class = new Posts();
                $posts = $posts_class->selectPosts($_GET['page']);

                for ($i=0;$i<count($posts);$i++){
                    echo '<div><a href="image.php?id='.$posts[$i]["id"].'">';
                    echo '<img src="../assets/img/'.$posts[$i]["image"].'" alt="image" class="imageSmall">';
                    echo '</a></div>';
                }
            ?>
        </div>

        <div class="pagination">
            <?php
                $pages = $posts_class->getPages();
                for($i=1;$i<=$pages;$i++){
                    echo('<a href="posts.php?page='.$i.'" class="aButton">'.$i.'</a>');
                }
            ?>
        </div>
    </div>

<?php
    include_once('partials/footer.php');
?>