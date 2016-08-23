<?php $this->title = 'Create New Post' ; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">

    <div class="container">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="post_title" id="title" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea rows="10" class="form-control" name="post_content" id="content" placeholder="Enter content"></textarea>
    </div>

    <div><button type="submit" class="btn btn-primary">Create</button>
        <a href="<?=APP_ROOT?>/posts">[Cancel]</a></div>
      </div>

</form>