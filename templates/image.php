<?php
    include_once('partials/header.php');
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Page.php');
    require_once('../_inc/classes/Posts.php');
    require_once('../_inc/functions.php');

    $imgId = $_GET["id"];
    $posts_class = new Posts();
    $posts = $posts_class->selectImage($imgId);
?>

<div class="imageContent">
    <div class="imageView">
            <div class="slide">
                <?php
                    echo('<a href="image.php?id='.($imgId-1).'"><</a>');
                    echo('
                        <div>
                            <img src="'.$posts[0]->image.'" alt="" class="image">
                        </div>
                    ');
                    echo('<a href="image.php?id='.($imgId+1).'">></a>');
                ?>
            </div>
            <div id="imageInfo">
                <div id="imageArtist">
                    <?php
                        echo('<h1>'.$posts[0]->name.'</h1>');
                    ?>
                    <div class="profile" >
                        <div>
                            Artist: UserName
                        </div>
                        <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                    </div>
                </div>
                <div id="imageRatings">
                    <div>0 Likes</div>
                </div>
                <div id="imageDesc">
                    <div id="desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem nostrum ex sequi labore quibusdam exercitationem eius. Sunt temporibus fugiat fugit? Eos beatae laborum odit temporibus quos numquam natus, ipsum aliquam.
                    </div>
                </div>
                <div id="imageComments">
                    <div id="commentCount">
                        Comments: 0
                    </div>
                    <div class="comments">
                        <div class="comment">
                            <div class="commentProfile">
                                <div class="commentToggle" onclick="COMMENT(n=0)">
                                    -
                                </div>
                                <div class="profile" >
                                    <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                                    <div>
                                        UserName
                                    </div>
                                </div>
                            </div>
                            <div class="commentText">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptates at? Quia repellat, dolorem earum dicta doloribus cupiditate nostrum voluptas sit impedit eius ut voluptatibus id pariatur tempore illum culpa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="imageRecomended">
            <h1>Recomended</h1>
            <div id="recomended">
                <a href="picture.html">
                    <img src="../assets/img/cat1.jpg" alt="" class="imageSmaller"> 
                </a>  
            </div>
        </div>  
    </div>
</div>
    <?php
    include_once('partials/footer.php');
    ?>