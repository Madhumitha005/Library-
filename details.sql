CREATE DATABASE details;
CREATE TABLE IF NOT EXISTS borrow_details (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  reg_no      VARCHAR(20) NOT NULL,      
  book_title  VARCHAR(150) NOT NULL,
  borrow_date DATE NOT NULL,
  due_date    DATE NOT NULL,
  returned_on DATE NULL               
);
Select * from borrow_details;