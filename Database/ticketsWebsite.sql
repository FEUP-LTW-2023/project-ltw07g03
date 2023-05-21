DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Departments;
DROP TABLE IF EXISTS Agents;
DROP TABLE IF EXISTS Tickets;
DROP TABLE IF EXISTS FAQs;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS Priority;
DROP TABLE IF EXISTS Hashtag;
DROP TABLE IF EXISTS TicketMessages;

CREATE TABLE Users (
    id_user INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    username TEXT UNIQUE NOT NULL,
    pwd TEXT NOT NULL,
    email TEXT NOT NULL,
    category TEXT NOT NULL -- users can also be clients and agents
);

CREATE TABLE Departments (
    id_department INTEGER PRIMARY KEY,
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
    the_subject TEXT NOT NULL,
    ticket_date TIMESTAP DEFAULT CURRENT_TIMESTAMP,
    id_hashtag INTEGER NOT NULL,
    id_department INTEGER NOT NULL,
    id_assigned_agent INTEGER NOT NULL,
    id_status INTEGER NOT NULL,
    message TEXT NOT NULL,
    id_priority INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id_user),
    FOREIGN KEY (id_hashtag) REFERENCES Hashtag(id_hashtag),
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

CREATE TABLE Hashtag (
    id_hashtag INTEGER PRIMARY KEY,
    hashtag_name TEXT NOT NULL
);

CREATE TABLE TicketMessages (
  id_message INTEGER PRIMARY KEY,
  ticket_id INTEGER NOT NULL,
  message_text TEXT,
  sender TEXT NOT NULL,
  sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ticket_id) REFERENCES Tickets(id_ticket)
);

INSERT INTO Users VALUES(1, 'Amanda Silva', 'amandasilva02', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'amandasilva@xyz.com', 'admin');
INSERT INTO Users VALUES(2, 'João Miranda', 'joaom2211', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'joaomiranda@xyz.com', 'client');
INSERT INTO Users VALUES(3, 'Maria Beatriz Carneiro', 'beacarneiro058', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'beatrizcarneiro@xyz.com', 'admin');
INSERT INTO Users VALUES(4, 'Sérgio Conceição', 'sergiofcp1893', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'sergioconceicao@xyz.com', 'agent');
INSERT INTO Users VALUES(5, 'Rúben Amorim', 'rubenscp1906', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'rubenamorim@xyz.com', 'agent');
INSERT INTO Users VALUES(6, 'Roger Schmidt', 'rogerslb1904', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'rogerschimdt@xyz.com', 'agent');
INSERT INTO Users VALUES(7, 'Fabiane Nelo', 'fabi234', '$2y$10$BMHv284hO/V1hjbO9GU7serupaWBKZD0blzu6bVrZaZFNAxsiGKPa', 'fabi.nelo@xyz.com', 'agent');

INSERT INTO Departments VALUES(1, 'Contabilidade');
INSERT INTO Departments VALUES(2, 'Suporte Técnico');
INSERT INTO Departments VALUES(3, 'Faturação');
INSERT INTO Departments VALUES(4, 'Vendas');
INSERT INTO Departments VALUES(5, 'Serviço de Atendimento ao Cliente');
INSERT INTO Departments VALUES(6, 'Geral');

INSERT INTO Agents VALUES(1, 7, 1);
INSERT INTO Agents VALUES(2, 5, 2);
INSERT INTO Agents VALUES(3, 6, 3);
INSERT INTO Agents VALUES(4, 1, 5);
INSERT INTO Agents VALUES(5, 3, 4);
INSERT INTO Agents VALUES(6, 4, 6);

INSERT INTO Status VALUES(1, 'aberto');
INSERT INTO Status VALUES(2, 'fechado');

INSERT INTO Priority VALUES(1, 'normal');
INSERT INTO Priority VALUES(2, 'urgente');
INSERT INTO Priority VALUES(3, 'muito urgente');

INSERT INTO Hashtag VALUES (1, 'pedido');
INSERT INTO Hashtag VALUES (2, 'elogio');
INSERT INTO Hashtag VALUES (3, 'dúvida');
INSERT INTO Hashtag VALUES (4, 'sugestão');
INSERT INTO Hashtag VALUES (5, 'reclamação');

INSERT INTO Tickets VALUES(1, 2, 'Atendimento Terrível', '2023-05-17 14:30:21', 5, 5, 4, 1,'Gostaria de registrar uma reclamação sobre a má qualidade de atendimento que recebi recentemente. O atendimento foi pouco profissional e não atendeu às minhas expectativas. Solicito que essa questão seja analisada e medidas sejam tomadas para melhorar a qualidade do serviço prestado.', 1);
INSERT INTO Tickets VALUES(2, 6, 'Incidente de segurança', '2023-05-17 14:30:21', 1, 2, 2, 1,'Gostaria de relatar um incidente de segurança em nosso sistema. Detectamos um possível ataque cibernético e estamos preocupados com a proteção de nossos dados. Por favor, nos forneça assistência imediata para resolver esse problema e fortalecer nossas defesas.', 3);
INSERT INTO Tickets VALUES(3, 2, 'Atendimento demorado ao telefone', '2023-05-21 10:32:56', 4, 5, 4, 1, 'Prezados, venho por meio deste solicitar uma melhoria no tempo de espera ao ligar para o suporte técnico. Nas últimas vezes em que entrei em contato, esperei por mais de 30 minutos antes de ser atendido. Isso é bastante inconveniente e gostaria que esse tempo fosse reduzido. Aguardo uma resposta positiva.', 1);
INSERT INTO Tickets VALUES(4, 2, 'Suporte por e-mail', '2023-05-21 10:33:52', 3, 5, 4, 1, 'Caro atendimento ao cliente, tenho tentado obter suporte por e-mail, mas não recebi nenhuma resposta até o momento. Enviei minha solicitação há uma semana e estou aguardando um retorno. Gostaria que minha questão fosse analisada o mais breve possível e que eu recebesse uma resposta adequada. Obrigado pela atenção.', 2);


INSERT INTO TicketMessages VALUES(1, 1, 'Lamentamos a sua má experiência. Pode nos contar mais detalhes sobre o que aconteceu?', 'Amanda Silva', '2023-05-18 13:33:19');
INSERT INTO TicketMessages VALUES(2, 1, 'Não quero compartilhar detalhes.', 'João Miranda', '2023-05-18 13:51:15');