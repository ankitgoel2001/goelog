<?php

namespace App\Controllers;

use App\Models\blogmodel;

//saving to database after pressing submit to form
class Blog extends BaseController
{
    /*Function is retrieveing the post from its ID */
    function post($id)
    {
        $model = new blogmodel();
        $data['post'] = $model->getPosts($id); //to retrieve the post from the databse based on ID

        //to view the header, post and footer files
        echo view('templates/header', $data);
        echo view('blog/post');
        echo view('templates/footer');
    }

    /*Function to view all posts*/
    public function all($page_number)
	{
        $model = new blogmodel();
        $data['news'] = $model->getAllPostsByCreateTime($page_number); //to get all posts and store it in news
        $data['num_pages'] = (int)(($model->getNumPosts() - 1) / 10) + 1; //to calculate which page is stored where for pagination
        $data['show_pagination'] = true; //to display pagination where we can view all posts

        //to view the header, post and footer files
		echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
	}

    /*Function to save a post to the database after submitting the form */
    function create()
    {
        helper('form');
        $model = new blogmodel();

        //To check if the textbox is not empty and length of text are within specific range
        if (! $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'tag' => 'required',
        ])) { 
            echo view('templates/header');
            echo view('blog/create');
            echo view('templates/footer');
        }else{
            $file = $this->request->getFile('userfile');
            //to upload image to public file if image is uploaded
            if ($file->isValid()) {
                $file->move('public/uploads');
            }
            //to save row to database with their keys
            $model->save(
                [
                    'title' => $this->request->getVar('title'),
                    'description' => $this->request->getVar('description'),
                    'tag' => $this->request->getVar('tag'),
                    'image'=> $file->getName(),
                    'name' => $this->request->getVar('name')
                ]
                );
                $session = \Config\Services::session();
                $session->setFlashdata('success', 'New post was successfully created');
                return redirect()->to('/'); //to go back to home page
        }
    }
}