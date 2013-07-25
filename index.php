<?php

//architecture mvc par yamisaaf merci de respecter
define('START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE', __DIR__ . DS);
define('EXT', '.php');
define('DEBUG', true); // mettez false si vous étes pas en fase de codage
require BASE . 'system' . DS . 'base' . EXT;
$base = new base();
if (DEBUG) {
    $base->load->debugClass();
}
echo 'Page generee en ' . round(microtime(true) - START_TIME, 5) . ' secondes';