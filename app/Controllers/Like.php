<?php

namespace App\Controllers;

use App\Models\blogmodel;

//Storing the number of likes in each post 
class Like extends BaseController
{
    /*Function to increment the number of likes when the like button is clicked in the form */
    function incrementLikes()
    {
        helper('form');

        $model = new blogmodel();
        $model
              ->where(['id' => $this->request->getVar('id')])
              ->set(['likes' => $this->request->getVar('likes') + 1])
              ->update();
        return redirect()->to('/blog/'.$this->request->getVar('id')); //to redirect to same page 
    }
}
