CREATE DATABASE kanban;

USE kanban;

CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    nomeSetor VARCHAR (45) NOT NULL,
    prioridade ENUM('baixa', 'media', 'alta') NOT NULL,
    dataCadastro DATE NOT NULL,
    status ENUM('a fazer', 'fazendo', 'pronto') NOT NULL DEFAULT 'a fazer',
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
);

INSERT INTO usuarios (nome, email) VALUES
('Ana Silva', 'ana.silva@empresa.com'),
('Bruno Costa', 'bruno.costa@empresa.com'),
('Carla Mendes', 'carla.mendes@empresa.com');

INSERT INTO tarefas (idUsuario, descricao, nomeSetor, prioridade, dataCadastro, status) VALUES
(1, 'Atualizar documentação do sistema', 'TI', 'media', '2025-10-01', 'a fazer'),
(2, 'Implementar novo módulo de relatórios', 'Desenvolvimento', 'alta', '2025-10-02', 'fazendo'),
(3, 'Revisar políticas de segurança', 'Segurança', 'alta', '2025-10-03', 'a fazer'),
(1, 'Configurar servidor de testes', 'Infraestrutura', 'media', '2025-10-04', 'pronto'),
(2, 'Criar layout do dashboard', 'Design', 'baixa', '2025-10-05', 'fazendo'),
(3, 'Testar integração com API externa', 'Qualidade', 'alta', '2025-10-06', 'a fazer'),
(1, 'Treinar equipe sobre novas ferramentas', 'RH', 'media', '2025-10-07', 'a fazer'),
(2, 'Corrigir bugs do módulo financeiro', 'Desenvolvimento', 'alta', '2025-10-08', 'fazendo'),
(3, 'Planejar sprint da próxima semana', 'Gestão', 'baixa', '2025-10-09', 'pronto'),
(1, 'Documentar endpoints da API', 'TI', 'media', '2025-10-10', 'a fazer');