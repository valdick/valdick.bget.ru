<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {
    
    public $template = 'main';
    
	public function action_index()
	{
        View::bind_global('title', $title);
        $title = 'ТЗ';
	}
}
