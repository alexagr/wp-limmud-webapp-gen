<?php

/**
 * helpers
 */

function webapp_gen_url($append = '')
{
    return plugins_url($append, __FILE__);
}

function webapp_gen_view_pagename($step)
{
    $view_url_part = '';
    if($step){
        $view_url_part = '_' . $step;
    }

    return admin_url('admin.php?page=webapp-gen-forms' . $view_url_part);
}

function webapp_gen_submit($submit_text, $hide_class = "sr-only") { ?>
    <p class="submit <?php echo $hide_class ?>"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_html__($submit_text, 'webapp-gen') ?>" /></p></form>
<?php
}

function webapp_gen_message($message, $msg_type = 'info') {
    return "<div id='message' class='alert alert-$msg_type'>$message</div>";
}

