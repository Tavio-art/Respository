<?php 
session_start(); 
include "connection.php";


$query = "SELECT * FROM record";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Record Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">


    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <img src="vs.png" alt="" width="140" height="100" class="d-inline-block align-text-top">
                <h4 class="mb-0 text-info">User Records</h4>
                <a href="add-record.php" class="btn btn-outline-success"> ➕ Add Record</a>
            </div>

            <div class="card-body">
                <?php if(isset($_SESSION['status'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php unset($_SESSION['status']); ?>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th width="220">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($row['firstname'] ?? '') ?> 
                                    <?= htmlspecialchars($row['middlename'] ?? '') ?> 
                                    <?= htmlspecialchars($row['lastname'] ?? '') ?>
                                </td>
                                <td><?= htmlspecialchars($row['email'] ?? ' ') ?></td>
                                <td><?= htmlspecialchars($row['gender'] ?? ' ') ?></td>
                                <td>
                                    <a href="view-record.php?id=<?= $row['id'] ?>" class="btn btn-outline-info">View</a>
                                    <a href="edit-record.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning">Edit</a>
                                    <a href="delete-record.php?id=<?= $row['id'] ?>" 
                                       class="btn btn-outline-danger"
                                       onclick="return confirm('Are you sure you want to delete this record?')">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>