<?php

spl_autoload_register(function ($class_name) {
    $class_file = str_replace(
        ["//", "\\"],
        "/",
        sprintf("%s/%s/%s.php", __DIR__,  "src", $class_name)
    );
    if (file_exists($class_file)) {
        include_once $class_file;
    }
});
