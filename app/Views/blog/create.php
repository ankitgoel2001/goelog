<style>
     body {
        background-image: url('https://www.radooga.com/new/sandbox/wp-content/uploads/2017/10/hilltop-hideaway-free-stretch-blog-background-wood.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
</style>
<div class = "container">
    <h1>Create new post</h1>
    <!-- Validation to check if posts has been made successfully-->
    <?php if ($_POST): ?>
        <?= \Config\Services::validation()->listErrors() ?>
    <?php endif; ?>
    
    <!-- To create the blog form for posting-->
    <form class = " " action = "/blog/create" method ="post" enctype="multipart/form-data">
        <div class = "form-group">
            <!--The user's name -->
            <label for = "name">Name (optional):</label>
            <!-- The post's title -->
            <input type = "text" class = "form-control" name = "name" id = "name" value = "Anonymous">
            <label for = "change">Title:</label>
            <input type = "text" class = "form-control" name = "title" id = "title" value = "">
            <!-- The post's description -->
            <label for = "body"><strong>Description:</strong></label>
            <textarea class = "form-control" name="description" id = "body"></textarea>
            <br>
            <!--The post's drop down list for selecting category of post -->
            <p>Tag:</p>
            <select name="tag">
                <option value = "Fashion">Fashion</option>
                <option value = "Food">Food</option>
                <option value = "Travel">Travel</option>
                <option value = "Music">Music</option>
                <option value = "Lifestyle">Lifestyle</option>
                <option value = "Fitness">Fitness</option>
                <option value = "sports">Sports</option>
                <option value = "DIY">DIY</option>
            </select>
            <br><br>
            <!-- To select the posts image -->
            <label for="img">Select image:</label>
            <input type="file" name="userfile" />
            <div class = "form-group">
                <button type = "submit" class = "btn- btn-primary">Create</button>
            </div>
        </div>
    </form>
 </div>