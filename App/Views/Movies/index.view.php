<div class="text-center">
    <a href = "?c=movies&a=create" class = "btn btn-success btn-lg">Add new</a>
</div>

<div class="table-responsive">
<table class="table table-dark table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Movie/TV Show</th>
        <th scope="col">Director/Creator</th>
        <th scope="col">Year</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php
    use App\Models\Movie;

    /** @var Movie[] $data */
    foreach ($data as $movie) { ?>
        <tr>
            <td><?php echo $movie->getName() ?></td>
            <td><?php echo $movie->getDirector() ?></td>
            <td><?php echo $movie->getYear() ?></td>
            <td><a href = "?c=movies&a=delete&id=<?php echo $movie->getId() ?>" class = "btn btn-danger btn-sm">Delete</a></td>
            <td><a href = "?c=movies&a=edit&id=<?php echo $movie->getId() ?>" class = "btn btn-warning btn-sm">Edit</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
