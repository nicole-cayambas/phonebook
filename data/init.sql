CREATE DATABASE phonebook; 

use phonebook; 


CREATE TABLE contacts ( 
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    date TIMESTAMP,
    firstname VARCHAR(30) NOT NULL, 
    lastname VARCHAR(30) NOT NULL, 
    address VARCHAR(50), 
    mobile_number VARCHAR(11),
    home_number VARCHAR(7)
);