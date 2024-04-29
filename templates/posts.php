<?php
    include_once('partials/header.php');
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Page.php');
    require_once('../_inc/classes/Posts.php');
    require_once('../_inc/functions.php');
?>

    <div class="content">
        <div class="contentImages">
            <?php
                $posts_class = new Posts();
                $posts = $posts_class->select();

                for ($i=0;$i<count($posts);$i++){
                    echo '<div><a>';
                    echo '<img src="'.$posts[$i]->image.'" alt="image" class="imageSmall">';
                    echo '</a></div>';
                }
            ?>
        </div>

        <div class="pagination">
                <a href="" class="aButton"><</a>
                <a href="" class="aButton">1</a>
                <a href="" class="aButton">2</a>
                <a href="" class="aButton">3</a>
                <a href="" class="aButton">4</a>
                <a href="" class="aButton">5</a>
                <a href="" class="aButton">></a>
            </div>
    </div>

<?php
    include_once('partials/footer.php');
?>


</body>
</html>