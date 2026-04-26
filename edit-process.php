<?php
session_start();
include "connection.php";

if(isset($_POST['update'])) {

    $id = $_POST['id'];

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];

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

    $spouse_name = $_POST['spouse_name'];
    $spouse_address = $_POST['spouse_address'];
    $spouse_occupation = $_POST['spouse_occupation'];
    $spouse_contact = $_POST['spouse_contact'];
    $spouse_birthday = $_POST['spouse_birthday'];

    $query = "UPDATE record SET 
        lastname='$lastname',
        firstname='$firstname',
        middlename='$middlename',
        suffix='$suffix',
        house_no='$house_no',
        street='$street',
        barangay='$barangay',
        city='$city',
        province='$province',
        zip_code='$zip_code',
        gender='$gender',
        birthday='$birthday',
        place_of_birth='$place_of_birth',
        civil_status='$civil_status',
        cellphone_no='$cellphone_no',
        telephone_no='$telephone_no',
        citizenship='$citizenship',
        email='$email',
        father_name='$father_name',
        father_address='$father_address',
        father_occupation='$father_occupation',
        father_contact='$father_contact',
        father_birthday='$father_birthday',
        mother_name='$mother_name',
        mother_address='$mother_address',
        mother_occupation='$mother_occupation',
        mother_contact='$mother_contact',
        mother_birthday='$mother_birthday',
        spouse_name='$spouse_name',
        spouse_address='$spouse_address',
        spouse_occupation='$spouse_occupation',
        spouse_contact='$spouse_contact',
        spouse_birthday='$spouse_birthday'
        WHERE id=$id
    ";

    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['status'] = "Record updated successfully!";
        header("Location: view-record.php?id=" . $id);
        exit;
    } else {
        $_SESSION['status'] = "Failed to update record!";
        header("Location: view-record.php?id=" . $id);
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>