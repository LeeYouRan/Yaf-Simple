<?php
/**
 * Created PhpStorm.
 * User:
 * Date: 2020-11-19
 * File: cli.php
 * Desc: Cli 模式入口文件
 */
php_sapi_name() == 'cli' or exit('no authority.');

// 定义应用目录
define("APP_PATH", dirname(dirname(__FILE__)));

$application = new Yaf_Application(APP_PATH . "/conf/app.ini");

if ($argc < 2 || empty($file = ($argv[1] ?? ''))) {
    exit("  usage: php cli.php <[namespace]class>/<method> [params_json]\nexample: php cli.php once/Demo/execute '{\"class\": \"Demo\", \"method\": \"execute\"}'");
}

$parseClass = explode('/', $file);

$method = array_pop($parseClass);

if (!empty($json = ($argv[2] ?? '')) && !$param = json_decode($json, true)) {
    exit(sprintf('%s decode error: %s.', $json, json_last_error_msg()));
}

$nameSpaceClass = "app\\cli\\" . implode('\\', $parseClass);

$application->bootstrap()->execute([new $nameSpaceClass(), $method], $param ?? []);