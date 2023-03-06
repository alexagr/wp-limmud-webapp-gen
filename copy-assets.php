<?php

/**
 * copy WebApp assets
 */

function recursive_copy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while ($file = readdir($dir)) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recursive_copy($src . '/' . $file, $dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function webapp_name()
{
    $config = get_option('webapp-gen-config');
    return isset($config['app_name']) ? $config['app_name'] : '';
}

function webapp_path($app_name)
{
    $path = ABSPATH;
    $config = get_option('webapp-gen-advanced');
    if (isset($config['webapp_folder'])) {
        $path .= $config['webapp_folder'];
    } else {
        $path .= '/webapp';
    } 

    if (!empty($app_name)) {
        $path .= '/' . $app_name;
    }
    return $path;
}

function copy_assets($conditional)
{
    $app_name = webapp_name();
    if (empty($app_name)) {
        return 'ERROR: App Name is not configured';
    }

    if ($conditional && file_exists(webapp_path($app_name) . '/assets/css/schedule.css')) {
        return '';
    }
    
    @mkdir(webapp_path(''));
    @mkdir(webapp_path($app_name));
    recursive_copy(__DIR__ . '/webapp/assets', webapp_path($app_name) . '/assets');
    if (!is_dir(webapp_path($app_name) . '/assets')) {
        return 'ERROR: failed to copy assets';
    }
    return '';
}
