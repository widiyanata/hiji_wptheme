<?php
$hero_title = get_theme_mod('hero_title', 'Hero Title');
$hero_desc  = get_theme_mod('hero_desc', 'This is Our Hero Description');
$hero_bg    = get_theme_mod('hero_bg', '');
$hero_link  = get_theme_mod('hero_link', '#');
$hero_link_txt  = get_theme_mod('hero_link_text', 'More');
?>
<div class="section section-header">
  <div class="parallax filter filter-color-black">
    <div class="image"
        style="background-image: url('<?php echo $hero_bg ?>')">
    </div>
    <div class="container">
    <div class="content">
      <div class="title-area">
        <h1 class="title-modern"><?php echo $hero_title ?></h1>
        <h3><?php echo $hero_desc ?></h2>
        <div class="separator line-separator">♦</div>
      </div>

      <div class="button-get-started">
        <a href="<?php echo $hero_link ?>" target="_blank" class="btn btn-white btn-fill btn-lg ">
          <?php echo $hero_link_txt ?>
        </a>
      </div>
    </div>

    </div>
  </div>
</div>
