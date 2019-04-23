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
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS products(
    id INT AUTO_INCREMENT,
    pName VARCHAR(30) NOT NULL,
    quantity INT(3),
    pDescription VARCHAR(60) NOT NULL,
    category VARCHAR(20) NOT NULL,
    price FLOAT(5,2),
    tax FLOAT(4,2),
    minOrder INT (3),
    PRIMARY KEY (id)    
) ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS orders(
    id INT AUTO_INCREMENT,
    pName VARCHAR(30) NOT NULL,
    quantity INT(3),
    pDescription VARCHAR(60) NOT NULL,
    category VARCHAR(20) NOT NULL,
    price FLOAT(5,2),
    userId INT NOT NULL,
    orderStatus VARCHAR(30) NOT NULL,
    orderTimeStamp TIMESTAMP NOT NULL, 
    FOREIGN KEY (id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
) ENGINE = InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;