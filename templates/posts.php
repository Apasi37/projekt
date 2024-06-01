<?php
    include_once('partials/header.php');
    require_once('../_inc/classes/Posts.php');
?>

    <div class="content">
        <div class="contentImages">
            <?php
                $posts_class = new Posts();
                $posts = $posts_class->selectTable("posts");

                for ($i=0;$i<count($posts);$i++){
                    echo '<div><a href="image.php?id='.$posts[$i]["id"].'">';
                    echo '<img src="../assets/img/'.$posts[$i]["image"].'" alt="image" class="imageSmall">';
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