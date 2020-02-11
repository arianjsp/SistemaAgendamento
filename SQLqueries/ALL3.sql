-- CREATE DATABASE antares;
USE antares;

CREATE TABLE IF NOT EXISTS usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(4) NOT NULL,
    permissao INT NOT NULL,
    fone VARCHAR(20) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    numero VARCHAR(6) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    complemento VARCHAR(50) NOT NULL,
    ponto_referencia VARCHAR(100) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(25) NOT NULL,
    pais VARCHAR(25) NOT NULL    
	-- fim_semestre datetime -- PODE SER NULO pois nem todo usuário tem uma data de fim de semestre.
)	ENGINE = innodb;

CREATE TABLE IF NOT EXISTS turmas (
	id INT AUTO_INCREMENT PRIMARY KEY,
    escola INT NOT NULL,
    nivel INT NOT NULL,
    serie INT NOT NULL,
    nome_turma VARCHAR(1) NOT NULL, -- para deferenciar duas turmas de mesmo nível e mesma série. pode ser 1º ano A, 1º ano B por exemplo. pode ser nulo, caso a escola não tenha duas turmas da mesma série
    data_criacao DATE NOT NULL, -- para saber a data em que a turma foi criada. isso ajuda no futuro pra saber se a turma ainda está ativa ou não. pois, normalmente as turmas duram no máximo 6 meses ou 1 ano   
    FOREIGN KEY (escola) REFERENCES usuarios (id)
)   ENGINE = innodb;

CREATE TABLE IF NOT EXISTS alunos (
	id INT AUTO_INCREMENT PRIMARY KEY,    
    nome VARCHAR(250) NOT NULL,
    data_nascimento DATE NOT NULL, -- sugestão: trocar por data de nascimento para facilitar o calculo automático de idade.
    escola INT NOT NULL,
    turma INT NOT NULL,    
    FOREIGN KEY (escola) REFERENCES usuarios (id), -- chave estrangeira para saber de que escola é o aluno
    FOREIGN KEY (turma) REFERENCES turmas (id) -- chave estrangeira para saber de que turma é o aluno
)	ENGINE = innodb;

CREATE TABLE IF NOT EXISTS prof_resp (
	id INT AUTO_INCREMENT PRIMARY KEY,    
    nome VARCHAR(250) NOT NULL,
    cargo_funcao INT NOT NULL, -- sugestão: trocar por data de nascimento para facilitar o calculo automático de idade.
    escola INT NOT NULL,
    turma INT NOT NULL,    
    FOREIGN KEY (escola) REFERENCES usuarios (id), -- chave estrangeira para saber de que escoal é o professor ou responável
	FOREIGN KEY (turma) REFERENCES turmas (id) -- chave estrangeira para saber de que turma é o professor ou responsável
)	ENGINE = innodb;

-- CREATE TABLE IF NOT EXISTS horarios (id INT AUTO_INCREMENT PRIMARY KEY, estagiario INT NOT NULL, start datetime NOT NULL, end datetime NOT NULL) ENGINE = innodb;

CREATE TABLE IF NOT EXISTS eventos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    estagiario INT NOT NULL,
    title VARCHAR(100), -- VARIÁVEL DO FULL CALENDAR NÃO PODE MUDAR O NOME
    descricao VARCHAR(500),
    vagas INT,
    start datetime NOT NULL, -- VARIÁVEL DO FULL CALENDAR NÃO PODE MUDAR O NOME
    end datetime NOT NULL, -- VARIÁVEL DO FULL CALENDAR NÃO PODE MUDAR O NOME
    color VARCHAR(10), -- VARIÁVEL DO FULL CALENDAR NÃO PODE MUDAR O NOME
    FOREIGN KEY (estagiario) REFERENCES usuarios (id)
)	ENGINE = innodb;

CREATE TABLE IF NOT EXISTS agendamentos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    evento INT NOT NULL,
    escola INT NOT NULL,
    turma INT NOT NULL,    
    FOREIGN KEY (evento) REFERENCES eventos (id),
    FOREIGN KEY (escola) REFERENCES usuarios (id),
    FOREIGN KEY (turma) REFERENCES turmas (id)        
)	ENGINE = innodb;

INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Eu", "eu@eu.eu", "123", 1, "09358521", "44085-000", "nasceu aqui", 9, "sei lá", "não tem", "se vira", "FSA", "BA", "BRASIL");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Tu", "tu@tu.tu", "123", 2, "88729518", "77558-880", "KDJF K", 1, "ÁI DON NOU", "DON RAVI", "NOS TRINTA", "WHATS", "GO", "ARGENTINA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Vc", "vc@vc.vc", "123", 3, "09358521", "00177-066", "GRINGO", 8, "!!!!!!!", "MONEY", "$$$$$", "VEGAS", "CALIFORNICATION", "USA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Adm", "a@a.a", "123", 4, "0987654321", "88750-321", "SAKJ", 3, "AAAAAAAAAA", "DINHEIRO", "@@@@@", "LONDRINA", "PARANÁ", "NOVA DELI");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Estagiario Um", "i1@i.i", "123", 1, "09358521", "44085-000", "nasceu aqui", 9, "sei lá", "não tem", "se vira", "FSA", "BA", "BRASIL");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Estagiario Dois", "i2@i.i", "123", 1, "88729518", "77558-880", "KDJF K", 1, "ÁI DON NOU", "DON RAVI", "NOS TRINTA", "WHATS", "GO", "ARGENTINA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Funcionario Um", "stf1@stf.stf", "123", 2, "09358521", "00177-066", "GRINGO", 8, "!!!!!!!", "MONEY", "$$$$$", "VEGAS", "CALIFORNICATION", "USA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Funcionario Dois", "stf2@stf.stf", "123", 2, "0987654321", "88750-321", "SAKJ", 3, "AAAAAAAAAA", "DINHEIRO", "@@@@@", "LONDRINA", "PARANÁ", "NOVA DELI");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Escola Um", "schl1@schl.schl", "123", 3, "09358521", "44085-000", "nasceu aqui", 9, "sei lá", "não tem", "se vira", "FSA", "BA", "BRASIL");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Escola Dois", "schl2@schl.schl", "123", 3, "88729518", "77558-880", "KDJF K", 1, "ÁI DON NOU", "DON RAVI", "NOS TRINTA", "WHATS", "GO", "ARGENTINA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Adm UM", "a1@a.a", "123", 4, "09358521", "00177-066", "GRINGO", 8, "!!!!!!!", "MONEY", "$$$$$", "VEGAS", "CALIFORNICATION", "USA");
INSERT INTO usuarios (nome, email, senha, permissao, fone, cep, rua, numero, bairro, complemento, ponto_referencia, cidade, estado, pais) VALUES ("Adm DOIS", "a2@a.a", "123", 4, "0987654321", "88750-321", "SAKJ", 3, "AAAAAAAAAA", "DINHEIRO", "@@@@@", "LONDRINA", "PARANÁ", "NOVA DELI");

-- INSERT INTO usuarios (nome, email, senha, permissao) VALUES ("Eu1", "eu1@eu.eu", "123", 1);

USE antares;
SELECT * FROM alunos;
SELECT * FROM turmas;
SELECT * FROM prof_resp;
SELECT * FROM usuarios;
SELECT * FROM eventos;
SELECT * FROM agendamentos;

-- SELECT start FROM eventos WHERE (estagiario = 1 AND title = 'Fim do Semestre');
-- SELECT COUNT(id) AS ja_fez FROM agendamentos WHERE (evento=13 AND escola=3 AND turma=4);
-- SELECT COUNT(id) AS ja_fez FROM eventos WHERE (estagiario=1 AND start="2020-02-01 00:00:00" AND end="2020-02-02 00:00:00");
-- SELECT COUNT(id) AS ja_fez FROM eventos WHERE (estagiario=1 AND start="2020-01-19 00:00:00" AND end="2020-01-20 00:00:00");
-- SELECT YEAR(NOW());
-- SELECT YEAR(curdate());
-- SELECT curdate();