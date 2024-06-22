-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS ramfilmiku;
USE ramfilmiku;

-- Tabela usuario
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela tipo
CREATE TABLE IF NOT EXISTS tipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL UNIQUE
);

-- Tabela genero
CREATE TABLE IF NOT EXISTS generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL UNIQUE
);

-- Tabela de imagens
CREATE TABLE IF NOT EXISTS imagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    link VARCHAR(255) NOT NULL,
    conteudo_id INT NOT NULL,
    FOREIGN KEY (conteudo_id) REFERENCES conteudos(id) ON DELETE CASCADE
);

-- Tabela pais
CREATE TABLE IF NOT EXISTS pais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

-- Tabela conteudo
CREATE TABLE IF NOT EXISTS conteudos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    data_lancamento DATE,
    duracao_minutos INT,
    classificacao_etaria VARCHAR(10),
    diretor VARCHAR(255),
    elenco TEXT,
    usuario_id INT NOT NULL,
    pais_id INT NOT NULL,
    curtidas INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela conteudos_generos
CREATE TABLE IF NOT EXISTS conteudos_generos (
    conteudo_id INT NOT NULL,
    genero_id INT NOT NULL,
    PRIMARY KEY (conteudo_id, genero_id),
    FOREIGN KEY (conteudo_id) REFERENCES conteudos(id) ON DELETE CASCADE,
    FOREIGN KEY (genero_id) REFERENCES generos(id) ON DELETE CASCADE
);

-- Tabela conteudos_tipos
CREATE TABLE IF NOT EXISTS conteudos_tipos (
    conteudo_id INT NOT NULL,
    tipo_id INT NOT NULL,
    PRIMARY KEY (conteudo_id, tipo_id),
    FOREIGN KEY (conteudo_id) REFERENCES conteudos(id) ON DELETE CASCADE,
    FOREIGN KEY (tipo_id) REFERENCES tipos(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS classificacao_etaria (
    codigo VARCHAR(5) PRIMARY KEY,
    descricao VARCHAR(255)
);
