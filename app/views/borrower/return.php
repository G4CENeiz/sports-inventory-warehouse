<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Sports Inventory Warehouse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/home">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/borrower/loan">Loan</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" href="/borrower/return">Return</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav><br>

    <!-- content -->
    <div class="container">
    <h2>Return Item</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">Loan Id</th>
        <th scope="col">Borrower Id</th>
        <th scope="col">Item Id</th>
        <th scope="col">Quantity</th>
        <th scope="col">Loan Date</th>
        <th scope="col">Due Date</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>5</td>
        <td>2022-01-01</td>
        <td>2022-01-10</td>
        <td><a class="btn btn-primary" href="#">Return</a></td>
        </tr>
        <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>5</td>
        <td>2022-01-01</td>
        <td>2022-01-10</td>
        <td>Returned</td>
        </tr>
        <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>5</td>
        <td>2022-01-01</td>
        <td>2022-01-10</td>
        <td>Returned</td>
        </tr>
    </tbody>

    </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>