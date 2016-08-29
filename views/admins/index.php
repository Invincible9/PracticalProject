<?php $this->title = 'Welcome to My Blog'; ?>

<h1 style="text-align: center"><?=htmlspecialchars($this->title)?></h1>

<hr />
<div class="container">
    <table class="table table-condensed">
        <thead>
            <th>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>IsAdmin</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($this->admins as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?=htmlspecialchars($user['username']) ?></td>
                    <td><?=htmlspecialchars($user['full_name']) ?></td>
                    <td><?=htmlspecialchars($user['isAdmin']) ?></td>
                    <td><a href="<?=APP_ROOT?>/admins/editUser/<?= $user['id']?>">[EDIT]</a></td>
                    <td><a href="<?=APP_ROOT?>/admins/deleteUser/<?= $user['id']?>">[DELETE]</a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>