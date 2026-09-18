<?php

use CodeIgniter\Boot;
use Config\Paths;

/*
 * InfinityFree front controller.
 * This file is intentionally placed in htdocs with the app, system, and
 * writable folders so the project can be uploaded without changing server
 * document-root settings.
 */
$minPhpVersion = '8.2';

if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    header('HTTP/1.1 503 Service Unavailable', true, 503);
    exit('This website requires PHP ' . $minPhpVersion . ' or newer.');
}

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

require FCPATH . 'app/Config/Paths.php';

$paths = new Paths();

require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));
