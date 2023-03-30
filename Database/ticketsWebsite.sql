DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Departments;
DROP TABLE IF EXISTS Agents;
DROP TABLE IF EXISTS Tickets;
DROP TABLE IF EXISTS FAQs;

CREATE TABLE Users (
    id_user INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    username TEXT UNIQUE NOT NULL,
    pwd TEXT NOT NULL,
    email TEXT NOT NULL,
    category TEXT NOT NULL -- users can also be clients and agents
);

CREATE TABLE Departments (
    id_Department INTEGER PRIMARY KEY,
    department_name TEXT NOT NULL
);

CREATE TABLE Agents (
    id_agent INTEGER PRIMARY KEY,
    id_user INTEGER NOT NULL,
    id_department INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id_user),
    FOREIGN KEY (id_department) REFERENCES Departments(id_department)
);

CREATE TABLE Tickets (
    id_ticket INTEGER PRIMARY KEY,
    id_user INTEGER NOT NULL,
    id_department INTEGER NOT NULL,
    ticket_date DATE NOT NULL,
    id_assigned_agent INTEGER NOT NULL,
    status TEXT NOT NULL,
    priority TEXT NOT NULL,
    hashtag TEXT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id_user),
    FOREIGN KEY (id_department) REFERENCES Departments(id_department),
    FOREIGN KEY (id_assigned_agent) REFERENCES Agents(id_agent)
);

CREATE TABLE FAQs (
    id_faq INTEGER PRIMARY KEY,
    faq TEXT NOT NULL,
    answer TEXT NOT NULL
);

INSERT INTO Users VALUES(1, 'Amanda Silva', 'amandasilva02', '...', 'amandasilva@xyz.com', 'admin');
INSERT INTO Users VALUES(2, 'João Miranda', 'joaom2211', '...', 'joaomiranda@xyz.com', 'admin');
INSERT INTO Users VALUES(3, 'Maria Beatriz Carneiro', 'beacarneiro058', '...', 'beatrizcarneiro@xyz.com', 'admin');
INSERT INTO Users VALUES(4, 'Sérgio Conceição', 'sergiofcp1893', '...', 'sergioconceicao@xyz.com', 'agent');
INSERT INTO Users VALUES(5, 'Rúben Amorim', 'rubenscp1906', '...', 'rubenamorim@xyz.com', 'client');
INSERT INTO Users VALUES(6, 'Roger Schmidt', 'rogerslb1904', '...', 'rogerschimdt@xyz.com', 'client');

INSERT INTO Departments VALUES(1, 'Accounting');
INSERT INTO Departments VALUES(2, 'Technical Support');
INSERT INTO Departments VALUES(3, 'Billing');
INSERT INTO Departments VALUES(4, 'Sales');
INSERT INTO Departments VALUES(5, 'Customer Service');
INSERT INTO Departments VALUES(6, 'General');

INSERT INTO Agents VALUES(4, 2);
INSERT INTO Agents VALUES(4, 5);
INSERT INTO Agents VALUES(4, 6);

INSERT INTO Tickets VALUES(5, 2, 'opened', 'normal', '#techsupport');
INSERT INTO Tickets VALUES(6, 6, 'opened', 'urgent', '#general');
