<?php
include 'connection.php';

$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$result = $conn->query("SELECT * FROM book LIMIT $start, $limit");
$books = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT COUNT(id) AS id FROM book");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP and MySQL Pagination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">PHP and MySQL Pagination</h1>

  <div class="row mb-3">
    <div class="col-md-10">
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo; Previous</span>
            </a>
          </li>

          <?php for ($i = 1; $i <= $pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
              <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?= ($page >= $pages) ? 'disabled' : '' ?>">
            <a class="page-link" href="index.php?page=<?= $Next; ?>" aria-label="Next">
              <span aria-hidden="true">Next &raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <div class="col-md-2 text-center">
      <form method="post" action="#">
        <select name="limit-records" id="limit-records" class="form-select">
          <option disabled selected>---Limit Records---</option>
          <?php foreach([10, 20, 50] as $option): ?>
            <option value="<?= $option; ?>" <?= ($limit == $option) ? 'selected' : '' ?>>
              <?= $option; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </form>
    </div>
  </div>

  <div style="height: 600px; overflow-y: auto;">
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
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

<!-- jQuery for auto-submit on dropdown change -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#limit-records").change(function() {
      $(this).closest('form').submit();
    });
  });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/
