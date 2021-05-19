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
    cpf NVARCHAR(15),
    email NVARCHAR(100),
    nome NVARCHAR(100),
    isAtivo BOOLEAN,
    senha BOOLEAN,
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
    senha NVARCHAR(100),
    PRIMARY KEY (id),
    FOREIGN KEY (funcionarioId) REFERENCES Funcionario (id)
);

CREATE TABLE Divida (
    id INT NOT NULL AUTO_INCREMENT,
    numeroParcelas INT,
    valorTotal INT,
    isPaga BIT,
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