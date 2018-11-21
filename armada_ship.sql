CREATE TABLE Ship(
    shipID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    shipName VARCHAR(30) NOT NULL,
    crew INT(255) NOT NULL,
    typeShip VARCHAR(30) NOT NULL,
    launchYear INT(255) NOT NULL,
    LENGTH INT(255) NOT NULL,
    country VARCHAR(30) NOT NULL,
    presentation VARCHAR(150),
    uniqName VARCHAR(50)
);