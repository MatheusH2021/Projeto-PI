"UTILIZAR PARA CRIAR AS TABELAS"
"------------------------------"
Create Table entregadores(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    cpf VARCHAR(11),
    bairro VARCHAR(255)
)


Create Table encomendas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    cod_ras VARCHAR(255),
    cep VARCHAR(255),
    bairro VARCHAR(255),
    id_entregador INT (11),
    FOREIGN KEY(id_entregador) REFERENCES entregadores(id) ON DELETE CASCADE
)
"------------------------------"