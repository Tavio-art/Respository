<?php 
session_start();
include "connection.php";

if(!isset($_GET['id'])) {
    $_SESSION['status'] = "No record ID provided!";
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$query = "SELECT * FROM record WHERE id = $id";

$result = mysqli_query($conn, $query);    

if(!$result || mysqli_num_rows($result) == 0 ) {
    $_SESSION['status'] = "Record not found";
    header("Location: index.php");
    exit;
}

$row = mysqli_fetch_assoc($result); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
            <a href="index.php" class="btn btn-outline-secondary rounded-pill px-3"> ⮜Dashboard</a>
            <h3 class="fw-bold">View Record </h3>
          <a href="edit-record.php?id=<?= $row['id'] ?>" class="btn btn-outline-success rounded-pill px-4"> Edit </a>
            
        </div>

        <?php if(isset($_SESSION['status'])): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
                <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['status']); ?>
        <?php endif; ?>

        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4">
                <form action="edit-process.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                    <p class="fw-bold text-primary border-bottom pb-1">I. Personal Information</p>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control shadow-sm" value="<?= ($row['lastname'] ?? '') ?>">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control shadow-sm" value="<?= ($row['firstname'] ?? '') ?>">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" id="middlename" name="middlename" class="form-control shadow-sm" value="<?= ($row['middlename'] ?? '') ?>">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Suffix</label>
                            <input type="text" id="suffix" name="suffix" class="form-control shadow-sm" value="<?= ($row['suffix'] ?? '') ?>">
                        </div>
                    </div>

                    
                    <div class="row">
                        <label class="form-label col-md-12 fw-semibold">Residential Address</label>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="house_no" name="house_no" class="form-control shadow-sm" value="<?= htmlspecialchars($row['house_no'] ?? '') ?>">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="street" name="street" class="form-control shadow-sm" value="<?= htmlspecialchars($row['street'] ?? '') ?>">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="barangay" name="barangay" class="form-control shadow-sm" value="<?= htmlspecialchars($row['barangay'] ?? '') ?>">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="city" name="city" class="form-control shadow-sm" value="<?= htmlspecialchars($row['city'] ?? '') ?>">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="province" name="province" class="form-control shadow-sm" value="<?= htmlspecialchars($row['province'] ?? '') ?>">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="zip_code" name="zip_code" class="form-control shadow-sm" value="<?= htmlspecialchars($row['zip_code'] ?? '') ?>">
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="male" name="gender" value="Male" class="form-check-input" <?= ($row['gender'] == 'Male') ? 'checked' : '' ?>>
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="female" name="gender" value="Female" class="form-check-input" <?= ($row['gender'] == 'Female') ? 'checked' : '' ?>>
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="form-control shadow-sm" value="<?= htmlspecialchars($row['birthday'] ?? '') ?>">
                        </div>

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Place of Birth</label>
                            <input type="text" id="place_of_birth" name="place_of_birth" class="form-control shadow-sm" value="<?= htmlspecialchars($row['place_of_birth'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="civil_status" class="form-label">Civil Status</label>
                            <select id="civil_status" name="civil_status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Single" <?= ($row['civil_status'] == 'Single') ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= ($row['civil_status'] == 'Married') ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= ($row['civil_status'] == 'Widowed') ? 'selected' : '' ?>>Widowed</option>
                                <option value="Separated" <?= ($row['civil_status'] == 'Separated') ? 'selected' : '' ?>>Separated</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Cellphone No.</label>
                            <input type="text" id="cellphone_no" name="cellphone_no" class="form-control shadow-sm" value="<?= ($row['cellphone_no'] ?? '') ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Telephone No.</label>
                            <input type="text" id="telephone_no" name="telephone_no" class="form-control shadow-sm" value="<?= ($row['telephone_no'] ?? '') ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Citizenship</label>
                            <input type="text" id="citizenship" name="citizenship" class="form-control shadow-sm" value="<?= ($row['citizenship'] ?? '') ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control shadow-sm" value="<?= ($row['email'] ?? '') ?>">
                        </div>
                    </div>

                    
                    <p class="fw-bold text-primary border-bottom pb-1 mt-4">II. Family Background</p>

                   
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Father's Name</label>
                            <input type="text" id="father_name" name="father_name" class="form-control shadow-sm" value="<?= ($row['father_name'] ?? '') ?>">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="father_address" name="father_address" class="form-control shadow-sm" value="<?= ($row['father_address'] ?? '') ?> ">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="father_occupation" name="father_occupation" class="form-control shadow-sm" value="<?= ($row['father_occupation'] ?? '') ?> ">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="father_contact" name="father_contact" class="form-control shadow-sm" value="<?= ($row['father_contact'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="father_birthday" name="father_birthday" class="form-control shadow-sm" value="<?= ($row['father_birthday'] ?? '') ?>">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" id="mother_name" name="mother_name" class="form-control shadow-sm" value="<?= ($row['mother_name'] ?? '') ?>">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="mother_address" name="mother_address" class="form-control shadow-sm" value="<?= ($row['mother_address'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="mother_occupation" name="mother_occupation" class="form-control shadow-sm" value="<?= ($row['mother_occupation'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="mother_contact" name="mother_contact" class="form-control shadow-sm" value="<?= ($row['mother_contact'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="mother_birthday" name="mother_birthday" class="form-control shadow-sm" value="<?= ($row['mother_birthday'] ?? '') ?>">
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Spouse's Name</label>
                            <input type="text" id="spouse_name" name="spouse_name" class="form-control shadow-sm" value="<?= ($row['spouse_name'] ?? '') ?>">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="spouse_address" name="spouse_address" class="form-control shadow-sm" value="<?= ($row['spouse_address'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="spouse_occupation" name="spouse_occupation" class="form-control shadow-sm" value="<?= ($row['spouse_occupation'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="spouse_contact" name="spouse_contact" class="form-control shadow-sm" value="<?= ($row['spouse_contact'] ?? '') ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="spouse_birthday" name="spouse_birthday" class="form-control shadow-sm" value="<?= ($row['spouse_birthday'] ?? '') ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
