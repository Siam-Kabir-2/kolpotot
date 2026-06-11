<?php
declare(strict_types=1);

define('DB_HOST', getenv('KOLPOPOT_DB_HOST') ?: '127.0.0.1');
define('DB_PORT', getenv('KOLPOPOT_DB_PORT') ?: '3306');
define('DB_NAME', getenv('KOLPOPOT_DB_NAME') ?: 'kolpopot');
define('DB_USER', getenv('KOLPOPOT_DB_USER') ?: 'root');
define('DB_PASS', getenv('KOLPOPOT_DB_PASS') ?: '');
define('DB_CHARSET', 'utf8mb4');