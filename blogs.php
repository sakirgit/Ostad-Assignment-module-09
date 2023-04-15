<?php include_once("db-config.php"); ?>
    <?php include_once("header.php"); ?>


    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Blog Posts</h1>
                        <p class="mx-auto">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                            roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
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





