CREATE DATABASE IF NOT EXISTS PWSTORE;

/* creates the users table */
CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT,
    fName VARCHAR(30) NOT NULL,
    lName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    access VARCHAR(1) DEFAULT 'P',
    PRIMARY KEY (id)    
) ENGINE = InnoDB
CHARACTER SET utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS products(
    id INT AUTO_INCREMENT,
    pName VARCHAR(30) NOT NULL,
    quantity INT(3) NOT NULL,
    pDescription VARCHAR(60) NOT NULL,
    category VARCHAR(20) NOT NULL,
    price INT(5,2) NOT NULL,
    tax INT(4,2) NOT NULL,
    minOrder INT (3) NOT NULL,
    PRIMARY KEY (id)    
) ENGINE = InnoDB
CHARACTER SET utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS orders(
    id INT AUTO_INCREMENT,
    /* add necessary cols */
    PRIMARY KEY (id)    
) ENGINE = InnoDB
CHARACTER SET utf8mb4_unicode_ci;