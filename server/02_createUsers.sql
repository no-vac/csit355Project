/*
- Access Definitions:
     - Administrator = A
     - Webmaster = W
     - Shop Manager = M
     - Customer = C
- All passwords are "test"
*/

INSERT INTO users(fName, lName, email, password, access) VALUES(
    'admin',
    'admin',
    'a@pws.com',
    '$2y$10$2ZDzqM2ejLfVy4XO3JJ5NeJAEFUhaD1IEAt12IAlKvgJozaXHoar.',
    'A'
);

INSERT INTO users(fName, lName, email, password, access) VALUES(
    'web',
    'master',
    'w@pws.com',
    '$2y$10$2ZDzqM2ejLfVy4XO3JJ5NeJAEFUhaD1IEAt12IAlKvgJozaXHoar.',
    'W'
);

INSERT INTO users(fName, lName, email, password, access) VALUES(
    'shop',
    'manager',
    'm@pws.com',
    '$2y$10$2ZDzqM2ejLfVy4XO3JJ5NeJAEFUhaD1IEAt12IAlKvgJozaXHoar.',
    'M'
);

INSERT INTO users(fName, lName, email, password, access) VALUES(
    'customer',
    'customer',
    'c@pws.com',
    '$2y$10$2ZDzqM2ejLfVy4XO3JJ5NeJAEFUhaD1IEAt12IAlKvgJozaXHoar.',
    'C'
);