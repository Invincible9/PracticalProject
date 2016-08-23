<?php $this->title = 'Edit Existing Post' ; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">

    <div class="container">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?=htmlspecialchars($this->user['username'])?>" />
                </div>
                <div class="form-group">
                    <label for="pwd">User Full Name:</label>
                    <input type="text" class="form-control" name="full_name" id="pwd" value="<?=htmlspecialchars($this->user['full_name'])?>" />
                </div>
                <div><button type="submit" class="btn btn-primary">Edit</button>
                    <a href="<?=APP_ROOT?>/users">[Cancel]</a>
                </div>
    </div>

</form>