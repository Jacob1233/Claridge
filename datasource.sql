/* DATABASE SOURCE
    DATE yyyy-mm-dd
*/

DROP TABLE AuthorsInBooks;
DROP TABLE Checkouts;
DROP TABLE Books;
DROP TABLE Locations;
DROP TABLE BookAuthors;

/*CREATE*/

CREATE TABLE Locations (
    Location VARCHAR(255) PRIMARY KEY
);

CREATE TABLE Books (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    PublicationDate DATE,
    PurchaseDate DATE,
    LocationID VARCHAR(255) NOT NULL,
    FOREIGN KEY(LocationID) REFERENCES Locations(Location)
);

CREATE TABLE Checkouts (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    BookID INT,
    OutDate DATETIME,
    InDate DATETIME,
    DueDate DATE,
    FOREIGN KEY(BookID) REFERENCES Books(ID)
);

CREATE TABLE BookAuthors (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    MiddleName VARCHAR(255),
    LastName VARCHAR(255)
);

CREATE TABLE AuthorsInBooks (
    AuthorID INT NOT NULL,
    BookID INT NOT NULL,
    PRIMARY KEY(AuthorID, BookID),
    FOREIGN KEY(AuthorID) REFERENCES bookauthors(ID),
    FOREIGN KEY(BookID) REFERENCES books(ID)
);

/*INSERT*/
INSERT INTO Locations (Location) VALUES ('Hardback Library');
INSERT INTO Locations (Location) VALUES ('Paperback Library');
INSERT INTO Locations (Location) VALUES ('Health Center Library');

INSERT INTO BookAuthors (FirstName, MiddleName, LastName) VALUES ('Mitch', '', 'Albom');

INSERT INTO Books (Title, PublicationDate, PurchaseDate, LocationID) VALUES ('The Magic Strings of Frankie Presto', 2015-11-10, '', 'Hardback Library');

INSERT INTO AuthorsInBooks (AuthorID, BookID) VALUES (1,1);

/*SELECT & JOIN*/
SELECT * FROM Books
	JOIN AuthorsInBooks
		ON Books.ID = AuthorsInBooks.BookID
	JOIN BookAuthors
		ON BookAuthors.ID = AuthorsInBooks.AuthorID
WHERE Books.ID = 1

/*TRANSACTION*/
START TRANSACTION;

INSERT INTO Books(Title, PublicationDate, PurchaseDate, LocationID)
VALUES('Simple Genius', '2008-4-1','','Hardback Library')

SET @bookid =  LAST_INSERT_ID();

INSERT INTO BookAuthors(FirstName, MiddleName, LastName)
VALUES('David', , 'Baldacci')

SET @authorid =  LAST_INSERT_ID();

INSERT INTO AuthorsInBooks(AuthorID, BookID)
VALUES(@authorid, @bookid)

COMMIT;