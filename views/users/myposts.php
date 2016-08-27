<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php foreach ($this->posts as $post) : ?>
    <tr>
        <td><?=htmlspecialchars($post['title']) ?></td>
        <td><?=cutLongText($post['content']) ?></td>
        <td><?=htmlspecialchars($post['date']) ?></td>

        <td><a href="<?=APP_ROOT?>/posts/editUserPost/<?= htmlspecialchars($post['id'])?>">[EDIT]</a></td>
        <td><a href="<?=APP_ROOT?>/posts/deleteUserPost/<?= htmlspecialchars($post['id'])?>">[DELETE]</a></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
<p><a href="<?=APP_ROOT?>/posts/createUserPost"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>
</main>
