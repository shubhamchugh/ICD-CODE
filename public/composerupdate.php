<?php

echo "<pre>";
echo "<h2>Composer update</h2>";
echo shell_exec('cd .. && COMPOSER_MEMORY_LIMIT=-1 composer update');
die;