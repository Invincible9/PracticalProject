<?php $this->title = 'Delete Comment'; ?>

<h1 style="margin: 30px"><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div class="container">


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="comment_title" id="title" disabled value="<?=htmlspecialchars($this->comments[0]['title'])?>"/>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea rows="10" class="form-control" name="comment_content" id="content" disabled><?=htmlspecialchars($this->comments[0]['text'])?></textarea>
        </div>

        <div class="form-group">
            <label for="content">Date (yyyy-MM-dd hh:mm:ss):</label>
            <input type="text" class="form-control" name="comment_date" id="pwd" disabled value="<?=htmlspecialchars($this->comments[0]['date'])?>" />
        </div>

        <div><button type="submit" class="btn btn-primary">Delete</button>
            <a href="<?=APP_ROOT?>/users/mycomments/">[Cancel]</a>
        </div>


        <br />
</form>