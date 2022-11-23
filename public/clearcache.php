<?php
$path =  shell_exec('cd .. && pwd');
$UserName =  trim(shell_exec('whoami'));

$ownership_fix_command = 'sudo chown -R '.$UserName.':'.$UserName.' '.$path;
$file_permissions_command = 'sudo chmod 755 -R '.$path;

echo "<pre>";
print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));

echo "<h2>Cache Clear Update Output</h2>";
$cache_clear = shell_exec('cd .. && php artisan cache:clear');
$clear_compiled = shell_exec('cd .. && php artisan clear-compiled');
$view_clear = shell_exec('cd .. && php artisan view:clear');
$route_clear = shell_exec('cd .. && php artisan route:clear');
$optimize_clear = shell_exec('cd .. && php artisan optimize:clear');
$event_clear = shell_exec('cd .. && php artisan event:clear');
$config_clear = shell_exec('cd .. && php artisan config:clear');
$debugbar = shell_exec('cd.. && php artisan debugbar:clear');

echo $cache_clear;
echo $cache_truncate;
echo $clear_compiled;
echo $view_clear;
echo $route_clear;
echo $optimize_clear;
echo $event_clear;
echo $config_clear;
echo $debugbar;

echo "<strong>logs removed</strong>";
print_r(shell_exec('cd .. && cd storage/logs && rm -rf *.log'));

print_r(shell_exec($ownership_fix_command));
print_r(shell_exec($file_permissions_command));



echo '<strong>Last Reboot: </strong>' . shell_exec('who -b');

die;