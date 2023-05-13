DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Departments;
DROP TABLE IF EXISTS Agents;
DROP TABLE IF EXISTS Tickets;
DROP TABLE IF EXISTS FAQs;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS Priority;

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
    id_status INTEGER NOT NULL,
    id_priority INTEGER NOT NULL,
    hashtag TEXT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id_user),
    FOREIGN KEY (id_department) REFERENCES Departments(id_department),
    FOREIGN KEY (id_assigned_agent) REFERENCES Agents(id_agent),
    FOREIGN KEY (id_status) REFERENCES Status(id_status),
    FOREIGN KEY (id_priority) REFERENCES Status(id_priority)
);

CREATE TABLE FAQs (
    id_faq INTEGER PRIMARY KEY,
    faq TEXT NOT NULL,
    answer TEXT NOT NULL
);

CREATE TABLE Status (
    id_status INTEGER PRIMARY KEY,
    status_name TEXT NOT NULL
);

CREATE TABLE Priority (
    id_priority INTEGER PRIMARY KEY,
    priority_name TEXT NOT NULL
);

INSERT INTO Users VALUES(1, 'Amanda Silva', 'amandasilva02', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'amandasilva@xyz.com', 'admin');
INSERT INTO Users VALUES(2, 'João Miranda', 'joaom2211', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'joaomiranda@xyz.com', 'admin');
INSERT INTO Users VALUES(3, 'Maria Beatriz Carneiro', 'beacarneiro058', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'beatrizcarneiro@xyz.com', 'admin');
INSERT INTO Users VALUES(4, 'Sérgio Conceição', 'sergiofcp1893', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'sergioconceicao@xyz.com', 'agent');
INSERT INTO Users VALUES(5, 'Rúben Amorim', 'rubenscp1906', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'rubenamorim@xyz.com', 'client');
INSERT INTO Users VALUES(6, 'Roger Schmidt', 'rogerslb1904', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'rogerschimdt@xyz.com', 'client');

INSERT INTO Departments VALUES(1, 'Accounting');
INSERT INTO Departments VALUES(2, 'Technical Support');
INSERT INTO Departments VALUES(3, 'Billing');
INSERT INTO Departments VALUES(4, 'Sales');
INSERT INTO Departments VALUES(5, 'Customer Service');
INSERT INTO Departments VALUES(6, 'General');

INSERT INTO Agents VALUES(1, 2, 5);
INSERT INTO Agents VALUES(2, 5, 2);
INSERT INTO Agents VALUES(3, 6, 3);

INSERT INTO Status VALUES(1, 'aberto');
INSERT INTO Status VALUES(2, 'fechado');

INSERT INTO Priority VALUES(1, 'normal');
INSERT INTO Priority VALUES(2, 'urgente');

INSERT INTO Tickets VALUES(1, 2, 3, 2023/04/03, 3 , 1 , 1 ,'#test');
INSERT INTO Tickets VALUES(2, 6, 5, 2023/04/07, 1 , 1 , 2 ,'#test');
