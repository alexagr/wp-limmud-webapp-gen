<h1><?php echo esc_html__('Limmud WebApp Generator', 'webapp-gen'); ?></h1>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Step 1: update application credentials', 'webapp-gen'); ?></h2>
<ul>
<li>* Go to <a href="https://console.developers.google.com">https://console.developers.google.com</a></li>
<li>* Choose existing project or create a new one.</li>
<li>* Click <b>Enable APIs And Services</b>.</li>
<li>* Search for <b>Google Sheet API</b> and enable it.</li>
<li>* Click <b>Credentials &gt; Create Credentials &gt; OAuth Client ID</b>.</li>
<li> &nbsp;&nbsp;* For <b>Application type</b> select &quot;Web Application&quot;</li>
<li> &nbsp;&nbsp;* For <b>Name</b> enter &quot;Limmud WebApp Generator&quot;</li>
<li> &nbsp;&nbsp;* For <b>Authorized redirect URIs</b> enter &quot;<?php echo webapp_gen_view_pagename('connect'); ?>&quot;</li>
<li> &nbsp;&nbsp;* Click <b>Create</b></li>
<li>* Copy generated credentials below and click <b>Update</b>.</li>
</ul>

<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename('connect'); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="client_id"><?php echo esc_html__("Client ID", 'webapp-gen') ?></label></th>
            <td><?php echo $client_id; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="client_secret"><?php echo esc_html__("Client secret", 'webapp-gen') ?></label></th>
            <td><?php echo $client_secret; ?></td>
        </tr>
    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Step 2: connect to Google Sheets API', 'webapp-gen'); ?></h2>

<h4>Access token: <?php echo token_status(); ?></h4>

<ul>
<li>* Click <a href="<?php echo create_auth_url(); ?>" target="_blank">here</a> to create a new access token for Google Sheets API.</li>
<li>* A new tab will be opened and you will be asked to choose an account. Choose Google account where the sheet is available.</li>
<li>* Then you will get a warning screen saying that the app is not verified. This is fine because we're using private application ID. So click &quot;Advanced&quot; and then &quot;Go to Limmud WebApp Generator&quot;.</li>
<li>* At the next screen make sure to check &quot;See all your Google Sheets spreadsheets&quot; checkbox and click &quot;Continue&quot;.</li>
</ul>

</div>
