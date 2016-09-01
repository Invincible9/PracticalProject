<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Author</th>
                <?php if($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
                <th>EDIT</th>
                <th>DELETE</th>
                <th>CREATE COMMENT</th>
                <?php } else { ?>
                    <th>CREATE COMMENT</th>
                <?php }  ?>
            </tr>
            <?php foreach ($this->posts as $post) : ?>
                <tr>
                    <td><?=htmlspecialchars($post['id']) ?></td>
                    <td><?=cutLongText2($post['title']) ?></td>
                    <td><?=cutLongText2($post['content']) ?></td>
                    <td><?=htmlspecialchars($post['date']) ?></td>
                    <td><?=htmlspecialchars($post['username']) ?></td>

                    <?php if($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
                    <td><a href="<?=APP_ROOT?>/posts/edit/<?= htmlspecialchars($post['id'])?>">[EDIT]</a></td>
                    <td><a href="<?=APP_ROOT?>/posts/delete/<?= htmlspecialchars($post['id'])?>">[DELETE]</a></td>
                    <?php }  ?>

                    <?php if($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
                    <td><a href="<?=APP_ROOT?>/posts/createAdminComment/<?= htmlspecialchars($post['id'])?>">[CREATE COMMENT]</a></td>
                    <?php } else  {?>
                        <td><a href="<?=APP_ROOT?>/posts/createUserComment/<?= htmlspecialchars($post['id'])?>">[CREATE COMMENT]</a></td>
                    <?php }  ?>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <span style="color:RED; text-align: center; float: left; margin-left: 100px"><a href="<?=APP_ROOT?>/"><button>Back</button></a></span>
    <p style="float: right; margin-right: 110px"><a href="<?=APP_ROOT?>/posts/createAdminPost/<?= htmlspecialchars($post['id'])?>"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>

    <br />
</main>
