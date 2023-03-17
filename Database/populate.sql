INSERT INTO Users
VALUES (
    1, 'Amanda Silva', 'amandasilva02', '...', 'amandasilva@xyz.com', 'admin',
    2, 'João Miranda', 'joaom2211', '...', 'joaomiranda@xyz.com', 'admin',
    3, 'Maria Beatriz Carneiro', 'beacarneiro058', '...', 'beatrizcarneiro@xyz.com', 'admin',
    4, 'Sérgio Conceição', 'sergiofcp1893', '...', 'sergioconceicao@xyz.com', 'agent',
    5, 'Rúben Amorim', 'rubenscp1906', '...', 'rubenamorim@xyz.com', 'client',
    6, 'Roger Schmidt', 'rogerslb1904', '...', 'rogerschimdt@xyz.com', 'client'
);

INSERT INTO Departments
VALUES (
    1, 'Accounting'
    2, 'Technical Support'
    3, 'Billing'
    4, 'Sales'
    5, 'Customer Service'
    6, 'General'
);

INSERT INTO Agents
VALUES (
    4, 2
    4, 5
    4, 6
);

INSERT INTO Tickets
VALUES (
    5, 2, 'opened', 'normal', '#techsupport'
    6, 6, 'opened', 'urgent', '#general'
);


