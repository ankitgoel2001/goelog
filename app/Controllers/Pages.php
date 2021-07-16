<?php

namespace App\Controllers;
use App\Models\blogmodel;

class Pages extends BaseController
{
    /*Function to view pages at home page */
	public function index()
	{
        $model = new blogmodel();
        $data['show_pagination'] = false;
        $data['news'] = $model->getPosts();
		echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
	}
    
    /*Function to throw a 404 exception if page is not found */
    function showme($page = "home")
    {
        if (!is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('templates/header');
        echo view('pages/'.$page);
        echo view('templates/footer');
    }
}
