
<main>

    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
            </tr>
            <?php foreach ($this->posts as $post) : ?>
    <tr>
        <td><?=htmlspecialchars($post['title']) ?></td>
        <td><?=cutLongText($post['content']) ?></td>
        <td><?=htmlspecialchars($post['date']) ?></td>

        <td>
            <a href="<?=APP_ROOT?>/posts/edit/<?= htmlspecialchars($post['id'])?>">[EDIT]</a>
            <a href="<?=APP_ROOT?>/posts/delete/<?= htmlspecialchars($post['id'])?>">[DELETE]</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
<p><a href="<?=APP_ROOT?>/posts/create"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>
</main>
