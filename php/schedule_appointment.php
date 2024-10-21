<?php
include 'db_connection.php';

// Fetch patients
$patient_sql = "SELECT PatientID, name FROM patients";
$patient_result = $conn->query($patient_sql);

// Fetch doctors
$doctor_sql = "SELECT DoctorID, name FROM doctors";
$doctor_result = $conn->query($doctor_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Schedule an Appointment</h2>
    <form action="process_appointment.php" method="post">

        <!-- Patients Dropdown -->
        <label for="patient_id">Select Patient:</label>
        <select name="patient_id" id="patient_id">
            <option value="">-- Select Patient --</option>
            <?php
            if ($patient_result->num_rows > 0) {
                while ($patient_row = $patient_result->fetch_assoc()) {
                    echo "<option value='" . $patient_row['PatientID'] . "'>" . $patient_row['name'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <!-- Doctors Dropdown -->
        <label for="doctor_id">Select Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            <option value="">-- Select Doctor --</option>
            <?php
            if ($doctor_result->num_rows > 0) {
                while ($doctor_row = $doctor_result->fetch_assoc()) {
                    echo "<option value='" . $doctor_row['DoctorID'] . "'>" . $doctor_row['name'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <!-- Appointment Date -->
        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date">
        <br><br>

        <!-- Reason for Visit -->
        <label for="reason">Reason for Visit:</label>
        <input type="text" id="reason" name="reason">
        <br><br>

        <input type="submit" value="Schedule Appointment">
    </form>
</body>
</html>

<?php
$conn->close();
?>
