<?php $this->title = $this->posts['title']; ?>

<main>

    <div class="container">
        <table class="table table-condensed">
                <tr>
                <h1><?=htmlspecialchars($this->posts['title'])?></h1>

                <p>
                    <i>Posted on</i>
                    <?=htmlspecialchars($this->posts['date'])?>
                    <i>by</i>
                    <?=htmlspecialchars($this->posts['username'])?>
                </p>

                <p><?=$this->post['content']?></p>
                </tr>
            </div>
    </div>
</main>