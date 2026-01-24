<?php
session_start();
require 'db.php';

$response=['status'=>'danger','message'=>'Error'];

if($_SERVER['REQUEST_METHOD']==='POST'){
$date=$_POST['date'];

foreach($_POST['status'] as $emp_id=>$status){

$emp_id=(int)$emp_id;
$employee_name=mysqli_real_escape_string($conn,$_POST['employee_name'][$emp_id]);
$role_name=mysqli_real_escape_string($conn,$_POST['role_name'][$emp_id]);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile'][$emp_id]);
$reason=mysqli_real_escape_string($conn,$_POST['reason'][$emp_id]??'');

$morning='Present'; $evening='Present';

if($status==='Absent'){
    if($reason===''){
        $response['message']='Reason missing!';
        echo json_encode($response); exit;
    }
    $morning=$evening='Absent';
}
if($status==='Absent Morning') $morning='Absent';
if($status==='Absent Evening') $evening='Absent';

$check=mysqli_query($conn,"
    SELECT id FROM employee_attendance
    WHERE employee_id='$emp_id' AND attendance_date='$date'
");

if(mysqli_num_rows($check)){
mysqli_query($conn,"
    UPDATE employee_attendance SET
    employee_name='$employee_name',
    role_name='$role_name',
    mobile='$mobile',
    morning_status='$morning',
    evening_status='$evening',
    status='$status',
    reason='$reason'
    WHERE employee_id='$emp_id' AND attendance_date='$date'
");
}else{
mysqli_query($conn,"
    INSERT INTO employee_attendance
    (employee_id,employee_name,role_name,mobile,attendance_date,
     morning_status,evening_status,reason, status)
    VALUES
    ('$emp_id','$employee_name','$role_name','$mobile','$date',
     '$morning','$evening','$reason','$status')
");
}
}

$response=['status'=>'success','message'=>'Attendance saved successfully'];
}

echo json_encode($response);
