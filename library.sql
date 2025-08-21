CREATE DATABASE library;
USE library;
CREATE TABLE students (
  student_id VARCHAR(20) PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
);
SELECT * FROM students WHERE student_id='student_id' AND password='password';
CREATE TABLE borrow_details (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id VARCHAR(20),
  book_title VARCHAR(255),
  borrow_date DATE,
  due_date DATE,
  fine DECIMAL(10,2),
  FOREIGN KEY (student_id) REFERENCES students(student_id)
);
INSERT INTO borrow_details (student_id, book_title, borrow_date, due_date, fine)
VALUES 
('STU1001', 'Data Structures', '2025-05-01', '2025-05-15', 0.00),
('STU1001', 'Operating Systems', '2025-04-20', '2025-05-05', 50.00);
