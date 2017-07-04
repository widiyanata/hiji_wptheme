<?php

// Get Services Data
$title    = get_theme_mod('services_title', 'Service Section Title');
$desc     = get_theme_mod('services_desc', 'Service Section description is here');
$link     = get_theme_mod('services_link', '#');
$services = get_theme_mod('services_type', '');

?>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="title-area">
        <h2><?php echo $title ?></h2>
        <div class="separator separator-danger">✻</div>
        <p class="description"><?php echo $desc ?></p>
      </div>
    </div>
    <div class="row">
      <?php
      $i = 0;
      $class = '';
      foreach ($services as $val) { $i++; $total = $i; }
      if ( $total == 1 ) { $class = 'col-md-12'; } elseif ($total == 2) { $class = 'col-md-6'; } elseif ( $total > 2 ) { $class = 'col-md-4'; }
      foreach ($services as $service) { ?>
        <div class="<?php echo $class ?>">
            <div class="info-icon">
              <div class="icon text-danger">
                <i class="pe-7s-graph1"></i>
              </div>
              <h3><?php echo $service['title'] ?></h3>
              <p class="description"><?php echo $service['desc'] ?></p>
              <?php if (!empty($service['link'])) : ?>
                <a href="<?php echo $service['link'] ?>" class="text-danger"><?php echo $service['link_text'] ?></a>
              <?php endif; ?>
            </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
