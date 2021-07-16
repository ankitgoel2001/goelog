<style>
   body{
        background-image: url('https://www.radooga.com/new/sandbox/wp-content/uploads/2017/10/hilltop-hideaway-free-stretch-blog-background-wood.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    #image-post{
        width: 200px;
        height:200px;
    }
</style>
<section>
    <div class = "container" id = "image">
        <article class= "blog-post" align = "center">
            <h1><?= $post['title'] ?></h1>
            <h4><?= $post['likes'] ?> likes</h4>
            
            <!--To display the like button-->
            <form action = "/like/incrementLikes" method = "post">
                <input type = "text" name = "id" value = "<?= $post['id']?>" hidden="true">
                <input type = "text" name = "likes" value = "<?= $post['likes']?>" hidden="true">
                <button  class="btn btn-info btn-lg" type="submit" value="Submit"><i class="far fa-thumbs-up"></i>Like</button>
            </form>
            <!-- To display when the post was created -->
            <div class = "details">
                Posted on: <?= date('M d Y', strtotime($post['created_at'])) ?> by <?= $post['name']?>
            </div>

            <!-- To display the post with the image -->
            <div class="card" style="width: 60rem; margin-left:150px;">
                <img id = "image-post" class="card-img-top" src = "/public/uploads/<?= $post['image'] ?>" alt = "Picture related to <?= $post['tag']  ?>" height = "200" width = "200" />
                <div class="card-body">
                    <p class="card-text"><?= $post['description']?></p>
                </div>
            </div>
        </article>
    </div>
 </section>