<?php namespace App\Models;

use CodeIgniter\Model;

//getting from database
class blogmodel extends Model 
{
    protected $table = 'posts';
    protected $allowedFields = ['title', 'id', 'description', 'likes', 'tag', 'image', 'name']; //store the databse fields
    
    /*Function to get all the posts and sort them in descending order*/
    public function getPosts($id = null)
    {
        if(!$id)
        {
            return $this->orderBy('likes', 'desc')->findAll(5);
        }
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    /*Function to posts only 9 pages in 1 page and the remaning go to the next pagea */
    function getAllPostsByCreateTime($page_number)
    {
        return $this->orderBy('created_at', 'desc')->findAll(9, 10 * ($page_number - 1));
    }

    /*Function to get the number of posts*/
    function getNumPosts()
    {
        $num_posts = $this->asArray()->countAll();
        return $num_posts;
    }
}