<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

  <!-- content -->
  <div class="container">
    <h3>Sports Inventory Warehouse</h3><hr style="border:2px solid;">
    <h3>Return Item Report</h3>
    <table>
        <tr>
            <td><b>Printed Date</b></td>
            <td>: </td>
            <td><?php echo date("d/m/Y"); ?></td>
        </tr>
        <tr>
            <td><b>Printed By</b></td>
            <td>: </td>
            <td><?php echo $_SESSION['Username']; ?></td>
        </tr>
    </table>

    <table class="table table-striped table-hover border border-2">
        <thead>
          <tr>
            <th scope="col">Loan Id</th>
            <th scope="col">Username</th>
            <th scope="col">Item Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Loan Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Return Date</th>
            <th scope="col">Overdue</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($return_data as $return) : ?>
          <?php if ($return['ReturnDate'] !== NULL) { ?>
            <tr>
              <td><?= $return['LoanId'] ?></td>
              <td><?= $return['Username'] ?></td>
              <td><?= $return['ItemName'] ?></td>
              <td><?= $return['Quantity'] ?></td>
              <td><?= $return['LoanDate'] ?></td>
              <td><?= $return['DueDate'] ?></td>
              <td><?= $return['ReturnDate'] ?></td>
              <?php 
                if ($return['DueDate'] < $return['ReturnDate']) { ?>
                    <td>Overdue</td>
                <?php } else { ?>
                    <td>Not Overdue</td>
                <?php } ?>  
            </tr>
          <?php } else if ($return['ReturnDate'] === NULL) { ?>
            <tr>
              <td><?= $return['LoanId'] ?></td>
              <td><?= $return['Username'] ?></td>
              <td><?= $return['ItemName'] ?></td>
              <td><?= $return['Quantity'] ?></td>
              <td><?= $return['LoanDate'] ?></td>
              <td><?= $return['DueDate'] ?></td>
              <td>Not Returned</td>
              <?php 
                if ($return['DueDate'] < $return['ReturnDate']) { ?>
                    <td>Overdue</td>
                <?php } else { ?>
                    <td>Not Overdue</td>
                <?php } ?>  
            </tr>
            <?php } ?> 
        <?php endforeach; ?>
      </tbody>
      </table>
  </div>

    <script>
		window.print();
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
