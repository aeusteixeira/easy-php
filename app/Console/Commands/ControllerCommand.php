<?php

namespace App\Console\Commands;

class ControllerCommand extends Command{

    private $controller;
    protected $path = 'app/Controller/';
    protected $type = 'Controller';

    public function handle($name)
    {
        $this->generate($name);
        echo "Controller criado com sucesso!";
    }

    public function generate($name){
        $view = 'view';
        $viewRender = 'view()->render()';
        $this->controller = "<?php\n\n";
        $this->controller .= "namespace App\Controller;\n\n";
        $this->controller .= "use Exception;\n";
        $this->controller .= "use App\View\View;\n\n";
        $this->controller .= "class {$name}Controller{\n\n";
        $this->controller .= "\tpublic function index(){\n";
        $this->controller .= "\t\t$$view = new View('site/{$name}/index.phtml');\n";
        $this->controller .= "\t\treturn $$viewRender;\n";
        $this->controller .= "\t}\n";
        $this->controller .= "}\n";
        
        return $this->createFile($name, $this->controller);
    }

}