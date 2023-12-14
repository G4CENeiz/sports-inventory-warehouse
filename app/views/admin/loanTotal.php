<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">Sports Inventory Warehouse</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/admin/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/user">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/inventory">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/loan">Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/admin/totalLoan">Total Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/return">Return</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>

  <div class="container">
    <h2>Loan Requests</h2>  

    <!-- Search Form -->
    <form action="/admin/searchTotalLoan" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Enter Username" name="searchUsername">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Table to Display Loan Information -->
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Username</th>
                <th scope="col">Total Item Loan</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to display loan information here -->
            <?php foreach ($totalLoans as $loan): ?>
                <tr>
                    <td><?php echo $loan['UserId']; ?></td>
                    <td><?php echo $loan['Username']; ?></td>
                    <td><?php echo $loan['TotalQuantityLoaned']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
