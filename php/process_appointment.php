<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    // Validate if both patient and doctor are selected
    if ($patient_id && $doctor_id) {
        $sql = "INSERT INTO appointments (PatientID, DoctorID, appointmentDate, reason) 
                VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$reason')";

        if ($conn->query($sql) === TRUE) {
            echo "Appointment scheduled successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please select both a patient and a doctor.";
    }

    $conn->close();
}
?>
