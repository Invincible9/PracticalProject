<?php $this->title = 'Welcome to My Blog'; ?>

<h1 style="text-align: center"><?=htmlspecialchars($this->title)?></h1>

<!-- TODO: display the posts here -->
<hr />

<aside>
    <h2>Recent Posts</h2>
    <?php foreach ($this->postsSideBar as $post) : ?>
        <a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?=htmlspecialchars($post['title'])?></a>
    <?php endforeach; ?>
</aside>

<main>

    <div class="container">
        <table class="table table-condensed">
            <tr>

                <?php foreach ($this->posts as $post) : ?>

                     <h1><?= htmlspecialchars($post['title'])?></h1>
                        <p><u>
                            <i>Posted on</i>
                            <?= htmlspecialchars($post['date'])?>
                            <i>by</i>
                            <?= htmlspecialchars($post['username'])?>
                            </u>
                        </p>

                     <p><?=cutLongText1($post['content'])?></p>

                <span style="color:RED; text-align: center; float: left"><a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><button>View Comments</button></a></div></span>

                    <?php if($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
                        <span style="color:RED; text-align: center; float: right"><a href="<?=APP_ROOT?>/posts/createAdminComment/<?=$post['id']?>"><button>Add Comment</button></a></div></span>
                    <?php } else if($this->isLoggedIn && !$_SESSION['isAdmin']) {?>
                        <span style="color:RED; text-align: center; float: right"><a href="<?=APP_ROOT?>/posts/createUserComment/<?=$post['id']?>"><button>Add Comment</button></a></div></span>
                    <?php } else { ?>

                    <?php }  ?>
    <br />
                     <hr />

                <?php endforeach; ?>


            </tr>
        </table>


    </div>


</main>


