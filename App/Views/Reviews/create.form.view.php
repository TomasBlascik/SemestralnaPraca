<form method="post" action="?c=reviews&a=store">
    <?php
    /** @var \App\Core\IAuthenticator $auth */
    /** @var \App\Models\Review $data */
    if ($data->getId()) { ?>
        <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
        <input type="hidden" name="authorId" value="<?php echo $data->getAuthorId() ?>">
    <?php } else { ?>
        <input type="hidden" name="authorId" value="<?php echo $auth->getLoggedUserId() ?>">
    <?php } ?>
    <div class="mb-3">
        <label for="inputReviewTitle" class="form-label">Title</label>
        <input id="inputReviewTitle" type ='text' name="title" value="<?php echo $data->getTitle() ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="textareaReviewContent" class="form-label">Content</label>
        <textarea id="textareaReviewContent" name="content" class="form-control" rows="20"><?php echo $data->getContent() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

