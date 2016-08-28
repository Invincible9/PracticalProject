<?php $this->title = 'Login'; ?>

<h1 style="margin: 30px"><?= htmlspecialchars($this->title) ?></h1>


<form method="post">

    <div class="container">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="username" class="form-control" name="username" id="username" placeholder="Enter username" onkeyup="showHint(this.value)" />

        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<!--<p style="red">Username: <span id="user"></span></p>-->
<!--<div id="user" style="border: 1px dashed blue; border-radius: 3px; width: 350px"></div>-->



