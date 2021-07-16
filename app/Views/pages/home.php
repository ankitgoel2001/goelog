<style>
    #box {
        width: 300px;
        padding: 50px;
        margin: 20px;
        background-color: lightblue;
        opacity: 50%
    }

    body {
        background-image: url('https://www.radooga.com/new/sandbox/wp-content/uploads/2017/10/hilltop-hideaway-free-stretch-blog-background-wood.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    #image{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    #button {
        margin-top: 10px;
    }

    #card-body {
        background-color: white;
    }

    tr, td {
        padding: 15px;
    }
}

</style>

<section>
    <?php
    $session = \Config\Services::session();
    ?>
    <?php if (isset($session->success)): ?>
        <div class = "alert alert-success text-center alert-dismissible fade show mb-0" role = "0">
            <?= $session->success ?>
        </div>
        <?php endif; ?>
        <div class="jumbotron">
    <div class = "container">
        <h1 class="display-4">Goelog</h1>
            <p class="lead">Welcome to the place where you can view and share posts! Start goelogging now!</p>
            <hr class="my-4">
    </div>
</div>
<section>
    <?php if (!$show_pagination): ?>
    <h3 align = "center">Top 5 posts!</h3>
    <?php endif; ?>
</section>
</section>
<section>
    <?php if ($show_pagination): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($page_number = 1; $page_number <= $num_pages; $page_number++): ?>
            <li class="page-item"><a class="page-link" href="/blog/all/<?= $page_number ?>"><?= $page_number ?></a></li>
            <?php endfor; ?>
        </ul>
   </nav>
    <?php endif; ?>
</section>
<section>
    <div class = "container" id = "container">
        <?php $counter = 1 ?>
        <?php $router = 2 ?>
        <?php if ($news): ?>
            <table>
            <tr>
            <?php foreach ($news as $newsItem): ?>
                <td><div class="card " style="width: 18rem;">
                    <div class="card-header">
                            <?=$newsItem['likes']?> Likes
                    </div>
                    <div class="card-body" id = "card-body">
                        <h5 class="card-title"><?=$newsItem['title']?></h5>
                        <image id = "image" src = "/public/uploads/<?= $newsItem['image']?>" alt = "Picture related to <?= $newsItem['tag']  ?>" height = "200" width = "200"/>
                         <a href="/blog/<?= $newsItem['id'] ?>" class="btn btn-primary" id = "button">View post</a>
                    </div>
                </div>
            </td>
            <!-- To display post to next row to maintain 3 posts at a time-->
            <?php if ($counter % 3 == 0): ?>
                </tr><tr>
            <?php endif; ?>
            <?php $counter += 1?>
            <?php endforeach; ?>
            </tr>
            </table>
        <?php else: ?>
            <p class = "text-center">No posts have been found</p>
        <?php endif; ?>
        
    </div>
</section>
