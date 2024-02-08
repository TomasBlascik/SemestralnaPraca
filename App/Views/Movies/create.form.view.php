<?php
/** @var Array $data */
?>

<form method="post" action="?c=movies&a=store">
    <?php if ($data['movie']->getId()) { ?>
        <input type="hidden" name="id" value="<?= $data['movie']->getId() ?>">
    <?php } ?>

    <div class="mb-3">
        <label for="inputMovieName" class="form-label">Name</label>
        <input id="inputMovieName" type ='text' name="name" value="<?= $data['movie']->getName() ?>" class="form-control" required>
    </div>
    <!--name errors-->
    <?php if (!is_null(@($data['errorsName']))):
        foreach ($data['errorsName'] as $errorName): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorName ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--name errors end-->

    <div class="mb-3">
        <label for="inputMovieDirector" class="form-label">Director</label>
        <input id="inputMovieDirector" type = 'text' name="director" value="<?= $data['movie']->getDirector() ?>" class="form-control" required>
    </div>
    <!--director errors-->
    <?php if (!is_null(@($data['errorsDirector']))):
        foreach ($data['errorsDirector'] as $errorDirector): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorDirector ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--director errors end-->

    <div class="mb-3">
        <label for="inputMovieYear" class="form-label">Year</label>
        <input id="inputMovieYear" type = 'number' name="year" value="<?= $data['movie']->getYear() ?>" class="form-control" required>
    </div>
    <!--year errors-->
    <?php if (!is_null(@($data['errorsYear']))):
        foreach ($data['errorsYear'] as $errorYear): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorYear ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--year errors end-->

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

