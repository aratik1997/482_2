<?php
include 'connection.php';

// Set the limit of records per page
$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch books from the database
$result = $conn->query("SELECT * FROM book LIMIT $start, $limit");
$books = $result->fetch_all(MYSQLI_ASSOC);

// Get the total count of books
$result1 = $conn->query("SELECT count(id) AS id FROM book");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];

// Calculate pagination
$pages = ceil($total / $limit);
$previous = $page - 1;
$next = $page + 1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP and MySQL Pagination</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">PHP and MySQL Pagination</h1>

    <div class="row">
        <div class="col-md-10">
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <!-- Previous Page -->
                    <li class="page-item <?= $previous <= 0 ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?page=<?= $previous ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    <?php for($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Page -->
                    <li class="page-item <?= $next > $pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?page=<?= $next ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Records per page limit -->
        <div class="col-md-2 text-center">
            <form method="post" action="#">
                <select name="limit-records" id="limit-records" class="form-select">
                    <option disabled="disabled" selected="selected">--- Limit Records ---</option>
                    <?php foreach([10, 20, 50] as $limitOption): ?>
                        <option value="<?= $limitOption; ?>" <?= (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limitOption) ? 'selected' : ''; ?>>
                            <?= $limitOption; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>

    <!-- Books Table -->
    <div style="height: 600px; overflow-y: auto;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= $book['id']; ?></td>
                        <td><?= $book['author']; ?></td>
                        <td><?= $book['title']; ?></td>
                        <td><?= $book['genre']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jQuery Script to handle the record limit change -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#limit-records").change(function() {
            $('form').submit();
        });
    });
</script>

</body>
</html>
