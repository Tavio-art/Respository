<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = !empty($_POST['middlename']) ? $_POST['middlename'] : 'N/A';
    $suffix = !empty($_POST['suffix']) ? $_POST['suffix'] : 'N/A';
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $place_of_birth = $_POST['place_of_birth'];
    $civil_status = $_POST['civil_status'];
    $cellphone_no = $_POST['cellphone_no'];
    $telephone_no = $_POST['telephone_no'];
    $citizenship = $_POST['citizenship'];
    $email = $_POST['email'];

    $father_name = $_POST['father_name'];
    $father_address = $_POST['father_address'];
    $father_occupation = $_POST['father_occupation'];
    $father_contact = $_POST['father_contact'];
    $father_birthday = $_POST['father_birthday'];

    $mother_name = $_POST['mother_name'];
    $mother_address = $_POST['mother_address'];
    $mother_occupation = $_POST['mother_occupation'];
    $mother_contact = $_POST['mother_contact'];
    $mother_birthday = $_POST['mother_birthday'];

    $spouse_name = !empty($_POST['spouse_name']) ? $_POST['spouse_name'] : 'N/A';
    $spouse_address = !empty($_POST['spouse_address']) ? $_POST['spouse_address'] : 'N/A';
    $spouse_occupation = !empty($_POST['spouse_occupation']) ? $_POST['spouse_occupation'] : 'N/A';
    $spouse_contact = !empty($_POST['spouse_contact']) ? $_POST['spouse_contact'] : 'N/A';
    $spouse_birthday = !empty($_POST['spouse_birthday']) ? $_POST['spouse_birthday'] : 'N/A';

    if (
        empty($lastname) || empty($firstname) || empty($house_no) ||
        empty($street) || empty($barangay) || empty($city) || empty($province) || empty($zip_code) ||
        empty($gender) || empty($birthday) || empty($place_of_birth) || empty($civil_status) ||
        empty($cellphone_no) || empty($telephone_no) || empty($citizenship) || empty($email) ||
        empty($father_name) || empty($father_address) || empty($father_occupation) || empty($father_contact) || empty($father_birthday) ||
        empty($mother_name) || empty($mother_address) || empty($mother_occupation) || empty($mother_contact) || empty($mother_birthday)
    ) {
        $_SESSION['status'] = "Fill all required fields!";
        header("Location: add-record.php");
        exit();
    }

    $query = "INSERT INTO record(
        lastname, firstname, middlename, suffix,
        house_no, street, barangay, city, province, zip_code,
        gender, birthday, place_of_birth, civil_status,
        cellphone_no, telephone_no, citizenship, email,
        father_name, father_address, father_occupation, father_contact, father_birthday,
        mother_name, mother_address, mother_occupation, mother_contact, mother_birthday,
        spouse_name, spouse_address, spouse_occupation, spouse_contact, spouse_birthday
    ) VALUES (
        '$lastname', '$firstname', '$middlename', '$suffix',
        '$house_no', '$street', '$barangay', '$city', '$province', '$zip_code',
        '$gender', '$birthday', '$place_of_birth', '$civil_status',
        '$cellphone_no', '$telephone_no', '$citizenship', '$email',
        '$father_name', '$father_address', '$father_occupation', '$father_contact', '$father_birthday',
        '$mother_name', '$mother_address', '$mother_occupation', '$mother_contact', '$mother_birthday',
        '$spouse_name', '$spouse_address', '$spouse_occupation', '$spouse_contact', '$spouse_birthday'
    )";

    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "Record added successfully!";
    } else {
        $_SESSION['status'] = "Error: " . mysqli_error($conn);
    }

    header("Location: add-record.php");
    exit();
}
?>  