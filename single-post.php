<?php include_once("db-config.php"); ?>
    <?php include_once("header.php"); ?>

    <?php 

      /* Get a blog post by ID */
      function getPostById($id) {
         global $mysqli;
   //    $sql = "SELECT * FROM blog_posts WHERE id = $id";
         $sql = "SELECT  bp.id AS post_id, bp.title, bp.description, bp.post_image, bp.datetime,bp.status, bp.user_id, 
                        u.name AS user_name, u.user_email
               FROM 
                     blog_posts bp
               INNER JOIN users u ON bp.user_id = u.id
               WHERE 
                     bp.id = $id";
      //   echo $sql;exit;
         $result = $mysqli->query($sql);
         $post = $result->fetch_assoc();
         return $post;
   }

   $sing_post = [];
   if( isset($_GET['id']) ){
       $sing_post = getPostById($_GET['id']);
   }
   $sing_post = (object) $sing_post;
   $page = 'post-add';

   
    ?>
    <section id="">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <article class="blog-post">
                        <h1 class="p-3"><?php echo $sing_post->title; ?></h1>
                        <img src="dashboard/<?php echo $sing_post->post_image; ?>" alt="">
                        <div class="content">
                            <small><?php echo date( 'd M Y', strtotime($sing_post->datetime) ); ?></small> | Author: <b><?php echo $sing_post->user_name; ?></b>
                            <br>

                            <?php
                              // Replace the following variables with your own values
                              $post_title = $sing_post->title;
                              $post_url = "single-post.php?id=15";

                              // Facebook share button
                              $facebook_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($post_url);
                              $facebook_link = "<a href=\"" . $facebook_url . "\" target=\"_blank\">Share on Facebook</a>";

                              // Twitter share button
                              $twitter_url = "https://twitter.com/intent/tweet?url=" . urlencode($post_url) . "&text=" . urlencode($post_title);
                              $twitter_link = "<a href=\"" . $twitter_url . "\" target=\"_blank\">Share on Twitter</a>";
                              ?>

                              <!-- Display the share buttons on the post page -->
                              <div>
                                 <?php echo $facebook_link; ?>
                                 |
                                 <?php echo $twitter_link; ?>
                              </div>



                            <br>
                            <?php echo $sing_post->description; ?>
                           </div>
                    </article>
                </div>
                <aside class="col-md-3  ">
                    <div class="bg-white blog-post">
                        <h4 class="p-2">Relative Posts: </h4>
                        <img src="img/project4.jpg" alt="">
                        <div class="p-2">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                        </div>
                        <br>
                        <img src="img/project4.jpg" alt="">
                        <div class="p-2">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                        </div>
                        <br>
                        <img src="img/project4.jpg" alt="">
                        <div class="p-2">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                        </div>
                        <br>
                        <img src="img/project4.jpg" alt="">
                        <div class="p-2">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                        </div>
                        <br>
                        <img src="img/project4.jpg" alt="">
                        <div class="p-2">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                        </div>
                        <br>
                    </div>

                </aside>
            </div>
        </div>
  </section>


<?php include_once("footer.php"); ?>





