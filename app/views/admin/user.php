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
                <a class="nav-link active" href="/admin/user">User</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/admin/inventory">Inventory</a>
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
    <h2>User Management</h2>
    <a class="btn btn-primary" href="/admin/addUser">Add User</a>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">User Id</th>
        <th scope="col">Identity Number</th>
        <th scope="col">Username</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user_data as $user) { ?>
            <tr>
            <th scope="row"><?php echo $user['UserId']; ?></th>
            <td><?php echo $user['IdentityNumber']; ?></td>
            <td><?php echo $user['Username']; ?></td>
            <td><?php echo $user['FirstName']; ?></td>
            <td><?php echo $user['LastName']; ?></td>
            <td><?php echo $user['Role']; ?></td>
            <td>
            <div class="row">
            <div class="col">
                <a style="width: 100%;" class="btn btn-warning" href="/admin/editUser?UserId=<?php echo $user['UserId']; ?>">Edit</a>
            </div>
            <div class="col">
                <form action="/admin/deleteUser" method="post">
                    <input type="hidden" name="UserId" value="<?php echo $user['UserId']; ?>">
                    <button style="width: 100%;" type='submit' class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
            </td>
            </tr>
        <?php } ?>
    </tbody>

    </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>