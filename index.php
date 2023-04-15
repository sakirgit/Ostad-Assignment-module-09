<?php include_once("db-config.php"); ?>
    <?php include_once("header.php"); 
    
    
      /* Get a blog post by ID */
      function getContBySlug($slug) {
        global $mysqli;
        $sql = "SELECT * FROM settings_contents WHERE content_for = '$slug'";
    //    echo $sql;exit;
        $result = $mysqli->query($sql);
        $post = $result->fetch_assoc();
        return (object) $post;
  }
    
    ?>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">


        <?php
                // Query to get all data from the settings_contents table
                $sql = "SELECT bp.* 
                FROM blog_posts bp
                INNER JOIN post_and_category pnc ON bp.id = pnc.post_id
                where pnc.category_id = 1
                ORDER BY bp.id DESC";

                  $result = $mysqli->query($sql);
                // Loop through all data and print them in table rows
                while ($row = $result->fetch_assoc()) {
                     ?>

                    <div class="slide slide1" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('dashboard/<?php echo $row['post_image']; ?>');">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center text-white">
                                    <h6 class="text-white text-uppercase">Featured Post ***</h6>
                                    <h1 class="display-3 my-4"><?php echo $row['title']; ?></h1>
                                    <a href="#" class="btn btn-brand">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php } ?>

    </div>

    <section id="blog">
        <div class="container ">
            <div class="row border">
                <div class="col-12">
                    <div class="intro">
                        <h1><?php echo getContBySlug("home-welcome-message")->title; ?></h1>
                        <p class="mx-auto"><?php echo getContBySlug("home-welcome-message")->des; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Blog Posts</h1>
                    </div>
                </div>
            </div>

            <div class="row blogs_multiple">
            <?php
                // Query to get all data from the settings_contents table
                $sql_blog = "SELECT bp.* 
                FROM blog_posts bp
                INNER JOIN post_and_category pnc ON bp.id = pnc.post_id
                ORDER BY bp.id DESC";

                $result_blog = $mysqli->query($sql_blog);
                // Loop through all data and print them in table rows
                while ($row_blog = $result_blog->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mt-4">
                        <article class="blog-post">
                            <div class="post_image">
                                <img src="dashboard/<?php echo $row_blog['post_image']; ?>" alt="">
                            </div>
                            <div class="content">
                                <small><?php echo date( 'd/m/Y', strtotime($row_blog['datetime']) ); ?></small>
                                <h5><a href="single-post.php?id=<?php echo $row_blog['id']; ?>"><?php echo $row_blog['title']; ?></a></h5>
                                <p><?php echo limited_string_echo($row_blog['title'], 20); ?></p>
                            </div>
                        </article>
                    </div>
            <?php } ?>

            </div>
        </div>
    </section>


<?php include_once("footer.php"); ?>





