<?php

namespace App\Console\Commands;

class ControllerCommand extends Command{

    private $controller;
    protected $path = 'app/Controller/';

    public function handle($name)
    {
        $this->generate($name);
        echo "Controller criado com sucesso!";
    }

    public function generate($name){
        $this->controller = "<?php\n\n";
        $this->controller .= "namespace App\Controller;\n\n";
        $this->controller .= "use Exception;\n";
        $this->controller .= "use App\View\View;\n\n";
        $this->controller .= "class {$name}Controller{\n\n";
        $this->controller .= "\tpublic function index(){\n";
        $this->controller .= "\t\t//\n";
        $this->controller .= "\t}\n";
        $this->controller .= "}\n";
        
        return $this->createFile($name, $this->controller);
    }

}