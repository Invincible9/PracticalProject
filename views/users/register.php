<?php $this->title = 'Register'; ?>
<h1 style="margin: 30px"><?= htmlspecialchars($this->title) ?></h1>


<form method="post">
    <div class="container">

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" class="form-control" name="password_confirm" id="confirm-password" placeholder="Enter confirm-password">
            </div>
<!--            <div class="form-group">-->
<!--                <label for="email">Email:</label>-->
<!--                <input type="email" class="form-control" id="email" placeholder="Enter email">-->
<!--            </div>-->
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="fullname" class="form-control" name="full_name" id="fullname" placeholder="Enter fullname">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
<!--        </form>-->
    </div>


</form>