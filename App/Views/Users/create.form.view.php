<?php
/** @var Array $data */
?>

<form method="post" action="?c=users&a=store">
    <div class="mb-3">
        <label for="inputLoginName" class="form-label">Login</label>
        <input id="inputLoginName" type ='text' name="loginName" class="form-control">
    </div>
    <!--login errors-->
    <?php if (!is_null(@($data['errorsLoginName']))):
        foreach ($data['errorsLoginName'] as $errorLoginName): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorLoginName ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!--login errors end-->

    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input id="inputPassword" type = 'password' name="password" class="form-control">
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

    <button type="submit" class="btn btn-primary">Create new account</button>
</form>