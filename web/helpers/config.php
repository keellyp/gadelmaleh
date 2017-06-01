<?php
// Config
$config = array();
switch($_SERVER['HTTP_HOST'])
{
    case 'localhost':
    case 'localhost:8888':
        $config['debug'] = true;
        $config['db_host'] = 'localhost';
        $config['db_name'] = 'gadelmaleh';
        $config['db_user'] = 'root';
        $config['db_pass'] = 'root';
        break;

    case 'kellyphan.fr/gadelmaleh':
        $config['debug'] = false;
        $config['db_host'] = '';
        $config['db_name'] = '';
        $config['db_user'] = '';
        $config['db_pass'] = '';
        break;

    case 'monsite.com':
        $config['debug'] = false;
        $config['db_host'] = '';
        $config['db_name'] = '';
        $config['db_user'] = '';
        $config['db_pass'] = '';
        break;
}
