<?php
/** @var string $sheet_id */
/** @var string $app_name */
?>
<h1><?php echo esc_html__('Limmud WebApp Generator', 'webapp-gen'); ?></h1>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('General', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="webapp_folder"><?php echo esc_html__("Web App folder", 'webapp-gen') ?></label></th>
            <td><?php echo $webapp_folder; ?></td>
        </tr>
    </table>

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="server_timezone"><?php echo esc_html__("Server timezone", 'webapp-gen') ?></label></th>
            <td><?php echo $server_timezone; ?></td>
        </tr>
    </table>

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="close_calendar_gaps"><?php echo esc_html__("Close gaps between sessions in calendar view", 'webapp-gen') ?></label></th>
            <td><?php echo $close_calendar_gaps; ?></td>
        </tr>
    </table>

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="close_calendar_gaps_ignore_meals"><?php echo esc_html__("Ignore meals when closing gaps", 'webapp-gen') ?></label></th>
            <td><?php echo $close_calendar_gaps_ignore_meals; ?></td>
        </tr>
    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Schedule', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="schedule_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_date_column"><?php echo esc_html__("Date column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_date_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_start_column"><?php echo esc_html__("Start column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_start_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_end_column"><?php echo esc_html__("End column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_end_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_room_column"><?php echo esc_html__("Room column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_room_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_presenter_column"><?php echo esc_html__("Presenter column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_presenter_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_session_name_column"><?php echo esc_html__("Session name column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_session_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_session_language_column"><?php echo esc_html__("Session language column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_session_language_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_session_type_column"><?php echo esc_html__("Session type column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_session_type_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_session_sabbath_column"><?php echo esc_html__("Session sabbath column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_session_sabbath_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_presenter2_column"><?php echo esc_html__("Presenter 2 column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_presenter2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="schedule_presenter3_column"><?php echo esc_html__("Presenter 3 column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_presenter3_column; ?></td>
        </tr>
        <tr>
            <th scope="row"><label for="schedule_presenter4_column"><?php echo esc_html__("Presenter 4 column", 'webapp-gen') ?></label></th>
            <td><?php echo $schedule_presenter4_column; ?></td>
        </tr>
    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Presenters', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="presenter_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_name_column"><?php echo esc_html__("Name [last first] column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_name2_column"><?php echo esc_html__("Name [last first] (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_photo_column"><?php echo esc_html__("Photo column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_photo_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_bio_column"><?php echo esc_html__("Biography column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_bio_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_bio2_column"><?php echo esc_html__("Biography (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_bio2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_name_column"><?php echo esc_html__("Session name column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_name2_column"><?php echo esc_html__("Session name (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_desc_column"><?php echo esc_html__("Session description column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_desc_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_desc2_column"><?php echo esc_html__("Session description (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_desc2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_type_column"><?php echo esc_html__("Session type column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_type_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session_language_column"><?php echo esc_html__("Session language column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session_language_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_name_column"><?php echo esc_html__("Session 2 name column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_name2_column"><?php echo esc_html__("Session 2 name (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_desc_column"><?php echo esc_html__("Session 2 description column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_desc_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_desc2_column"><?php echo esc_html__("Session 2 description (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_desc2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_type_column"><?php echo esc_html__("Session 2 type column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_type_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_session2_language_column"><?php echo esc_html__("Session 2 language column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_session2_language_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_name_first_last_column"><?php echo esc_html__("Name [first last] column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_name_first_last_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="presenter_name2_first_last_column"><?php echo esc_html__("Name [first last] (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $presenter_name2_first_last_column; ?></td>
        </tr>

    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Session Types', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="session_type_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $session_type_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="session_type_name_column"><?php echo esc_html__("Name column", 'webapp-gen') ?></label></th>
            <td><?php echo $session_type_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="session_type_name2_column"><?php echo esc_html__("Name (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $session_type_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="session_type_color_column"><?php echo esc_html__("Color column", 'webapp-gen') ?></label></th>
            <td><?php echo $session_type_color_column; ?></td>
        </tr>

    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Languages', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="language_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $language_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="language_name_column"><?php echo esc_html__("Name column", 'webapp-gen') ?></label></th>
            <td><?php echo $language_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="language_name2_column"><?php echo esc_html__("Name (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $language_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="language_short_column"><?php echo esc_html__("Short name column", 'webapp-gen') ?></label></th>
            <td><?php echo $language_short_column; ?></td>
        </tr>

    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Locations', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="location_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $location_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="location_hotel_column"><?php echo esc_html__("Hotel column", 'webapp-gen') ?></label></th>
            <td><?php echo $location_hotel_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="location_room_column"><?php echo esc_html__("Room column", 'webapp-gen') ?></label></th>
            <td><?php echo $location_room_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="location_hotel2_column"><?php echo esc_html__("Hotel (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $location_hotel2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="location_room2_column"><?php echo esc_html__("Room (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $location_room2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="location_order_column"><?php echo esc_html__("Order column", 'webapp-gen') ?></label></th>
            <td><?php echo $location_order_column; ?></td>
        </tr>

    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
<hr>

<div class="wrap">
<h2><?php echo esc_html__('Event', 'webapp-gen'); ?></h2>
<form method="POST" action="<?php echo esc_html(admin_url('admin-post.php')); ?>" onkeydown="return event.key != 'Enter';">
    <input type="hidden" name="action" value="webapp_gen_update">
    <?php wp_nonce_field('webapp_gen_update', 'webapp_gen'); ?>
    <input type="hidden" name="redirectToUrl" value="<?php echo webapp_gen_view_pagename(''); ?>">

    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="event_sheet"><?php echo esc_html__("Sheet name", 'webapp-gen') ?></label></th>
            <td><?php echo $event_sheet; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_app_title_column"><?php echo esc_html__("App title column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_app_title_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_second_language_column"><?php echo esc_html__("Second language column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_second_language_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_name_column"><?php echo esc_html__("Name column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_name2_column"><?php echo esc_html__("Name (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_name2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_date_column"><?php echo esc_html__("Date column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_date_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_date2_column"><?php echo esc_html__("Date (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_date2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_poster_column"><?php echo esc_html__("Poster column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_poster_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_poster_mobile_column"><?php echo esc_html__("Poster mobile column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_poster_mobile_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_map_column"><?php echo esc_html__("Map column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_map_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_map2_column"><?php echo esc_html__("Map (2nd language) column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_map2_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_organizer_name_column"><?php echo esc_html__("Organizer name column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_organizer_name_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_site_url_column"><?php echo esc_html__("Site URL column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_site_url_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_facebook_url_column"><?php echo esc_html__("Facebook URL column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_facebook_url_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_instagram_url_column"><?php echo esc_html__("Instagram URL column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_instagram_url_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_telegram_url_column"><?php echo esc_html__("Telegram URL column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_telegram_url_column; ?></td>
        </tr>

        <tr>
            <th scope="row"><label for="event_email_column"><?php echo esc_html__("Email column", 'webapp-gen') ?></label></th>
            <td><?php echo $event_email_column; ?></td>
        </tr>

    </table>

    <?php webapp_gen_submit(esc_html__('Update')); ?>
</form>
</div>

<br>
