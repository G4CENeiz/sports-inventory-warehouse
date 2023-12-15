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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="/admin/inventory">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/loan">Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/admin/return">return</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>

    <!-- content -->
    <div class="container">
      <h2>Return Item</h2>
      <a style="width: 20%;" class="btn btn-success" href="/admin/returnReport">Print Return Report</a>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Loan Id</th>
            <th scope="col">Username</th>
            <th scope="col">Item Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Loan Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Overdue</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($loan_data as $loan) { ?>
            <?php if ($loan['Status'] === 'Accepted') { ?>
              <tr>
                <td><?php echo $loan['LoanId']; ?></td>
                <td><?php echo $loan['Username']; ?></td>
                <td><?php echo $loan['ItemName']; ?></td>
                <td><?php echo $loan['Quantity']; ?></td>
                <td><?php echo $loan['LoanDate']; ?></td>
                <td><?php echo $loan['DueDate']; ?></td>
                <?php 
                $currentDate = date("Y-m-d");
                $isOverdue = ($loan['DueDate'] < $currentDate && $loan['ReturnDate'] > $loan['DueDate']);
                if ($isOverdue) { ?>
                    <td>Overdue</td>
                <?php } else { ?>
                    <td>Not Overdue</td>
                <?php } ?>
                <td>
                  <?php if ($loan['ReturnDate'] !== NULL) { ?>
                    <form action="/admin/returnItem" method="post">
                      <input type="hidden" name="LoanId" value="<?php echo $loan['LoanId']; ?>">
                      <button disabled style="width: 100%;" type='submit' class="btn btn-primary">Returned</button>
                    </form>
                  <?php } else { ?>
                    <form action="/admin/returnItem" method="post">
                      <input type="hidden" name="LoanId" value="<?php echo $loan['LoanId']; ?>">
                      <input type="hidden" name="ItemId" value="<?php echo $loan['ItemId']; ?>">
                      <input type="hidden" name="Quantity" value="<?php echo $loan['Quantity']; ?>">
                      <button style="width: 100%;" type='submit' class="btn btn-primary">Return</button>
                    </form>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
