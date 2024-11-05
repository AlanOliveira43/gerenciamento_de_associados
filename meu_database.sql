-- Criação do Banco de Dados (Execute este comando separadamente, fora do script, se necessário)
CREATE DATABASE associacao;

-- Use o banco de dados associacao antes de executar este script
-- No pgAdmin ou em outra ferramenta, selecione o banco de dados associacao antes de continuar.

-- Criação da Tabela de Associados
CREATE TABLE associados (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    data_filiacao DATE NOT NULL
);

-- Criação da Tabela de Anuidades
CREATE TABLE anuidades (
    id SERIAL PRIMARY KEY,
    ano INT NOT NULL,
    valor NUMERIC(10, 2) NOT NULL
);

-- Criação da Tabela de Cobranças de Anuidades para cada Associado
CREATE TABLE cobrancas (
    id SERIAL PRIMARY KEY,
    associado_id INT NOT NULL,
    anuidade_id INT NOT NULL,
    pago BOOLEAN DEFAULT FALSE,
    data_cobranca DATE NOT NULL,
    FOREIGN KEY (associado_id) REFERENCES associados(id) ON DELETE CASCADE,
    FOREIGN KEY (anuidade_id) REFERENCES anuidades(id) ON DELETE CASCADE
);
