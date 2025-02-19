--Patient, Users, Appointment pa lang muna --

CREATE DATABASE hospital_soap_system;
USE hospital_soap_system;

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    sex ENUM('Male', 'Female', 'Other') NOT NULL,
    dob DATE NOT NULL,
    age INT AS (TIMESTAMPDIFF(YEAR, dob, CURRENT_DATE)),
    contact VARCHAR(15) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Doctor', 'Nurse', 'Receptionist', 'Patient') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contact VARCHAR(15) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    status ENUM('Scheduled', 'Completed', 'Cancelled') DEFAULT 'Scheduled',
    notes TEXT,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES users(id) ON DELETE CASCADE
);

-- CREATE TABLE medical_records (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     appointment_id INT NOT NULL,
--     subjective TEXT,
--     objective TEXT,
--     assessment TEXT,
--     plan TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE
-- );

-- CREATE TABLE medications (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL UNIQUE,
--     description TEXT,
--     dosage VARCHAR(100) NOT NULL
-- );

-- CREATE TABLE prescriptions (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     medical_record_id INT NOT NULL,
--     medication_id INT NOT NULL,
--     dosage_instructions TEXT NOT NULL,
--     prescribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (medical_record_id) REFERENCES medical_records(id) ON DELETE CASCADE,
--     FOREIGN KEY (medication_id) REFERENCES medications(id) ON DELETE CASCADE
-- );

-- CREATE TABLE billing (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     appointment_id INT NOT NULL,
--     total_amount DECIMAL(10,2) NOT NULL,
--     payment_status ENUM('Pending', 'Paid', 'Cancelled') DEFAULT 'Pending',
--     paid_at TIMESTAMP NULL DEFAULT NULL,
--     FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE
-- );

-- insert sample data into patients 
INSERT INTO patients (full_name, sex, dob, contact) VALUES
('Frank Ocean', 'Male', '1987-10-28', '09222654467'),
('Monkey D. Luffy', 'Male', '1997-05-05', '09123456701'),
('Roronoa Zoro', 'Male', '1996-11-11', '09123456702'),
('Nami', 'Female', '1997-07-03', '09123456703'),
('Usopp', 'Male', '1997-04-01', '09123456704'),
('Sanji', 'Male', '1996-03-02', '09123456705'),
('Tony Tony Chopper', 'Male', '2002-12-24', '09123456706'),
('Nico Robin', 'Female', '1988-02-06', '09123456707'),
('Brook', 'Male', '1950-04-03', '09123456708'),
('Jinbei', 'Male', '1980-04-02', '09123456709');

-- insert sample data into users 
INSERT INTO users (username, password, role, email, contact) VALUES
('admin01', 'password123', 'Admin', 'admin01@example.com', '09123450001'),
('dr_law', 'docpass321', 'Doctor', 'law@example.com', '09123450002'),
('nurse_nami', 'nami456', 'Nurse', 'nami@example.com', '09123450003'),
('reception_sanji', 'sanji789', 'Receptionist', 'sanji@example.com', '09123450004'),
('patient_luffy', 'luffy000', 'Patient', 'luffy@example.com', '09123450005'),
('dr_chopper', 'chopper123', 'Doctor', 'chopper@example.com', '09123450006'),
('nurse_robin', 'robin456', 'Nurse', 'robin@example.com', '09123450007'),
('reception_brook', 'brook789', 'Receptionist', 'brook@example.com', '09123450008'),
('patient_zoro', 'zoro999', 'Patient', 'zoro@example.com', '09123450009'),
('patient_nami', 'nami888', 'Patient', 'nami@example.com', '09123450010');

-- insert sample data into appointments 
-- INSERT INTO appointments (patient_id, doctor_id, appointment_date, status, notes) VALUES
-- (2, 2, '2025-02-20 10:00:00', 'Scheduled', 'Routine checkup'),
-- (3, 2, '2025-02-21 11:30:00', 'Scheduled', 'Follow-up for injury'),
-- (4, 6, '2025-02-22 14:00:00', 'Completed', 'General consultation'),
-- (5, 6, '2025-02-23 09:45:00', 'Scheduled', 'Skin allergy checkup'),
-- (6, 2, '2025-02-24 08:30:00', 'Scheduled', 'Physical therapy session'),
-- (7, 6, '2025-02-25 10:15:00', 'Scheduled', 'Cold and flu symptoms'),
-- (8, 2, '2025-02-26 16:00:00', 'Completed', 'Routine pregnancy checkup'),
-- (9, 6, '2025-02-27 12:00:00', 'Cancelled', 'Cancelled due to patient unavailability'),
-- (10, 2, '2025-02-28 13:30:00', 'Scheduled', 'Dental checkup'),
-- (2, 6, '2025-03-01 15:45:00', 'Scheduled', 'Back pain consultation');

-- insert sample data into medications 
-- INSERT INTO medications (name, description, dosage) VALUES
-- ('Paracetamol', 'Pain reliever and fever reducer', '500mg'),
-- ('Amoxicillin', 'Antibiotic for bacterial infections', '250mg'),
-- ('Ibuprofen', 'Anti-inflammatory and pain reliever', '200mg'),
-- ('Cetirizine', 'Antihistamine for allergies', '10mg'),
-- ('Metformin', 'Diabetes management', '500mg'),
-- ('Losartan', 'Blood pressure control', '50mg'),
-- ('Omeprazole', 'Acid reflux treatment', '20mg'),
-- ('Salbutamol', 'Asthma relief', '2mg'),
-- ('Mefenamic Acid', 'Pain reliever for menstrual cramps', '250mg'),
-- ('Doxycycline', 'Antibiotic for infections', '100mg');

-- insert sample data into medical_records 
-- INSERT INTO medical_records (appointment_id, subjective, objective, assessment, plan) VALUES
-- (1, 'Patient complains of headache and fever.', 'Temperature: 38.2°C', 'Possible viral infection.', 'Prescribed Paracetamol and rest.'),
-- (2, 'Patient reports persistent shoulder pain.', 'Limited range of motion in left arm.', 'Suspected muscle strain.', 'Prescribed painkillers and advised physiotherapy.'),
-- (3, 'Routine checkup. No major concerns.', 'Blood pressure: 120/80 mmHg.', 'Patient is in good health.', 'Advised regular exercise and balanced diet.'),
-- (4, 'Itchy skin and rash for a week.', 'Visible redness and inflammation.', 'Suspected allergic reaction.', 'Prescribed antihistamines and topical cream.'),
-- (5, 'Patient has mild fever and sore throat.', 'Temperature: 37.8°C', 'Possible flu.', 'Advised rest, hydration, and flu medication.'),
-- (6, 'Patient reports frequent headaches.', 'No abnormalities in vital signs.', 'Possible tension headaches.', 'Recommended lifestyle changes and mild pain relievers.'),
-- (7, 'Routine prenatal checkup.', 'Fetal heart rate normal.', 'Healthy pregnancy.', 'Scheduled next checkup in four weeks.'),
-- (8, 'Severe toothache for three days.', 'Swelling in lower jaw.', 'Possible dental infection.', 'Referred to a dentist.'),
-- (9, 'Back pain after lifting heavy objects.', 'Tenderness in lower back.', 'Possible muscle strain.', 'Prescribed pain relief and physical therapy.'),
-- (10, 'Mild stomach discomfort.', 'No abnormalities detected.', 'Possible indigestion.', 'Advised dietary adjustments.');

-- insert sample data into prescriptions
-- INSERT INTO prescriptions (medical_record_id, medication_id, dosage_instructions) VALUES
-- (1, 1, 'Take 1 tablet every 6 hours as needed for fever.'),
-- (2, 3, 'Take 1 tablet every 8 hours for pain.'),
-- (3, 6, 'Take 1 tablet daily for blood pressure control.'),
-- (4, 4, 'Take 1 tablet once daily for allergies.'),
-- (5, 2, 'Take 1 capsule every 12 hours for 7 days.'),
-- (6, 5, 'Take 1 tablet twice daily for diabetes.'),
-- (7, 7, 'Take 1 capsule before breakfast for acid reflux.'),
-- (8, 8, 'Use inhaler as needed for asthma symptoms.'),
-- (9, 9, 'Take 1 capsule every 8 hours for cramps.'),
-- (10, 10, 'Take 1 capsule every 12 hours for infections.');

-- insert sample data into billing 
-- INSERT INTO billing (appointment_id, total_amount, payment_status) VALUES
-- (1, 500.00, 'Pending'),
-- (2, 800.00, 'Paid'),
-- (3, 1000.00, 'Paid'),
-- (4, 1200.00, 'Pending'),
-- (5, 650.00, 'Paid'),
-- (6, 700.00, 'Pending'),
-- (7, 900.00, 'Paid'),
-- (8, 1500.00, 'Unpaid'),
-- (9, 1300.00, 'Cancelled'),
-- (10, 750.00, 'Pending');

select * from patients, users, appointments;

select * from patients, users, appointments, medications, medical_records, prescriptions, billing;