<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
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
    }        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
        }
  </style>
</head>
<body>

  <!-- content -->
  <div class="container">
    <h3>Sports Inventory Warehouse</h3><hr style="border:2px solid;">
    <h3>Item Report</h3>
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
          <th scope="col">Item Id</th>
          <th scope="col">Item Name</th>
          <th scope="col">Item Type</th>
          <th scope="col">Quantity Available</th>
          <th scope="col">Quantity Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($item_data as $item) { ?>
          <tr>
            <td><?php echo $item['ItemId']; ?></td>
            <td><?php echo $item['ItemName']; ?></td>
            <td><?php echo $item['ItemType']; ?></td>
            <td><?php echo $item['QuantityAvailable']; ?></td>
            <td><?php echo $item['QuantityTotal']; ?></td>  
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

    <script>
		window.print();
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
