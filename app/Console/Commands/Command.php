<?php

namespace App\Console\Commands;

class Command{

    protected $path;

    protected function createFile($file, $content){
        $file = fopen($this->path . ucfirst($file) . 'Controller' . '.php', 'wb');
        fwrite($file, $content);
        fclose($file);
    }

}