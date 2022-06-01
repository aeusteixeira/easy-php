<?php

namespace App\Controller;

use Exception;
use App\View\View;

class TaskController{

	public function index(){
		$view = new View('site/Task/index.phtml');
		return $view()->render();
	}
}
