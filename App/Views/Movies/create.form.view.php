<form method="post" action="?c=movies&a=store">
    <?php /** @var \App\Models\Movie $data */
    if ($data->getId()) { ?>
        <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
    <?php } ?>
    <div class="mb-3">
        <label for="inputMovieName" class="form-label">Nazov</label>
        <input id="inputMovieName" type ='text' name="name" value="<?php echo $data->getName() ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="inputMovieDirector" class="form-label">Director</label>
        <input id="inputMovieDirector" type = 'text' name="director" value="<?php echo $data->getDirector() ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="inputMovieYear" class="form-label">Year</label>
        <input id="inputMovieYear" type = 'number' name="year" value="<?php echo $data->getYear() ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

