<?php
use App\Models\Review;
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<?php if ($auth->isLogged() && $auth->getLoggedUserName() == "admin") { ?>
<div class="text-center">
    <a href = "<?= $link->url("reviews.create") ?>" class = "btn btn-success btn-lg">Add new</a>
</div>
<?php } ?>

<?php
/** @var Review[] $data */
foreach ($data as $review) { ?>
    <div class="card text-center text-white bg-dark">
        <div class="card-body">
            <h5 class="card-title"><?php echo $review->getTitle() ?></h5>
            <p class="card-text"><?php echo $review->getContent() ?></p>
            <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "admin") { ?>
                <a href = "?c=reviews&a=delete&id=<?php echo $review->getId() ?>" class = "btn btn-danger">Delete</a>
                <a href = "?c=reviews&a=edit&id=<?php echo $review->getId() ?>" class = "btn btn-warning">Edit</a>
            <?php } ?>
        </div>
        <div class="card-footer text-light">
            Author: <?php echo $review->getAuthorName() ?>
        </div>
    </div>
    <br>
<?php } ?>
