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
  <nav class="navbar navbar-expand-lg bg-white">
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
                <a class="nav-link" href="/admin/user">User</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="/admin/inventory">Inventory</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/admin/loan">Loan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/admin/return">Return</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/admin/logout">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav><br>

    <!-- content -->
    <div class="container">
    <h2>Inventory Management</h2>
    <a class="btn btn-primary" href="/admin/addItem">Add Item</a>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">Item Id</th>
        <th scope="col">Item Name</th>
        <th scope="col">Item Type</th>
        <th scope="col">Quantity Available</th>
        <th scope="col">Quantity Total</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td scope="row">1</td>
        <td>Basketball</td>
        <td>Ball</td>
        <td>10</td>
        <td>10</td>
        <td>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-primary" href="/admin/editItem">Edit</a>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-danger" href="/admin/deleteItem">Delete</a>
        </td>
        </tr>
        <tr>
        <td scope="row">2</td>
        <td>Racket</td>
        <td>Equipment</td>
        <td>20</td>
        <td>20</td>
        <td>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-primary" href="/admin/editItem">Edit</a>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-danger" href="/admin/deleteItem">Delete</a>
        </td>
        </tr>
        <tr>
        <td scope="row">3</td>
        <td>Gloves</td>
        <td>Equipment</td>
        <td>25</td>
        <td>25</td>
        <td>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-primary" href="/admin/editItem">Edit</a>
            <a style="width: 30%; margin-inline: 5px" class="btn btn-danger" href="/admin/deleteItem">Delete</a>
        </td>
        </tr>
    </tbody>

    </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>