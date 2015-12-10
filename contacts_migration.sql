USE users_db;

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(240) NOT NULL UNIQUE,
    name VARCHAR(240) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(500) NOT NULL,
    state VARCHAR(100)NOT NULL,
    zip VARCHAR(100) NOT NULL,
    PRIMARY KEY (id) NOT NULL
    );