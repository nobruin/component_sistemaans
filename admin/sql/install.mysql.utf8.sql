CREATE TABLE IF NOT EXISTS `#__servicos`(
    `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria do serviço',
    `nome` varchar(255) NOT NULL,
    `externalizado` TINYINT NOT NULL DEFAULT 0,
    `ativado` TINYINT NOT NULL DEFAULT 0,
    `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Indica se parecer tecnico está publicada (1) ou não (0).',
    `created` datetime NOT NULL COMMENT 'Data de criação', 
    `created_by` int(11) NOT NULL COMMENT 'Id do usuário criador',
    `modified` datetime NOT NULL COMMENT 'Data da última modificação',
    `modified_by` int(11) NOT NULL COMMENT 'Id do usuário editor',
    PRIMARY KEY(`id`)
);
 
CREATE TABLE IF NOT EXISTS  `#__indisponibilidade`(
    `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria da indisponibilidade',
    `id_servico` INT(11) NOT NULL, 
    `titulo` varchar(255) NOT NULL,
    `descricao` varchar(500) NOT NULL,
    `inicio` TIMESTAMP NOT NULL,
    `fim` TIMESTAMP NULL ,
    `published` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Indica se parecer tecnico está publicada (1) ou não (0).',
    `created` datetime NOT NULL COMMENT 'Data de criação', 
    `created_by` int(11) NOT NULL COMMENT 'Id do usuário criador',
    `modified` datetime NOT NULL COMMENT 'Data da última modificação',
    `modified_by` int(11) NOT NULL COMMENT 'Id do usuário editor',
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `#__servico_relacionados` (
    id_servico INT(11) NOT NULL COMMENT 'Chave primaria do serviço ',
    id_servico_relacionado INT(11) NOT NULL COMMENT 'Chave primaria do um serviço relacionado serviço ',
    PRIMARY KEY(id_servico, id_servico_relacionado)
);

