<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form class="form-signin" method="post" action="<?= $link->url("login") ?>">
    <div class="form-label-group mb-3">
        <input name="login" type="text" id="login" class="form-control" placeholder="Login"
               required >
    </div>

    <div class="form-label-group mb-3">
        <input name="password" type="password" id="password" class="form-control"
               placeholder="Password" required>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit" name="submit">Login
        </button>
    </div>
</form>
