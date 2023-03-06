<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       Limmud WebApp Generator
 * Description:       Generate webapp for Limmud conference
 * Version:           1.0
 * Author:            Alex Agranov
 * License:           GNU General Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'LIMMUD_WEBAPP_GEN_VERSION', '1.0' );

define( 'LIMMUD_WEBAPP_GEN_DIR', 'wp-limmud-webapp-gen' );

require plugin_dir_path( __FILE__ ) . '/lib/vendor/autoload.php';
require plugin_dir_path( __FILE__ ) . 'get-token.php';
require plugin_dir_path( __FILE__ ) . 'copy-assets.php';
require plugin_dir_path( __FILE__ ) . 'copy-photos.php';
require plugin_dir_path( __FILE__ ) . 'generate.php';
require plugin_dir_path( __FILE__ ) . 'helpers.php';
require plugin_dir_path( __FILE__ ) . 'admin-form.php';


function run_wp_limmud_webapp_gen() {

    $plugin = new WebApp_Gen_Admin_Form();
    $plugin->init();

}
run_wp_limmud_webapp_gen();

