

<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Content</th>
                <th>Title</th>
                <th>Username</th>
                <th>Date</th>
<!--                <th>EDIT</th>-->
<!--                <th>DELETE</th>-->
            </tr>

            <?php foreach ($this->comments as $comment) : ?>
                <tr>
                    <td><?=cutLongText($comment['text']) ?></td>
                    <td><?=cutLongText($comment['title']) ?></td>
                    <td><?=cutLongText($comment['username']) ?></td>
                    <td><?=htmlspecialchars($comment['date']) ?></td>

<!--                    <td><a href="--><?//=APP_ROOT?><!--/posts/editAdminPost/--><?//= htmlspecialchars($post['id'])?><!--">[EDIT]</a></td>-->
<!--                    <td><a href="--><?//=APP_ROOT?><!--/posts/deleteAdminPost/--><?//= htmlspecialchars($post['id'])?><!--">[DELETE]</a></td>-->
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <p><a href="<?=APP_ROOT?>/comments/mycomments/"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>
</main>
