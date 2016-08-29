

<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Content</th>
                <th>Date</th>
                <th>Post_ID</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php foreach ($this->posts as $post) : ?>
                <tr>
                    <td><?=cutLongText($post['text']) ?></td>
                    <td><?=htmlspecialchars($post['date']) ?></td>
                    <td><?=htmlspecialchars($post['post_id']) ?></td>

<!--                    <td><a href="--><?//=APP_ROOT?><!--/posts/editAdminPost/--><?//= htmlspecialchars($post['id'])?><!--">[EDIT]</a></td>-->
<!--                    <td><a href="--><?//=APP_ROOT?><!--/posts/deleteAdminPost/--><?//= htmlspecialchars($post['id'])?><!--">[DELETE]</a></td>-->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <p><a href="<?=APP_ROOT?>/comments/mycomments/"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>
</main>
