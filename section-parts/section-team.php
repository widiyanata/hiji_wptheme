<?php

// Get Team Data
$title    = get_theme_mod('team_title', '');
$desc     = get_theme_mod('team_desc', '');
$bg_img   = get_theme_mod('team_bg_img', '');
$teams    = get_theme_mod('team_type', '');

if ( !empty($teams) ) {
  foreach ($teams as $val) { $i++; $total = $i; }
  if ( $total == 1 ) { $class = 'col-md-12'; } elseif ($total == 2) { $class = 'col-md-6'; } elseif ( $total > 2 ) { $class = 'col-md-4'; }
}
?>
<div class="section section-our-team-freebie">
    <div class="parallax filter filter-color-black">
        <div class="image" style="background-image:url(<?php  echo $bg_img; ?>)">
        </div>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="title-area">
                        <h2><?php echo $title; ?></h2>
                        <div class="separator separator-danger">✻</div>
                        <p class="description"><?php echo $desc; ?></p>
                    </div>
                </div>

                <div class="team">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                              <?php
                              if ( !empty($teams) ) {
                              foreach ($teams as $team) { ?>
                                <div class="<?php echo $class; ?>">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="<?php echo wp_get_attachment_url( $team['img'] ); ?>"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title"><?php echo $team['name']; ?></h3>
                                                <p class="small-text"><?php echo $team['position']; ?></p>
                                                <p class="description"><?php echo $team['desc']; ?></p>
                                            </div>
                                        </div>
                                    </div> <!-- end .card -->
                                </div> <!-- end .col-* -->
                              <?php } // end foreach
                            } // end if !empty ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
