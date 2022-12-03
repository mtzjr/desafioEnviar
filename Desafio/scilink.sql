-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2022 às 03:45
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scilink`
--

DELIMITER $$
--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calcIdade` (`dtnNasc` DATE) RETURNS INT(11)  BEGIN
  RETURN TIMESTAMPDIFF(YEAR, dtnNasc, NOW());
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calculaIdade` (`dtnNasc` DATE) RETURNS INT(11) DETERMINISTIC BEGIN
    DECLARE dtAtual DATE;
    Select current_date()into dtAtual;
    RETURN year(dtAtual)-year(dtnNasc);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `validar_CPF` (`CPF` CHAR(11)) RETURNS INT(11)  BEGIN
    DECLARE SOMA INT;
    DECLARE INDICE INT;
    DECLARE DIGITO_1 INT;
    DECLARE DIGITO_2 INT;
    DECLARE NR_DOCUMENTO_AUX VARCHAR(11);
   
 DECLARE DIGITO_1_CPF CHAR(2);
    DECLARE DIGITO_2_CPF CHAR(2);

    SET NR_DOCUMENTO_AUX = LTRIM(RTRIM(CPF));
    IF (NR_DOCUMENTO_AUX IN ('00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999', '12345678909')) THEN
        RETURN 0;
    END IF;

    IF (LENGTH(NR_DOCUMENTO_AUX) <> 11) THEN
        RETURN 0;
    ELSE 

   SET DIGITO_1_CPF = SUBSTRING(NR_DOCUMENTO_AUX,LENGTH(NR_DOCUMENTO_AUX)-1,1);
   SET DIGITO_2_CPF = SUBSTRING(NR_DOCUMENTO_AUX,LENGTH(NR_DOCUMENTO_AUX),1);

        SET SOMA = 0;
        SET INDICE = 1;
        WHILE (INDICE <= 9) DO          
            SET Soma = Soma + CAST(SUBSTRING(NR_DOCUMENTO_AUX,INDICE,1) AS UNSIGNED) * (11 - INDICE);             
            SET INDICE = INDICE + 1;      
         END WHILE;      
         SET DIGITO_1 = 11 - (SOMA % 11);      
         IF (DIGITO_1 > 9) THEN
            SET DIGITO_1 = 0;
         END IF;

        SET SOMA = 0;
        SET INDICE = 1;
        WHILE (INDICE <= 10) DO
             SET Soma = Soma + CAST(SUBSTRING(NR_DOCUMENTO_AUX,INDICE,1) AS UNSIGNED) * (12 - INDICE);              
             SET INDICE = INDICE + 1;
        END WHILE;
        SET DIGITO_2 = 11 - (SOMA % 11);
        IF DIGITO_2 > 9 THEN
            SET DIGITO_2 = 0;
        END IF;
        
        IF (DIGITO_1 = DIGITO_1_CPF) AND (DIGITO_2 = DIGITO_2_CPF) THEN
            RETURN 1;
        ELSE
            RETURN 0;
        END IF;
 END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_atuacao`
--

CREATE TABLE `area_atuacao` (
  `id_area_atuacao` int(11) NOT NULL,
  `nom_area_atuacao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area_atuacao`
--

INSERT INTO `area_atuacao` (`id_area_atuacao`, `nom_area_atuacao`) VALUES
(1, 'farmacêutica'),
(2, 'cosméticos'),
(3, 'industrial'),
(4, 'professor'),
(5, 'pesquisador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_atuacao_cientista`
--

CREATE TABLE `area_atuacao_cientista` (
  `fk_id_cientista` int(11) DEFAULT NULL,
  `fk_id_area_atuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area_atuacao_cientista`
--

INSERT INTO `area_atuacao_cientista` (`fk_id_cientista`, `fk_id_area_atuacao`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cientista`
--

CREATE TABLE `cientista` (
  `id_cientista` int(11) NOT NULL,
  `nom_cientista` varchar(50) NOT NULL,
  `cpf_cientista` varchar(11) NOT NULL,
  `dtn_cientista` date NOT NULL,
  `email_cientista` varchar(50) NOT NULL,
  `email_alternativo_cientista` varchar(50) NOT NULL,
  `lattes_cientista` varchar(50) NOT NULL,
  `snh_cientista` varchar(10) NOT NULL,
  `senha_cientistas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cientista`
--

INSERT INTO `cientista` (`id_cientista`, `nom_cientista`, `cpf_cientista`, `dtn_cientista`, `email_cientista`, `email_alternativo_cientista`, `lattes_cientista`, `snh_cientista`, `senha_cientistas`) VALUES
(1, 'Marina', '50037158899', '2003-02-03', 'mgajego@gmail.com', 'marinagajego@gmail.com', 'Marina Gajego', 'teste', '1234'),
(2, 'José', '43040714830', '1997-04-16', 'joseb@gmail.com', 'joselb@gmail.com', 'José Luiz Bianchini', 'teste2', 'zezin'),
(3, 'José Rubens', '12345685299', '1995-06-09', 'joserubens@gmail.com', 'josemartinez@gmail.com', 'José Martinez', 'teste3', 'bbq2'),
(4, 'Claudia', '92385468955', '2000-05-09', 'claudia@gmail.com', 'claudiaperez@gmail.com', 'Claudia Perez', 'teste4', '56883e'),
(5, 'Sandra', '85598648822', '1985-07-28', 'sandra@gmail.com', 'sandramelo@gmail.com', 'Sandra Melo', 'teste5', 'da1e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `dti_formacao` date NOT NULL,
  `dtt_formacao` date NOT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL,
  `fk_id_titulacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`dti_formacao`, `dtt_formacao`, `fk_id_cientista`, `fk_id_titulacao`) VALUES
('2017-10-01', '2021-10-18', 1, 2),
('2014-02-12', '2017-10-31', 2, 1),
('2013-02-04', '2018-12-07', 3, 3),
('2014-02-10', '2017-02-03', 4, 2),
('1998-02-02', '2003-10-01', 5, 3);

--
-- Acionadores `formacao`
--
DELIMITER $$
CREATE TRIGGER `alteraData` AFTER INSERT ON `formacao` FOR EACH ROW BEGIN
UPDATE DTI_FORMACAO SET DTI_FORMACAO = date_format(str_to_date(DTI_FORMACAO, '%Y-%m-%d'), '%d-%m-%Y') 
WHERE data LIKE '____-__-__';
UPDATE DTT_FORMACAO SET DTT_FORMACAO = date_format(str_to_date(DTT_FORMACAO, '%Y-%m-%d'), '%d-%m-%Y') 
WHERE data LIKE '____-__-__';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL,
  `tit_projeto` varchar(50) NOT NULL,
  `res_projeto` varchar(250) NOT NULL,
  `dti_projeto` date NOT NULL,
  `dtt_projeto` date NOT NULL,
  `pub_projeto` bit(1) NOT NULL,
  `fk_id_cientista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `tit_projeto`, `res_projeto`, `dti_projeto`, `dtt_projeto`, `pub_projeto`, `fk_id_cientista`) VALUES
(2, 'Projeto um', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '2022-10-01', '2022-12-03', b'1', 1),
(3, 'Projeto dois', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '2022-01-01', '2022-12-01', b'1', 2),
(4, 'Projeto tres', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '2021-01-01', '2023-05-19', b'1', 3),
(5, 'Projeto cinco', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '2015-06-28', '2018-04-20', b'1', 4),
(6, 'Projeto quatro', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '2019-08-15', '2023-01-20', b'1', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE `redes_sociais` (
  `id_rede_social` int(11) NOT NULL,
  `end_rede_social` varchar(50) NOT NULL,
  `tip_rede_social` char(1) NOT NULL,
  `fk_id_cientista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`id_rede_social`, `end_rede_social`, `tip_rede_social`, `fk_id_cientista`) VALUES
(2, 'instagram', 'I', 1),
(3, 'TikTok', 'T', 2),
(4, 'Facebook', 'F', 3),
(5, 'Twitter', 'T', 4),
(6, 'Snapchat', 'S', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `ddd_telefone` decimal(2,0) NOT NULL,
  `num_telefone` varchar(10) NOT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`ddd_telefone`, `num_telefone`, `fk_id_cientista`) VALUES
('16', '992960806', 1),
('16', '99286529', 2),
('18', '991845026', 3),
('16', '993789562', 4),
('18', '998563030', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulacao`
--

CREATE TABLE `titulacao` (
  `id_titulacao` int(11) NOT NULL,
  `nom_titulaco` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `titulacao`
--

INSERT INTO `titulacao` (`id_titulacao`, `nom_titulaco`) VALUES
(1, 'mestre'),
(2, 'doutor'),
(3, 'cientista');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area_atuacao`
--
ALTER TABLE `area_atuacao`
  ADD PRIMARY KEY (`id_area_atuacao`);

--
-- Índices para tabela `area_atuacao_cientista`
--
ALTER TABLE `area_atuacao_cientista`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`),
  ADD KEY `fk_id_area_atuacao` (`fk_id_area_atuacao`);

--
-- Índices para tabela `cientista`
--
ALTER TABLE `cientista`
  ADD PRIMARY KEY (`id_cientista`);

--
-- Índices para tabela `formacao`
--
ALTER TABLE `formacao`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`),
  ADD KEY `fk_id_titulacao` (`fk_id_titulacao`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD PRIMARY KEY (`id_rede_social`),
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `titulacao`
--
ALTER TABLE `titulacao`
  ADD PRIMARY KEY (`id_titulacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area_atuacao`
--
ALTER TABLE `area_atuacao`
  MODIFY `id_area_atuacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cientista`
--
ALTER TABLE `cientista`
  MODIFY `id_cientista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  MODIFY `id_rede_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `titulacao`
--
ALTER TABLE `titulacao`
  MODIFY `id_titulacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `area_atuacao_cientista`
--
ALTER TABLE `area_atuacao_cientista`
  ADD CONSTRAINT `area_atuacao_cientista_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`),
  ADD CONSTRAINT `area_atuacao_cientista_ibfk_2` FOREIGN KEY (`fk_id_area_atuacao`) REFERENCES `area_atuacao` (`id_area_atuacao`);

--
-- Limitadores para a tabela `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `formacao_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`),
  ADD CONSTRAINT `formacao_ibfk_2` FOREIGN KEY (`fk_id_titulacao`) REFERENCES `titulacao` (`id_titulacao`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);

--
-- Limitadores para a tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD CONSTRAINT `redes_sociais_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
