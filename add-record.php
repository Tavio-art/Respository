<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container py-5">

      
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
            <a href="index.php" class="btn btn-success rounded-pill px-3"> ⮜ Dashboard</a>
            <h3 class="fw-bold">Add Record</h3>
        </div>

    
        <?php if(isset($_SESSION['status'])): ?>

            <div class="alert alert-info alert-dismissible fade show shadow-sm rounded-3" role="alert">
                <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <?php unset($_SESSION['status']); ?>

        <?php endif; ?>

       
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4">
                <form action="add-process.php" method="POST">

                    <p class="fw-bold text-primary border-bottom pb-1">I. Personal Information</p>

                    
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control shadow-sm" placeholder="Enter last name">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control shadow-sm" placeholder="Enter first name">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" id="middlename" name="middlename" class="form-control shadow-sm" placeholder="Enter middle name">
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label">Suffix</label>
                            <input type="text" id="suffix" name="suffix" class="form-control shadow-sm" placeholder="Enter suffix (e.g., Jr., Sr., III)">
                        </div>
                    </div>

                    
                    <div class="row">
                        <label class="form-label col-md-12 fw-semibold">Residential Address</label>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="number" id="house_no" name="house_no" class="form-control shadow-sm" placeholder="House No.">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="street" name="street" class="form-control shadow-sm" placeholder="Street">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="barangay" name="barangay" class="form-control shadow-sm" placeholder="Barangay">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="city" name="city" class="form-control shadow-sm" placeholder="City/Town">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="text" id="province" name="province" class="form-control shadow-sm" placeholder="Province">
                        </div>

                        <div class="col-lg-2 col-md-4 mb-3">
                            <input type="number" id="zip_code" name="zip_code" class="form-control shadow-sm" placeholder="Zip Code">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Gender</label><br>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="male" name="gender" value="Male" class="form-check-input">
                                <label for="male" class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Place of Birth</label>
                            <input type="text" id="place_of_birth" name="place_of_birth" class="form-control shadow-sm" placeholder="Enter place of birth">
                        </div>
                    </div>

                  
                      <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="civil_status" class="form-label">Civil Status</label>
                            <select id="civil_status" name="civil_status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Cellphone No.</label>
                            <input type="text" id="cellphone_no" name="cellphone_no" class="form-control shadow-sm" placeholder="Enter cellphone number">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Telephone No.</label>
                            <input type="text" id="telephone_no" name="telephone_no" class="form-control shadow-sm" placeholder="Enter telephone number">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Citizenship</label>
                            <input type="text" id="citizenship" name="citizenship" class="form-control shadow-sm" placeholder="Enter citizenship">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control shadow-sm" placeholder="Enter email">
                        </div>
                    </div>

                    <p class="fw-bold text-primary border-bottom pb-1 mt-4">II. Family Background</p>

                   
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Father's Name</label>
                            <input type="text" id="father_name" name="father_name" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="father_address" name="father_address" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="father_occupation" name="father_occupation" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="father_contact" name="father_contact" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="father_birthday" name="father_birthday" class="form-control shadow-sm">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" id="mother_name" name="mother_name" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="mother_address" name="mother_address" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="mother_occupation" name="mother_occupation" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="mother_contact" name="mother_contact" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="mother_birthday" name="mother_birthday" class="form-control shadow-sm">
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Spouse's Name</label>
                            <input type="text" id="spouse_name" name="spouse_name" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label">Complete Address</label>
                            <input type="text" id="spouse_address" name="spouse_address" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" id="spouse_occupation" name="spouse_occupation" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" id="spouse_contact" name="spouse_contact" class="form-control shadow-sm">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="spouse_birthday" name="spouse_birthday" class="form-control shadow-sm">
                        </div>
                    </div>

                    
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-outline-secondary rounded-pill px-4 me-2">Clear</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Add Record</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>