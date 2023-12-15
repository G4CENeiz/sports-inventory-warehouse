<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrower</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <style>
    .navbar a:hover {
      font-weight: bold;
    }
    .btn:hover {
      background-color: #FFFFFF;
      color: #000000;
      border: #000000 solid 2px;
      font-weight: bold;
    }          @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
        }
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
              <a class="nav-link" href="/borrower/item">Item</a>
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
  <form action="/borrower/addLoanRequest" method="POST">
    <div class="mb-3">
      <label for="ItemId" class="form-label">Item Name</label>
      <select class="form-select" id="ItemId" name="ItemId" required>
        <option value="">Select an option</option>
        <?php foreach ($item_data as $item) { ?>
          <option value="<?php echo $item['ItemId']; ?>"><?php echo $item['ItemId']; ?> - <?php echo $item['ItemName']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="Quantity" class="form-label">Quantity</label>
      <input type="number" min="0" class="form-control" id="Quantity" name="Quantity" required>
    </div>
    <div class="mb-3">
      <label for="LoanDate" class="form-label">Loan Date</label>
      <input type="date" class="form-control" id="LoanDate" name="LoanDate" required>
    </div>
    <div class="mb-3">
      <label for="DueDate" class="form-label">Due Date</label>
      <input type="date" min="0" class="form-control" id="DueDate" name="DueDate" required>
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
