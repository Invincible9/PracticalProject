<main>
    <div class="container">
        <table class="table table-condensed">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>EDIT</th>
                <th>DELETE</th>
<!--                <th>SHOW COMMENTS</th>-->
            </tr>
            <?php foreach ($this->posts as $post) : ?>
    <tr>
        <td><?=cutLongText2($post['title']) ?></td>
        <td><?=cutLongText2($post['content']) ?></td>
        <td><?=htmlspecialchars($post['date']) ?></td>

        <td><a href="<?=APP_ROOT?>/posts/editAdminPost/<?= htmlspecialchars($post['id'])?>">[EDIT]</a></td>
        <td><a href="<?=APP_ROOT?>/posts/deleteAdminPost/<?= htmlspecialchars($post['id'])?>">[DELETE]</a></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
    <span style="color:RED; text-align: center; float: left; margin-left: 50px"><a href="<?=APP_ROOT?>/"><button>Back</button></a></span>
<p style="float: right; margin-right: 50px"><a href="<?=APP_ROOT?>/posts/createAdminPost/"><button type="button" class="createNewPost">CREATE NEW POST</button></a></p>
</main>
