<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form method="post" action="<?= $link->url("login") ?>">

    <div class="mb-3">
        <label for="inputLogin" class="form-label">Login</label>
        <input id="inputLogin" type ='text' name="login" class="form-control">
    </div>
    <!--login errors-->
    <?php if (!is_null(@($data['errorsLogin']))):
        foreach ($data['errorsLogin'] as $errorLogin): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorLogin ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--login errors end-->

    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input id="inputPassword" type ="password" name="password" class="form-control">
    </div>
    <!--password errors-->
    <?php if (!is_null(@($data['errorsPassword']))):
        foreach ($data['errorsPassword'] as $errorPassword): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorPassword ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--password errors end-->
    <!--login or password errors-->
    <?php if (!is_null(@($data['errorsMessage']))): ?>
        <div class="alert alert-danger" role="alert">
        <?= $data['errorsMessage'] ?>
        </div>
    <?php endif; ?>
    <!--login or password errors end-->

    <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
