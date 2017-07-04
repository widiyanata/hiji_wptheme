<?php

$contact_bg     = get_theme_mod('contact_bg', '');
$contact_title  = get_theme_mod('contact_title', 'Contact Section Title');
$contact_desc   = get_theme_mod('contact_desc', 'Contact Section Description');

 ?>
<div class="section section-small section-get-started">
    <div class="parallax filter">
        <div class="image"
            style="background-image: url('<?php echo $contact_bg ?>')">
        </div>
        <div class="container">
            <div class="title-area">
                <h2 class="text-white"><?php echo $contact_title ?></h2>
                <div class="separator line-separator">♦</div>
                <p class="description"><?php echo $contact_desc ?></p>
            </div>
            <div class="col-md-6 col-md-offset-3">
              <div class="" id="ajaxcontact-response"></div>
              <form class="form" action="" method="post">
                <div class="row">
                  <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="cname" placeholder="Name" type="text" required  />
                  </div>
                  <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="email" name="cemail" placeholder="Email" type="email" required />
                  </div>
                </div>
                <textarea class="form-control" id="message" name="cmessage" placeholder="Message" rows="5"></textarea>
                <div class="button-get-started">
                  <button class="btn btn-primary btn-fill btn-lg" type="submit" name="contact_us">Contact Us</button>
                </div>
                <!-- <input type="hidden" name="action" value="contact_form"> -->
              </form>
            </div>


        </div>
    </div>
</div>
