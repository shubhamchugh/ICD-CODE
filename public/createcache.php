<?php

$path =  shell_exec('cd .. && pwd');
$UserName =  trim(shell_exec('whoami'));
echo "<pre>";
$ownership_fix_command = 'sudo chown -R '.$UserName.':'.$UserName.' '.$path;
$file_permissions_command = 'sudo chmod 755 -R '.$path;

print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));

echo "<h2>Cache Create Output</h2>";
$view_cache = shell_exec('cd .. && php artisan view:cache');
$route_cache = shell_exec('cd .. && php artisan route:cache');
$event_cache = shell_exec('cd .. && php artisan event:cache');
$config_cache = shell_exec('cd .. && php artisan config:cache');


echo $view_cache;
echo $route_cache;
echo $event_cache;
echo $config_cache;

print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));

echo '<strong>Last Reboot: </strong>' . shell_exec('who -b');