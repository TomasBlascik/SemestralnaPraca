<form method="post" action="?c=users&a=store">
    <?php /** @var \App\Models\User $data */?>
    <div class="mb-3">
        <label for="inputLoginName" class="form-label">Login</label>
        <input id="inputLoginName" type ='text' name="loginName" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input id="inputPassword" type = 'password' name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create new account</button>
</form>