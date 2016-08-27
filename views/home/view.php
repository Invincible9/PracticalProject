<?php $this->title = $this->post['title']; ?>

<main>

    <div class="container">
        <table class="table table-condensed">
                <tr>
                <h1><?=htmlspecialchars($this->post['title'])?></h1>

                <p>
                    <i>Posted on</i>
                    <?=htmlspecialchars($this->post['date'])?>
                    <i>by</i>
                    <?=htmlspecialchars($this->post['username'])?>
                </p>

                <p><?=$this->post['content']?></p>
                </tr>
            </div>
    </div>
</main>