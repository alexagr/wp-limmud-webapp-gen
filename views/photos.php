<h1><?php echo esc_html__('Limmud WebApp Generator', 'webapp-gen'); ?></h1>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Photos', 'webapp-gen'); ?></h2>
</div>

<br>
<form enctype="multipart/form-data" method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">
<input type="hidden" name="action" value="webapp_gen_action">
    <input type="hidden" name="action" value="webapp_gen_action">
    <input type="hidden" name="action_name" value="upload_photos">
    <?php wp_nonce_field('webapp_gen_action', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename('photos'); ?>">

    <div class="row">
      <input type="file" id="upload-photos" name="files[]" multiple>
    </div>

    <?php webapp_gen_submit(esc_html__('Upload')); ?>
</form>

<br>
<hr>

<div class="row">
    <?php
    $app_name = webapp_name();
    $files = glob(webapp_path($app_name) . "/speakers/*.jpg");

    for ($i=0; $i<count($files); $i++) {
      $image = $files[$i];
      ?>
        <div class="col-4 col-12-sm">
            <img src="../../webapp/<?php echo $app_name ?>/speakers/<?php echo basename($image) ?>" class="img-thumbnail" width="300" height="300">
            <br><?php echo basename($image) ?>
        </div>
      <?php
   }
   ?>
</div>
