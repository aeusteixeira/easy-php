<?php 

namespace App\Console;

class Kernel{

    private $argv;
    private $command;
    private $name;

    public function __construct($argv){
        $this->argv = $argv;
        $this->command = explode(':', $this->argv[1])[1];
        $this->name = $this->argv[2];
        $this->handle();
    }

    public function handle(){
        $class = 'App\\Console\\Commands\\' . ucfirst($this->command) . 'Command';
        if(class_exists($class)){
            $command = new $class();
            $command->handle($this->name);
        }else{
            echo "Command not found";
        }
    }

}