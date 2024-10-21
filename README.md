# Patient Appointment System

## Overview

The Patient Appointment System is a web-based application designed for managing patient appointments and doctor schedules at a small clinic. The system organizes patient information, doctor details, and appointment records, ensuring smooth management of patient care and clinic operations.

## Features

- **Patient Management**: Add, view, and manage patient details.
- **Doctor Management**: Add, view, and manage doctor details and specialties.
- **Appointment Scheduling**: Schedule new appointments and view existing appointments by doctor.
- **User-Friendly Interface**: Intuitive forms and dropdowns for easy data entry.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Development Environment**: XAMPP

## Installation

1. Clone this repository to your local machine using:
   ```bash
   git clone https://github.com/yourusername/your-repository.git
   ```
2. Navigate to the project directory:
   ```bash
   cd your-repository
   ```
3. Start XAMPP and ensure that Apache and MySQL are running.
4. Place the project folder in the `htdocs` directory of your XAMPP installation.
5. **Create the Database**:
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your web browser.
   - Click on the **Databases** tab.
   - Create a new database named `patient_appointment_system` (or any name you prefer).
6. **Import the SQL File**:
   - Select the database you just created.
   - Click on the **Import** tab.
   - Choose the SQL file provided in the repository (if any, e.g., `database_setup.sql`) and click **Go**.
7. Open your web browser and go to `http://localhost/your-repository/.`

### Example SQL Setup File

If you don't have the SQL file yet, here's a sample you can create named `database_setup.sql`:

```sql
-- database_setup.sql

CREATE TABLE patients (
    PatientID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    contact_info VARCHAR(100) NOT NULL
);

CREATE TABLE doctors (
    DoctorID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialty VARCHAR(100),
    contact_info VARCHAR(100)
);

CREATE TABLE appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT NOT NULL,
    DoctorID INT NOT NULL,
    appointmentDate DATE NOT NULL,
    reason VARCHAR(255),
    FOREIGN KEY (PatientID) REFERENCES patients(PatientID),
    FOREIGN KEY (DoctorID) REFERENCES doctors(DoctorID)
);
```

## Usage

- **Add Patient**: Navigate to the patient registration page to add a new patient.
- **Add Doctor**: Go to the doctor registration page to add a new doctor.
- **Schedule Appointment**: Use the appointment scheduling page to set up new appointments.
- **View Appointments**: Select a doctor to view their scheduled appointments.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue if you have suggestions or improvements.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- XAMPP for providing a local development environment.
- PHP and MySQL for server-side scripting and database management.
