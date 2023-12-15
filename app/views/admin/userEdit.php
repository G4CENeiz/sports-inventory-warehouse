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
    }.btn {
      width: 100%;
    }
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
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
            <a class="nav-link active" aria-current="page" href="/admin/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/admin/user">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/inventory">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/loan">Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/totalLoan">Total Loan</a>
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

  <!-- form -->
  <div class="container">
    <h2>Edit User</h2>
    <form action="/admin/editUser" method="POST">
      <input type="hidden" name="UserId" value="<?php echo $userData['UserId']; ?>">
      <div class="mb-3">
        <label for="IdentityNumber" class="form-label">Identity Number</label>
        <input type="text" class="form-control" id="IdentityNumber" name="IdentityNumber" required value="<?php echo $userData['IdentityNumber']; ?>">
      </div>
      <div class="mb-3">
        <label for="Username" class="form-label">Username</label>
        <input type="text" class="form-control" id="Username" name="Username" required value="<?php echo $userData['Username']; ?>">
      </div>
      <div class="mb-3">
        <label for="FirstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="FirstName" name="FirstName" required value="<?php echo $userData['FirstName']; ?>">
      </div>
      <div class="mb-3">
        <label for="LastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="LastName" name="LastName" required value="<?php echo $userData['LastName']; ?>">
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password" name="Password" required value="<?php echo $userData['Password']; ?>">
      </div>
      <div class="mb-3">
        <label for="Role" class="form-label">Role</label>
        <select class="form-select" id="Role" name="Role" required>
          <option value="Admin" <?php echo ($userData['Role'] === 'Admin') ? 'selected' : ''; ?>>Admin</option>
          <option value="Borrower" <?php echo ($userData['Role'] === 'Borrower') ? 'selected' : ''; ?>>Borrower</option>
        </select>
      </div>
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
