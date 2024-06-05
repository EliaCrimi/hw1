use test;

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Likes (
    username VARCHAR(255),
    image_id INT,
    PRIMARY KEY (username, image_id),
    FOREIGN KEY (username) REFERENCES Users(username)
);

CREATE TABLE agents (
   username VARCHAR(255),
   agent VARCHAR(255),
   img VARCHAR(255),
   primary key(username, agent), 
   foreign key (username) REFERENCES Users(username)
);

CREATE TABLE artists(
   username VARCHAR(255),
   artist VARCHAR(255),
   img VARCHAR(255),
   primary key(username, artist), 
   foreign key (username) REFERENCES Users(username)
);