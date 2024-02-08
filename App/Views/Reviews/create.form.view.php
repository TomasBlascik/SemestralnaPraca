<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
?>

<form method="post" action="?c=reviews&a=store">
    <?php if ($data['review']->getId()) { ?>
        <input type="hidden" name="id" value="<?= $data['review']->getId() ?>">
        <input type="hidden" name="authorId" value="<?= $data['review']->getAuthorId() ?>">
    <?php } else { ?>
        <input type="hidden" name="authorId" value="<?= $auth->getLoggedUserId() ?>">
    <?php } ?>

    <div class="mb-3">
        <label for="inputReviewTitle" class="form-label">Title</label>
            <input id="inputReviewTitle" type ='text' name="title" value="<?= $data['review']->getTitle() ?>" class="form-control">
    </div>
    <!--title errors-->
    <?php if (!is_null(@($data['errorsTitle']))):
        foreach ($data['errorsTitle'] as $errorTitle): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorTitle ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--title errors end-->

    <div class="mb-3">
        <label for="textareaReviewContent" class="form-label">Content</label>
        <textarea id="textareaReviewContent" name="content" class="form-control" rows="20"><?= $data['review']->getContent() ?></textarea>
    </div>
    <!--content errors-->
    <?php if (!is_null(@($data['errorsContent']))):
        foreach ($data['errorsContent'] as $errorContent): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorContent ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--content errors end-->

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

