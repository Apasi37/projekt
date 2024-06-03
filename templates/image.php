<?php
    include_once('partials/header.php');

    $imgId = $_GET["id"];
    $posts_class = new Posts();
    $post = $posts_class->selectPost($imgId);
    if($post == false){
        header('location: posts.php?page=1');
    }
    $username = $posts_class->selectUsername($post['userId']);
    $comments = $posts_class->selectComments($imgId);
    $commentCount = $posts_class->getCommentCount($imgId);
?>

<div class="imageContent">
    <div class="imageView">
            <div class="slide">
                <?php
                    echo('<a href="image.php?id='.($imgId-1).'"><</a>');
                    echo('
                        <div>
                            <img src="../assets/img/'.$post['image'].'" alt="" class="image">
                        </div>
                    ');
                    echo('<a href="image.php?id='.($imgId+1).'">></a>');
                ?>
            </div>
            <div id="imageInfo">

                <div id="imageArtist">
                    <?php
                        echo('<h1>'.$post['name'].'</h1>');
                    ?>
                    <div class="profile" >
                        <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                        <?php
                            echo('<div>'.$username->username.'</div>');
                        ?>
                    </div>
                </div>

                <div id="imageRatings">
                    
                </div>

                <div id="imageDesc">
                    <div id="desc">
                        <?php
                        if($post['description'] == null || $post['description'] == ""){
                            echo('No description');
                        }else{
                            echo($post['description']);
                        }
                        ?>
                    </div>
                </div>

                <div id="imageComments">
                    <div id="commentCount">
                        <?php
                            echo('Comments: '.$commentCount->count);
                        ?>
                    </div>
                    <?php
                        if(isset($_SESSION['username'])){
                            echo('
                                <form method="POST" id="commentWrite">
                                    <input type="text" name="comment" placeholder="Write a comment" class="searchBar" required>
                                    <input type="submit" name="addComment" value="Comment" class="button">
                                </form>
                            ');
                        }else{
                            echo('<div>You need to be logged in to wirte a comment</div>');
                        }

                        if(isset($_POST['addComment'])){
                            $posts_class->addComment($_POST['comment'],$_SESSION['userId'],$imgId);
                            header('location: image.php?id='.$imgId);
                        }
                    ?>
                    <div class="comments">
                        <?php
                            for($i=0;$i<count($comments);$i++){
                                $commentUsername = $posts_class->selectCommentUsername($comments[$i]['userId']);
                                echo('
                                    <div class="comment">

                                        <div class="commentProfile">
                                            <div class="profile" >
                                                <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                                                <div>'.$commentUsername->username.'</div>
                                            </div>
                                        </div>
    
                                        <div class="commentText">'.$comments[$i]['comment'].'</div>
                                    </div>
                                ');
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="imageRecomended">
            
        </div>  
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>