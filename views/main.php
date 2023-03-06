<?php
/** @var string $sheet_id */
/** @var string $app_name */
?>
<h1><?php echo esc_html__('Limmud WebApp Generator', 'webapp-gen'); ?></h1>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Configure', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="sheet_id"><?php echo esc_html__("Google Sheet ID", 'webapp-gen') ?></label></th>
            <td><?php echo $sheet_id; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="app_name"><?php echo esc_html__("App Name", 'webapp-gen') ?></label></th>
            <td><?php echo $app_name; ?></td>
        </tr>
    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Generate', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">
<input type="hidden" name="action" value="webapp_gen_action">
    <input type="hidden" name="action_name" value="generate">
    <?php wp_nonce_field('webapp_gen_action', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <?php webapp_gen_submit(esc_html__('Generate')); ?>
</form>

<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="webapp_gen_action">
    <input type="hidden" name="action_name" value="copy_assets">
    <?php wp_nonce_field('webapp_gen_action', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <?php webapp_gen_submit(esc_html__('Copy Assets')); ?>
</form>

<br>
<p>Click <a href="../../webapp/<?php echo webapp_name(); ?>" target="_blank">here</a> to open generated WebApp</p>
</div>
