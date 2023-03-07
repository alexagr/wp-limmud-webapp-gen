<?php

class WebApp_Gen_Admin_Form
{

    const ID = 'webapp-gen-forms';

    const NONCE_KEY = 'webapp_gen';

    const WHITELISTED_KEYS = array(
        'webapp-gen-config',
        'webapp-gen-api',
        'webapp-gen-advanced'
    );

    protected $views = array(
        'main' => 'views/main',
        'connect' => 'views/connect',
        'redirect' => 'views/redirect',
        'alerts' => 'views/alerts',
        'photos' => 'views/photos',
        'advanced' => 'views/advanced',
        'not-found' => 'views/not-found'
    );

    public function init()
    {
        add_action('admin_menu', array($this, 'add_menu_page'), 20);

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));

        add_action('admin_post_webapp_gen_update', array($this, 'submit_update'));

        add_action('admin_post_webapp_gen_action', array($this, 'submit_action'));

    }

    public function get_id()
    {
        return self::ID;
    }

    public function get_nonce_key()
    {
        return self::NONCE_KEY;
    }

    public function get_whitelisted_keys()
    {
        return self::WHITELISTED_KEYS;
    }

    private function get_defaults()
    {
        $advanced_defaults = array(
            'webapp_folder' => 'webapp',
            'event_timezone' => '',
            'close_calendar_gaps' => 'no',
            'close_calendar_gaps_ignore_meals' => 'yes',
            'schedule_sheet' => 'Schedule',
            'schedule_date_column' => 'date',
            'schedule_start_column' => 'start',
            'schedule_end_column' => 'end',
            'schedule_hotel_column' => 'hotel',
            'schedule_room_column' => 'room',
            'schedule_presenter_column' => 'presenter',
            'schedule_session_name_column' => 'name',
            'schedule_session_language_column' => 'language',
            'schedule_session_type_column' => 'session-type',
            'schedule_session_sabbath_column' => 'sabbath',
            'schedule_presenter2_column' => 'presenter2',
            'schedule_presenter3_column' => 'presenter3',
            'schedule_presenter4_column' => 'presenter4',
            'presenter_sheet' => 'Presenters',
            'presenter_name_column' => 'name',
            'presenter_name2_column' => 'name-en',
            'presenter_photo_column' => 'photo',
            'presenter_bio_column' => 'bio',
            'presenter_bio2_column' => 'bio-en',
            'presenter_session_name_column' => 'session-name',
            'presenter_session_name2_column' => 'session-name-en',
            'presenter_session_desc_column' => 'session-desc',
            'presenter_session_desc2_column' => 'session-desc-en',
            'presenter_session_type_column' => 'session-type',
            'presenter_session_language_column' => 'session-language',
            'presenter_session2_name_column' => 'session2-name',
            'presenter_session2_name2_column' => 'session2-name-en',
            'presenter_session2_desc_column' => 'session2-desc',
            'presenter_session2_desc2_column' => 'session2-desc-en',
            'presenter_session2_type_column' => 'session2-type',
            'presenter_session2_language_column' => 'session2-language',
            'presenter_name_first_last_column' => 'name-first-last',
            'presenter_name2_first_last_column' => 'name-en-first-last',
            'session_type_sheet' => 'Tracks',
            'session_type_name_column' => 'name',
            'session_type_name2_column' => 'name-en',
            'session_type_color_column' => 'color',
            'language_sheet' => 'Languages',
            'language_name_column' => 'name',
            'language_name2_column' => 'name-en',
            'language_short_column' => 'name-short',
            'location_sheet' => 'Locations',
            'location_hotel_column' => 'hotel',
            'location_room_column' => 'room',
            'location_hotel2_column' => 'hotel-en',
            'location_room2_column' => 'room-en',
            'location_order_column' => 'order',
            'event_sheet' => 'Event',
            'event_app_title_column' => 'app-title',
            'event_name_column' => 'event-name',
            'event_second_language_column' => 'second-language',
            'event_name2_column' => 'event-name-en',
            'event_date_column' => 'event-date',
            'event_date2_column' => 'event-date-en',
            'event_poster_column' => 'poster',
            'event_poster_mobile_column' => 'poster-mobile',
            'event_map_column' => 'map',
            'event_map2_column' => 'map-en',
            'event_organizer_name_column' => 'organizer-name',
            'event_site_url_column' => 'site-url',
            'event_facebook_url_column' => 'facebook-url',
            'event_instagram_url_column' => 'instagram-url',
            'event_telegram_url_column' => 'telegram-url',
            'event_email_column' => 'email',
            'event_logo_column' => 'logo',
            'event_icon_column' => 'icon',
            'event_analytics_column' => 'google-analytics-tag'
        );
        foreach ($this->get_whitelisted_keys() as $key => $val) {
            if ($val == 'webapp-gen-advanced') {
                $defaults[$val] = get_option($val, $advanced_defaults);
            } else {
                $defaults[$val] = get_option($val);
            }
        }
        return $defaults;
    }

    public function add_menu_page()
    {

        add_menu_page(
            esc_html__('Limmud WebApp', 'webapp-gen'),
            esc_html__('Limmud WebApp', 'webapp-gen'),
            'manage_options',
            $this->get_id(),
            array(&$this, 'load_view'),
            'dashicons-schedule'
        );

        add_submenu_page(
            $this->get_id(),
            esc_html__('Generate', 'webapp-gen'),
            esc_html__('Generate', 'webapp-gen'),
            'manage_options',
            $this->get_id(),
            array(&$this, 'load_view')
        );

        add_submenu_page(
            $this->get_id(),
            esc_html__('Photos', 'webapp-gen'),
            esc_html__('Photos', 'webapp-gen'),
            'manage_options',
            $this->get_id() . '_photos',
            array(&$this, 'load_view')
        );

        add_submenu_page(
            $this->get_id(),
            esc_html__('Connect', 'webapp-gen'),
            esc_html__('Connect', 'webapp-gen'),
            'manage_options',
            $this->get_id() . '_connect',
            array(&$this, 'load_view')
        );

        add_submenu_page(
            $this->get_id(),
            esc_html__('Advanced', 'webapp-gen'),
            esc_html__('Advanced', 'webapp-gen'),
            'manage_options',
            $this->get_id() . '_advanced',
            array(&$this, 'load_view')
        );
    }

    function load_view()
    {
        $this->default_values = $this->get_defaults();
        $this->current_page = $this->current_view();
        
        $current_views = isset($this->views[$this->current_page]) ? $this->views[$this->current_page] : $this->views['not-found'];

        $step_data_func_name = $this->current_page . '_data';

        $args = [];
        /**
         * prepare data for view
         */
        if (method_exists($this, $step_data_func_name)) {
            $args = $this->$step_data_func_name();
        }
        /**
         * Default Admin Form Template
         */

        echo '<div class="webapp-gen-forms ' . $this->current_page . '">';

        // echo '<div class="container container1">';
        echo '<div class="inner">';

        $this->include_with_variables($this->template_server_path('views/alerts', false));

        $this->include_with_variables($this->template_server_path($current_views, false), $args);

        echo '</div>';
        // echo '</div>';

        echo '</div>';
    }

    function include_with_variables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        if (file_exists($filePath)) {
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;
    }

    public function admin_enqueue_scripts($hook_suffix)
    {
        if (strpos($hook_suffix, $this->get_id()) === false) {
            return;
        }

        /*
        wp_enqueue_style('webapp-gen-form-bs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', 
            LIMMUD_WEBAPP_GEN_VERSION
        );

        wp_enqueue_script('webapp-gen-form-bs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
            array('jquery'),
            LIMMUD_WEBAPP_GEN_VERSION,
            true
        );
        */

        wp_enqueue_style('webapp-gen-form', webapp_gen_url('assets/style.css'), LIMMUD_WEBAPP_GEN_VERSION);

        wp_enqueue_script('webapp-gen-form-js', webapp_gen_url('assets/custom.js'),
            array('jquery'),
            LIMMUD_WEBAPP_GEN_VERSION,
            true
        );
    }

    public function submit_update()
    {
        $nonce = sanitize_text_field($_POST[$this->get_nonce_key()]);
        $action = sanitize_text_field($_POST['action']);

        if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
            print 'Sorry, your nonce did not verify.';
            exit;
        }
        if (!current_user_can('manage_options')) {
            print 'You can\'t manage options';
            exit;
        }
        /**
         * whitelist keys that can be updated
         */
        $whitelisted_keys = $this->get_whitelisted_keys();

        $fields_to_update = [];

        foreach ($whitelisted_keys as $key) {
            if (array_key_exists($key, $_POST)) {
                $fields_to_update[$key] = $_POST[$key];
            }
        }

        /**
         * Loop through form fields keys and update data in DB (wp_options)
         */

        $this->db_update_options($fields_to_update);

        $redirect_to = $_POST['redirectToUrl'];

        if ($redirect_to) {
            add_settings_error('webapp_msg', 'webapp_msg_option', __("Changes saved."), 'success');
            set_transient('settings_errors', get_settings_errors(), 30);
            wp_safe_redirect($redirect_to);
            exit;
        }
    }

    private function db_update_options($group)
    {
        foreach ($group as $key => $fields) {
            $db_opts = get_option($key);
            $db_opts = ($db_opts === '') ? array() : $db_opts;

            if(!$db_opts){
                $db_opts = array();
            }

            $updated = array_merge($db_opts, $fields);
            update_option($key, $updated);
        }
    }

    public function submit_action()
    {
        $nonce = sanitize_text_field($_POST[$this->get_nonce_key()]);
        $action = sanitize_text_field($_POST['action']);
        $action_name = sanitize_text_field($_POST['action_name']);

        if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
           print 'Sorry, your nonce did not verify.';
           exit;
       }

       $error = '';
       $action_func_name = $action_name . '_action';
       if (method_exists($this, $action_func_name)) {
           $error = $this->$action_func_name();
       }

       $redirect_to = $_POST['redirectToUrl'];
       if ($redirect_to) {
            if (empty($error)) {
                add_settings_error('webapp_msg', 'webapp_msg_option', __("Operation completed."), 'success');
            } else {
                add_settings_error('webapp_msg', 'webapp_msg_option', $error, 'danger');
            }

            set_transient('settings_errors', get_settings_errors(), 30);
            wp_safe_redirect($redirect_to);
            exit;
       }
    }

    /**
     * Form elements outputs
     */
    private function render_input($group, $key, $required = false)
    {
        $inputValue = isset($this->default_values[$group][$key]) ? stripslashes($this->default_values[$group][$key]) : '';
        $requiredAttr = ($required) ? "required" : '';
 
        return '<input type="text" id="' . $key . '" name="' . $group . '[' . $key . ']" class="regular-text" value="' . $inputValue . '" ' . $requiredAttr . '>';
    }
 
    private function render_textarea($group, $key)
    {
        $defaultValue = isset($this->default_values[$group][$key]) ? stripslashes($this->default_values[$group][$key]) : '';
 
        return '<textarea class="form-control" rows="6" autocomplete="off" id="' . $key . '" name="' . $group . '[' . $key . ']">' . $defaultValue . '</textarea>';
    }
 
    private function render_select($group, $key, $options)
    {
        $selectedVal = isset($this->default_values[$group][$key]) ? $this->default_values[$group][$key] : '';
 
        $html = '';
        $html .= '<select class="form-control" id="' . $key . '" name="' . $group . '[' . $key . ']">';
        $html .= ($selectedVal == '') ? '<option value=""></option>' : '';
        foreach ($options as $key => $opt) {
            $selectedOpt = '';
            if ($selectedVal == $key) {
                $selectedOpt = 'selected="selected"';
            }
            $html .= '<option value="' . $key . '" ' . $selectedOpt . '>' . $opt . '</option>';
        }
        $html .= '</select>';
        return $html;
    }
 
    private function render_checkbox($group, $key)
    {
        $checkedVal = isset($this->default_values[$group][$key]) ? $this->default_values[$group][$key] : '';

        $checkedAttr = "";
        if ($checkedVal != '') {
            $checkedAttr = "checked";
        }
        $html = '';

        $html .= '
        <input type="hidden" name="' . $group . '[' . $key . ']" value="">
        <input class="form-check-input" type="checkbox" value="on" id="' . $key . '" name="' . $group . '[' . $key . ']" ' . $checkedAttr . '>';

        return $html;
    }

    /**
     * Prepare data for views
    */
 
    private function main_data()
    {
        $args = [];
        $args['sheet_id'] = $this->render_input('webapp-gen-config', 'sheet_id');
        $args['app_name'] = $this->render_input('webapp-gen-config', 'app_name');
        return $args;
    }

    private function connect_data()
    {
        $args = [];
        $args['client_id'] = $this->render_input('webapp-gen-api', 'client_id');
        $args['client_secret'] = $this->render_input('webapp-gen-api', 'client_secret');

        if (isset($_GET['code'])) {
            $error = fetch_access_token($_GET['code']);
            if (empty($error)) {
                add_settings_error('webapp_msg', 'webapp_msg_option', __("Token successfully created"), 'success');
            } else {
                add_settings_error('webapp_msg', 'webapp_msg_option', $error, 'danger');
            }
            set_transient('settings_errors', get_settings_errors(), 30);
        }

        return $args;
    }

    private function advanced_data()
    {
        $args = [];
        $args['webapp_folder'] = $this->render_input('webapp-gen-advanced', 'webapp_folder');
        $args['event_timezone'] = $this->render_input('webapp-gen-advanced', 'event_timezone');
        $args['close_calendar_gaps'] = $this->render_select('webapp-gen-advanced', 'close_calendar_gaps', array('no' => 'no', '15' => '15 min', '30' => '30 min', '45' => '45 min', '60' => '1 hour'));
        $args['close_calendar_gaps_ignore_meals'] = $this->render_select('webapp-gen-advanced', 'close_calendar_gaps_ignore_meals', array('no' => 'no', 'yes' => 'yes'));
        $args['schedule_sheet'] = $this->render_input('webapp-gen-advanced', 'schedule_sheet');
        $args['schedule_date_column'] = $this->render_input('webapp-gen-advanced', 'schedule_date_column');
        $args['schedule_start_column'] = $this->render_input('webapp-gen-advanced', 'schedule_start_column');
        $args['schedule_end_column'] = $this->render_input('webapp-gen-advanced', 'schedule_end_column');
        $args['schedule_hotel_column'] = $this->render_input('webapp-gen-advanced', 'schedule_hotel_column');
        $args['schedule_room_column'] = $this->render_input('webapp-gen-advanced', 'schedule_room_column');
        $args['schedule_presenter_column'] = $this->render_input('webapp-gen-advanced', 'schedule_presenter_column');
        $args['schedule_session_name_column'] = $this->render_input('webapp-gen-advanced', 'schedule_session_name_column');
        $args['schedule_session_language_column'] = $this->render_input('webapp-gen-advanced', 'schedule_session_language_column');
        $args['schedule_session_type_column'] = $this->render_input('webapp-gen-advanced', 'schedule_session_type_column');
        $args['schedule_session_sabbath_column'] = $this->render_input('webapp-gen-advanced', 'schedule_session_sabbath_column');
        $args['schedule_presenter2_column'] = $this->render_input('webapp-gen-advanced', 'schedule_presenter2_column');
        $args['schedule_presenter3_column'] = $this->render_input('webapp-gen-advanced', 'schedule_presenter3_column');
        $args['schedule_presenter4_column'] = $this->render_input('webapp-gen-advanced', 'schedule_presenter4_column');
        $args['presenter_sheet'] = $this->render_input('webapp-gen-advanced', 'presenter_sheet');
        $args['presenter_name_column'] = $this->render_input('webapp-gen-advanced', 'presenter_name_column');
        $args['presenter_name2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_name2_column');
        $args['presenter_photo_column'] = $this->render_input('webapp-gen-advanced', 'presenter_photo_column');
        $args['presenter_bio_column'] = $this->render_input('webapp-gen-advanced', 'presenter_bio_column');
        $args['presenter_bio2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_bio2_column');
        $args['presenter_session_name_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_name_column');
        $args['presenter_session_name2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_name2_column');
        $args['presenter_session_desc_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_desc_column');
        $args['presenter_session_desc2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_desc2_column');
        $args['presenter_session_type_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_type_column');
        $args['presenter_session_language_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session_language_column');
        $args['presenter_session2_name_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_name_column');
        $args['presenter_session2_name2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_name2_column');
        $args['presenter_session2_desc_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_desc_column');
        $args['presenter_session2_desc2_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_desc2_column');
        $args['presenter_session2_type_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_type_column');
        $args['presenter_session2_language_column'] = $this->render_input('webapp-gen-advanced', 'presenter_session2_language_column');
        $args['presenter_name_first_last_column'] = $this->render_input('webapp-gen-advanced', 'presenter_name_first_last_column');
        $args['presenter_name2_first_last_column'] = $this->render_input('webapp-gen-advanced', 'presenter_name2_first_last_column');
        $args['session_type_sheet'] = $this->render_input('webapp-gen-advanced', 'session_type_sheet');
        $args['session_type_name_column'] = $this->render_input('webapp-gen-advanced', 'session_type_name_column');
        $args['session_type_name2_column'] = $this->render_input('webapp-gen-advanced', 'session_type_name2_column');
        $args['session_type_color_column'] = $this->render_input('webapp-gen-advanced', 'session_type_color_column');
        $args['language_sheet'] = $this->render_input('webapp-gen-advanced', 'language_sheet');
        $args['language_name_column'] = $this->render_input('webapp-gen-advanced', 'language_name_column');
        $args['language_name2_column'] = $this->render_input('webapp-gen-advanced', 'language_name2_column');
        $args['language_short_column'] = $this->render_input('webapp-gen-advanced', 'language_short_column');
        $args['location_sheet'] = $this->render_input('webapp-gen-advanced', 'location_sheet');
        $args['location_hotel_column'] = $this->render_input('webapp-gen-advanced', 'location_hotel_column');
        $args['location_room_column'] = $this->render_input('webapp-gen-advanced', 'location_room_column');
        $args['location_hotel2_column'] = $this->render_input('webapp-gen-advanced', 'location_hotel2_column');
        $args['location_room2_column'] = $this->render_input('webapp-gen-advanced', 'location_room2_column');
        $args['location_order_column'] = $this->render_input('webapp-gen-advanced', 'location_order_column');
        $args['event_sheet'] = $this->render_input('webapp-gen-advanced', 'event_sheet');
        $args['event_app_title_column'] = $this->render_input('webapp-gen-advanced', 'event_app_title_column');
        $args['event_second_language_column'] = $this->render_input('webapp-gen-advanced', 'event_second_language_column');
        $args['event_name_column'] = $this->render_input('webapp-gen-advanced', 'event_name_column');
        $args['event_name2_column'] = $this->render_input('webapp-gen-advanced', 'event_name2_column');
        $args['event_date_column'] = $this->render_input('webapp-gen-advanced', 'event_date_column');
        $args['event_date2_column'] = $this->render_input('webapp-gen-advanced', 'event_date2_column');
        $args['event_poster_column'] = $this->render_input('webapp-gen-advanced', 'event_poster_column');
        $args['event_poster_mobile_column'] = $this->render_input('webapp-gen-advanced', 'event_poster_mobile_column');
        $args['event_map_column'] = $this->render_input('webapp-gen-advanced', 'event_map_column');
        $args['event_map2_column'] = $this->render_input('webapp-gen-advanced', 'event_map2_column');
        $args['event_organizer_name_column'] = $this->render_input('webapp-gen-advanced', 'event_organizer_name_column');
        $args['event_site_url_column'] = $this->render_input('webapp-gen-advanced', 'event_site_url_column');
        $args['event_facebook_url_column'] = $this->render_input('webapp-gen-advanced', 'event_facebook_url_column');
        $args['event_instagram_url_column'] = $this->render_input('webapp-gen-advanced', 'event_instagram_url_column');
        $args['event_telegram_url_column'] = $this->render_input('webapp-gen-advanced', 'event_telegram_url_column');
        $args['event_email_column'] = $this->render_input('webapp-gen-advanced', 'event_email_column');
        $args['event_logo_column'] = $this->render_input('webapp-gen-advanced', 'event_logo_column');
        $args['event_icon_column'] = $this->render_input('webapp-gen-advanced', 'event_icon_column');
        $args['event_analytics_column'] = $this->render_input('webapp-gen-advanced', 'event_analytics_column');
        return $args;
    }

    /**
     * Actions
    */

    private function copy_assets_action()
    {
        return copy_assets(false);
    }

    private function generate_action()
    {
        $error = copy_assets(true);
        if (empty($error)) {
            $error = generate($this->get_defaults());
        }
        if (empty($error) && is_plugin_active('wp-dummy-plugin/wp-dummy-plugin.php')) {
            deactivate_plugins('wp-dummy-plugin/wp-dummy-plugin.php');
            activate_plugins('wp-dummy-plugin/wp-dummy-plugin.php');
        }
        return $error;
    }

    private function upload_photos_action()
    {
        return copy_photos();
    }

    /**
     * Helper functions
    */

    private function current_view()
    {
        $current_step = isset($_GET['page']) ? $_GET['page'] : 'main';
    
        if (strpos($current_step, '_') === false) {
            return 'main';
        }
    
        return str_replace($this->get_id() . "_", "", $current_step);
    }

    private function template_server_path($file_path, $include = true, $options = array())
    {
        $my_plugin_dir = WP_PLUGIN_DIR . "/" . LIMMUD_WEBAPP_GEN_DIR . "/";
    
        if ( is_dir( $my_plugin_dir ) ) {
    
            $path_to_file = $my_plugin_dir . $file_path . '.php';
    
            if ($include) {
                include $path_to_file;
            }
    
            return $path_to_file;
        }
    
        // view options
        $options = apply_filters('webapp_gen_locate_template_options', $options, $name);
    
        $include_dir_path = rtrim(get_stylesheet_directory(), '/')."/webapp-gen";
        $path_to_file     = rtrim($include_dir_path, '/')."/$name.php";
    
        if (!is_readable($path_to_file)) {
            $include_dir_path = __DIR__."/views";
        }
    
        $include_dir_path = apply_filters('webapp_gen_locate_template_path', $include_dir_path, $name);
        $path_to_file     = rtrim($include_dir_path, '/')."/$name.php";
    
        if ($include) {
            include $path_to_file;
        }
    
        return $path_to_file;
    }
 } 
