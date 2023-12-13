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
                <a class="nav-link" href="/admin/inventory">Inventory</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="/admin/loan">Loan</a>
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

    <!-- content -->
    <div class="container">
    <h2>Loan Requests</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">Loan Id</th>
        <th scope="col">User Id</th>
        <th scope="col">Item Id</th>
        <th scope="col">Quantity</th>
        <th scope="col">Loan Date</th>
        <th scope="col">Due Date</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($loan_data as $loan) : ?>
        <tr>
        <td><?= $loan['LoanId']; ?></td>
        <td><?= $loan['UserId']; ?></td>
        <td><?= $loan['ItemId']; ?></td>
        <td><?= $loan['Quantity']; ?></td>
        <td><?= $loan['LoanDate']; ?></td>
        <td><?= $loan['DueDate']; ?></td>
        <td>
        <?php if ($loan['Status'] === 'Accepted' OR $loan['Status'] === 'Rejected') { ?>
            <div class="row">
            <div class="col">
                <form action="/admin/updateStatusLoan" method="post" onsubmit="return disableButton(this);">
                    <input type="hidden" name="LoanId" value="<?= $loan['LoanId']; ?>">
                    <input type="hidden" name="Status" value="Accepted">
                    <button disabled style="width: 100%;" type='submit' class="btn btn-success btn-accept" data-rowid="<?= $loan['LoanId']; ?>">Accept</button>
                </form>
            </div>
        <div class="col">
            <form action="/admin/updateStatusLoan" method="post" onsubmit="return disableButton(this);">
                <input type="hidden" name="LoanId" value="<?= $loan['LoanId']; ?>">
                <input type="hidden" name="Status" value="Rejected">
                <button disabled style="width: 100%;" type='submit' class="btn btn-danger btn-reject" data-rowid="<?= $loan['LoanId']; ?>">Reject</button>
            </form>
        </div>
    </div>
          <?php } else { ?>
            <div class="row">
        <div class="col">
            <form action="/admin/updateStatusLoan" method="post">
                <input type="hidden" name="LoanId" value="<?= $loan['LoanId']; ?>">
                <input type="hidden" name="Status" value="Accepted">
                <button style="width: 100%;" type='submit' class="btn btn-success btn-accept" data-rowid="<?= $loan['LoanId']; ?>">Accept</button>
            </form>
        </div>
        <div class="col">
            <form action="/admin/updateStatusLoan" method="post">
                <input type="hidden" name="LoanId" value="<?= $loan['LoanId']; ?>">
                <input type="hidden" name="Status" value="Rejected">
                <button style="width: 100%;" type='submit' class="btn btn-danger btn-reject" data-rowid="<?= $loan['LoanId']; ?>">Reject</button>
            </form>
        </div>
    </div>
            <?php } ?>
</td>
        </tr>
        <?php endforeach; ?>
    </tbody>

    </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>