<?php

/*
* Todo: Get data from customizer
*/

$testi_title = get_theme_mod('testi_title', 'Clients Testimonials');
$testi_sub_title = get_theme_mod('testi_sub_title', 'Here are some');
$testimonies = get_theme_mod('testimoni', '');

if ( !empty($testimonies) ) :

  foreach ($testimonies as $val) { $img[] = $val['testimoni_img']; }
?>
<div class="section section-our-clients-freebie">
    <div class="container">
        <div class="title-area">
            <h5 class="subtitle text-gray"><?php echo $testi_sub_title; ?></h5>
            <h2><?php echo $testi_title; ?></h2>
            <div class="separator separator-danger">∎</div>
        </div>

        <ul class="nav nav-text" role="tablist">
          <?php $i = 0; foreach ($img as $key) { $i++;?>
            <li class="<?php echo ($i == 1 ? 'active' : '') ?>">
                <a href="#testimonial<?php echo $i; ?>" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="<?php echo wp_get_attachment_image_url($key) ?>"/>
                    </div>
                </a>
            </li>
          <?php }  ?>
        </ul>

        <div class="tab-content">
          <?php $i=0; foreach ($testimonies as $testi) { $i++; ?>
            <div class="tab-pane <?php echo ($i == 1 ? 'active' : '') ?>" id="testimonial<?php echo $i; ?>">
              <h3><?php echo $testi['testimoni_name'] ?></h3>
                <p class="description">
                  <?php echo $testi['testimoni_text']; ?>
                </p>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
<?php endif; ?>
