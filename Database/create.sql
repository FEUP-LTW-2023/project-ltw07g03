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
    FOREIGN KEY (id_department) REFERENCES Departments(id_department),
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
    FOREIGN KEY id_assigned_agent REFERENCES Agents(id_agent)
);

CREATE TABLE FAQs (
    id_faq INTEGER PRIMARY KEY,
    faq TEXT NOT NULL,
    answer TEXT NOT NULL
);

