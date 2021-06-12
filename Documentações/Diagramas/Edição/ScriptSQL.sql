CREATE SCHEMA `nuasp` ;

use nuasp;

CREATE TABLE Instituicao (
    id INT NOT NULL AUTO_INCREMENT,
    cnpj NVARCHAR(25),
    nome NVARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE TipoPagamento (
    id INT NOT NULL AUTO_INCREMENT,
    nome NVARCHAR(100),
	PRIMARY KEY (id)
);

CREATE TABLE Funcionario (
    id INT NOT NULL AUTO_INCREMENT,
    nome NVARCHAR(100),
    cpf NVARCHAR(15),
    telefone NVARCHAR(20),
    email NVARCHAR(100),
    dataNascimento DATE,
    isAtivo BOOLEAN DEFAULT 1,
    senha NVARCHAR(100),
    instituicaoId INT,
    PRIMARY KEY (id),
    FOREIGN KEY (instituicaoId) REFERENCES Instituicao (id)
);

CREATE TABLE Aluno (
    id INT NOT NULL AUTO_INCREMENT,
    nome NVARCHAR(100),
    cpf NVARCHAR(20),
    telefone NVARCHAR(20),
    email NVARCHAR(100),
    dataNascimento DATE,
    isAtivo BOOLEAN DEFAULT 1,
    senha NVARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE Divida (
    id INT NOT NULL AUTO_INCREMENT,
    numeroParcelas INT,
    valorTotal INT,
    isPaga BOOLEAN DEFAULT 0,
    alunoId INT,
    instituicaoId INT,
    tipoPagamentoId INT,
    PRIMARY KEY (id),
    FOREIGN KEY (alunoId) REFERENCES Aluno (id),
    FOREIGN KEY (instituicaoId) REFERENCES Instituicao (id),
    FOREIGN KEY (tipoPagamentoId) REFERENCES TipoPagamento (id)
);

CREATE TABLE Parcelas (
    id INT NOT NULL AUTO_INCREMENT,
    dividaId INT,
    numeroParcela INT,
    dataVencimento DATE,
    valorParcela INT,
    PRIMARY KEY (id),
    FOREIGN KEY (dividaId) REFERENCES Divida (id)
);

-- Drops
DROP TABLE Parcelas;
DROP TABLE Divida;
DROP TABLE Aluno;
DROP TABLE Funcionario;
DROP TABLE Instituicao;
DROP TABLE TipoPagamento;

-- Inserts
INSERT INTO Instituicao (cnpj, nome) VALUES 
('123456789456789', 'Escola I'), 
('789456938520001', 'Escola II'),
('456789456789451', 'Escola III'),
('357415896320001', 'Escola IV');

INSERT INTO Funcionario (nome, cpf, telefone, email, dataNascimento, senha, instituicaoId) VALUES 
('Matheus', '96385274159', '963852741', 'matheus@gmail.com', '1999-01-01', 'senha1', 1),
('Leonardo', '963845789321', '4567894567', 'leonardo@gmail.com', '1999-02-02', 'senha2', 2),
('Lucas', '963856895689', '7897456789', 'lucas@gmail.com', '1999-03-03', 'senha3', 3),
('Nathália', '23568956898', '369258147', 'nathalia@gmail.com', '1999-04-04', 'senha4', 4);

INSERT INTO Aluno (nome, cpf, telefone, email, dataNascimento, senha) VALUES 
('Matheus Aluno', '96385274159', '963852741', 'matheusAluno@gmail.com', '1999-01-01', 'senha1'),
('Leonardo Aluno', '963845789321', '789456123', 'leonardoAluno@gmail.com', '1999-02-02', 'senha2'),
('Lucas Aluno', '963856895689', '753951852', 'lucasAluno@gmail.com', '1999-03-03', 'senha3'),
('Nathália Aluno', '23568956898', '456789132', 'nathaliaAluno@gmail.com', '1999-04-04', 'senha4');

INSERT INTO TipoPagamento (nome) VALUES 
('Boleto'),
('Cartão de crédito'),
('Cartão de débito'),
('Transferência bancária');

INSERT INTO Divida (numeroParcelas, valorTotal, isPaga, alunoId, instituicaoId, tipoPagamentoId) VALUES 
(1, 100, 1, 1, 1, 1),
(5, 500, 0, 2, 2, 2),
(1, 150, 0, 3, 3, 3),
(1, 680, 1, 4, 4, 4);

INSERT INTO Parcelas (dividaId, numeroParcela, dataVencimento, valorParcela) VALUES 
(2, 1, '2021-01-01', 100),
(2, 2, '2021-02-01', 100),
(2, 3, '2021-03-01', 100),
(2, 4, '2021-04-01', 100),
(2, 5, '2021-05-01', 100);


-- SELECTS
SELECT * FROM Aluno;
SELECT * FROM Divida;
SELECT * FROM Funcionario;
SELECT * FROM Instituicao;
SELECT * FROM Parcelas;
SELECT * FROM TipoPagamento;

DELETE FROM Aluno WHERE id = 7 OR id = 8 OR id = 9;



-- AREA DE TESTES --
INSERT INTO Aluno SET nome = 'Teste Set', cpf = 'Teste Set', telefone = 'Teste Set', email = 'Teste Set', dataNascimento = '2020-10-10', senha = 'Teste Set';

SELECT f.*, i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome FROM Funcionario f INNER JOIN Instituicao i ON i.id = f.instituicaoId;

SELECT d.*,
i.cnpj AS instituicaoCnpj, i.nome AS instituicaoNome,
a.nome AS alunoNome, a.cpf AS alunoCpf, a.email AS alunoEmail,
tp.nome AS tipoPagamentoNome
FROM Divida d
INNER JOIN Instituicao i ON i.id = d.instituicaoId
INNER JOIN Aluno a ON a.id = d.alunoId
INNER JOIN TipoPagamento tp ON tp.id = d.tipoPagamentoId;

UPDATE Funcionario
SET isAtivo = 1
WHERE id = 10;

SELECT d.id AS dividaId, a.nome AS alunoNome, i.nome AS instituicaoNome, tp.nome AS tipoPagamentoNome, d.* FROM Divida d
INNER JOIN Aluno a ON a.id = d.alunoId
INNER JOIN Instituicao i ON i.id = d.instituicaoId
INNER JOIN TipoPagamento tp ON tp.id = d.tipoPagamentoId;



SELECT a.Id, a.Nome, "Aluno" tipo FROM Aluno a
UNION
SELECT i.Id, i.nome, "Instituicao" tipo FROM Instituicao i
UNION
SELECT tp.Id, tp.nome, "TipoPagamento" tipo FROM TipoPagamento tp;

CREATE PROCEDURE CriarDivida