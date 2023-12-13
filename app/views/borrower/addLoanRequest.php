<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .btn {
            width: 100%;
        }
    </style>
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
                <a class="nav-link active" href="/borrower/loan">Loan</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="/borrower/return">Return</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav><br>

    <!-- form -->
    <div class="container">
        <h2>Add Request</h2>
        <form action="/admin/addItem" method="POST">
        <div class="mb-3">
                <label for="itemId" class="form-label">Item Id</label>
                <select class="form-select" id="itemId" name="itemId" required>
                    <option value="">Select an option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="quantityTotal" class="form-label">Quantity</label>
                <input type="number" min="0" class="form-control" id="quantityTotal" name="quantityTotal" required>
            </div>
            <div class="mb-3">
                <label for="itemType" class="form-label">Loan Date</label>
                <input type="date" class="form-control" id="itemType" name="itemType" required>
            </div>
            <div class="mb-3">
                <label for="quantityAvailable" class="form-label">Due Date</label>
                <input type="date" min="0" class="form-control" id="quantityAvailable" name="quantityAvailable" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>