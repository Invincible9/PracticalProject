<?php $this->title = 'Welcome to My Blog'; ?>

<h1 style="text-align: center"><?=htmlspecialchars($this->title)?></h1>

<hr />

<div class="container">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>EDIT</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($this->users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?=htmlspecialchars($user['username']) ?></td>
                    <td><?=htmlspecialchars($user['full_name']) ?></td>
                    <td><a href="<?=APP_ROOT?>/users/edit/<?= $user['id']?>">[EDIT]</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>