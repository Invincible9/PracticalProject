<?php $this->title = 'Create New Comment' ; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">

    <div class="container">

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea rows="10" class="form-control" name="comments_content" id="content" placeholder="Enter content"></textarea>
    </div>

    <div><button type="submit" class="btn btn-primary">Create</button>
        <a href="<?=APP_ROOT?>/">[Cancel]</a></div>
      </div>



</form>