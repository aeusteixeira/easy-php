<?php

namespace App\Console\Commands;

class Command{

    protected $path;
    protected $type;

    protected function createFile($file, $content){
        $file = fopen($this->path . ucfirst($file) . $this->type . '.php', 'wb');
        fwrite($file, $content);
        fclose($file);
    }

}