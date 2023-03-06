<?php

/**
 * get Google API token
 */

function google_client()
{
    $client = new Google_Client();
    $client->setApplicationName('Limmud WebApp Generator');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
    $client->setRedirectUri(webapp_gen_view_pagename('connect'));
    $client->setAuthConfig(get_option('webapp-gen-api'));
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    return $client;
}

function create_auth_url()
{

    $client = google_client();
    return $client->createAuthUrl();
}

function fetch_access_token($code)
{
    $client = google_client();

    $authCode = trim($code);
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);
    if (array_key_exists('error', $accessToken)) {
        return 'ERROR: ' . join(', ', $accessToken);
    }

    update_option('webapp-gen-token', $client->getAccessToken());
    return '';
}

function token_status()
{
    $token = get_option('webapp-gen-token');
    if (isset($token['access_token'])) {
        return 'exists';
    } else {
        return 'missing';
    }
}

function get_client()
{
    $token = get_option('webapp-gen-token');
    if (!isset($token['access_token'])) {
        return null;
    }

    $client = google_client();
    $client->setAccessToken($token);

    if ($client->isAccessTokenExpired()) {
        $refresh_token = $client->getRefreshToken();
        if ($refresh_token) {
            $token = $client->fetchAccessTokenWithRefreshToken($refresh_token);
            if (!array_key_exists('refresh_token', $token)) {
                $token['refresh_token'] = $refresh_token;
            }
            $client->setAccessToken($token);
        } else {
            return null;
        }
        update_option('webapp-gen-token', $client->getAccessToken());
    }
    
    return $client;
}
