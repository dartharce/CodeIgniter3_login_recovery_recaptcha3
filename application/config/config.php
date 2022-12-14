<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!defined('APP_URL')){ define('APP_URL', ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . "://{$_SERVER['SERVER_NAME']}".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));  }

$config['base_url']                 = APP_URL;
$config['index_page']               = '';
$config['uri_protocol']             = 'REQUEST_URI';
$config['url_suffix']               = '.html';
$config['language']                 = 'spanish';
$config['charset']                  = 'UTF-8';
$config['enable_hooks']             = FALSE;
$config['subclass_prefix']          = 'Base_';
$config['composer_autoload']        = FALSE;
$config['permitted_uri_chars']      = 'a-z 0-9~%.:_\-';
$config['enable_query_strings']     = FALSE;
$config['controller_trigger']       = 'c';
$config['function_trigger']         = 'm';
$config['directory_trigger']        = 'd';
$config['allow_get_array']          = TRUE;
$config['log_threshold']            = 0;
$config['log_path']                 = '';
$config['log_file_extension']       = '';
$config['log_file_permissions']     = 0644;
$config['log_date_format']          = 'Y-m-d H:i:s';
$config['error_views_path']         = '';
$config['cache_path']               = '';
$config['cache_query_string']       = FALSE;
$config['encryption_key']           = '';
$config['sess_driver']              = 'files';
$config['sess_cookie_name']         = 'ci_session';
//$config['sess_expiration']          = 7200;
$config['sess_expiration']          = 0;
$config['sess_save_path']           = NULL;
$config['sess_match_ip']            = TRUE;
$config['sess_time_to_update']      = 300;
$config['sess_regenerate_destroy']  = FALSE;
$config['cookie_prefix']            = '';
$config['cookie_domain']            = '';
$config['cookie_path']              = '/';
$config['cookie_secure']            = FALSE;
$config['cookie_httponly']          = FALSE;
$config['standardize_newlines']     = FALSE;
$config['global_xss_filtering']     = FALSE;
$config['csrf_protection']          = FALSE;
$config['csrf_token_name']          = 'csrf_test_name';
$config['csrf_cookie_name']         = 'csrf_cookie_name';
$config['csrf_expire']              = 7200;
$config['csrf_regenerate']          = TRUE;
$config['csrf_exclude_uris']        = array();
$config['compress_output']          = FALSE;
$config['time_reference']           = 'local';
$config['rewrite_short_tags']       = FALSE;
$config['proxy_ips']                = '';
$config['url_version']              = '?v='.substr(uniqid(rand(), TRUE),0,10).date('Y').date('m').date('d').date('H').date('i').date('s');
$config['google_key']               = '6Ld-VEQiAAAAABny-SWBgabXrBnvtsKQ7mGoxxAn';
$config['google_secret']            = '6Ld-VEQiAAAAAIot3dDoDWVeJSzeUcDsD20rfklp';
$config['google_url']               = 'https://www.google.com/recaptcha/api/siteverify';