<?php

namespace App\Console\Commands;

class ModelCommand extends Command{

    private $model;
    protected $path = 'app/Models/';
    protected $type = '';

    public function handle($name)
    {
        $this->generate($name);
        echo "Model criado com sucesso!";
    }

    public function generate($name){
        $table = 'table';
        $tableName = strtolower($name);
        $this->model = "<?php\n\n";
        $this->model .= "namespace App\Model;\n\n";
        $this->model .= "use Exception;\n";
        $this->model .= "use App\Database\DataBase;\n\n";
        $this->model .= "class {$name}{\n";
        $this->model .= "\tprotected $$table = '{$tableName}s';\n";
        $this->model .= "}\n";
        
        return $this->createFile($name, $this->model);
    }

}