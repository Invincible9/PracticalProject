<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="<?=APP_ROOT?>/content/style1.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/bootstrap.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/bootstrap-theme.css" />

    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/script.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>


    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <div class="font">
        <div class="picture">
            <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/Blog-logo1.jpg"></a>
                <?php if($this->isLoggedIn) { ?>

                        <div class="buttonLogOut">
                            <a href="<?=APP_ROOT?>/users/logout"><button class="buttonStyle" type="button">Logout</button></a>
                        </div>
                        <div class="greeting">
                            Welcome, <b><?= htmlspecialchars($_SESSION['username']); ?></b>
                        </div>

                <?php } ?>
        </div>
    </div>
        <div class="font1">
        <ul class="topnav" id="myTopnav">
            <li><a href="<?=APP_ROOT?>/">Home</a></li>

            <?php if ($this->isLoggedIn && (!$_SESSION['isAdmin'])) { ?>
                <li><a href="<?=APP_ROOT?>/users/myposts" >MyPosts</a></li>
                <li><a href="<?=APP_ROOT?>/posts/create" >Create Posts</a></li>

            <?php } else if ($this->isLoggedIn && $_SESSION['isAdmin']) { ?>
                <li><a href = "<?=APP_ROOT?>/posts" > Posts</a ></li >
                <li><a href = "<?=APP_ROOT?>/admins" > Users</a ></li >
                <li><a href="<?=APP_ROOT?>/posts/create" >Create Posts</a></li>

            <?php } else { ?>
                <li><a href="<?=APP_ROOT?>/users/login">Login</a></li>
                <li><a href="<?=APP_ROOT?>/users/register">Register</a></li>
                <li class="icon">
                    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">&#9776;</a>
                </li>
            <?php } ?>
         </ul>
        </div>

</header>


<?php include_once "messages.php" ?>