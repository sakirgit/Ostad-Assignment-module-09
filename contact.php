<?php include_once("db-config.php"); ?>
    <?php include_once("header.php"); ?>


    <!-- MILESTONE -->
    <section id="milestone">
        <div class="container">
            <h1 class="display-4">Contact Page</h1>
        </div>
    </section>

    <section id="blog">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="intro">
                      <h6>Contact Form</h6>
                  </div>
              </div>
          </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-sm-12 bg-cover"
                    style="background-image: url(img/c2.jpg); min-height:300px;">
                    <div></div>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-7">
                    <?php
                        if(isset($_GET['msg']) && isset($_GET['msg_class'])) {
                            $msg = $_GET['msg'];
                            $msg_class = $_GET['msg_class'];
                        ?>
                            <p class="alert <?php echo $msg_class; ?>"><?php echo $msg; ?></p>
                        <?php
                        }
                    ?>
                    <form action="contact-email-sending-process.php" class="p-lg-0 col-12 row g-3">
                        <div>
                            <h1>Get in touch</h1>
                            <p>Fell free to contact us and we will get back to you as soon as possible</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="fullname" class="form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder="Jon" id="fullname" name="fullname" aria-describedby="emailHelp" required>
                        </div>
                        <div class="col-12">
                            <label for="con_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Johndoe@example.com" id="con_email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="email_subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="Jon" id="email_subject" name="email_subject" aria-describedby="emailHelp" required>
                        </div>
                        <div class="col-12">
                            <label for="con_phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" placeholder="###" id="con_phone" aria-describedby="Phone" required>
                        </div>
                        <div class="col-12">
                            <label for="con_message" class="form-label">Message</label>
                            <textarea name="con_message" placeholder="This is looking great and nice." class="form-control" id="con_message" rows="4" required></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-brand">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
  </section>


  <?php include_once("footer.php"); ?>
