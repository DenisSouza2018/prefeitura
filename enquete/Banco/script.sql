CREATE TABLE `enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titulo` varchar(10) NOT NULL,
  `op1` varchar(20) DEFAULT '',
  `op1_qtd` int(10) DEFAULT 0,
  `op2` varchar(20) DEFAULT '',
  `op2_qtd` int(10) DEFAULT 0,
  `op3` varchar(20) DEFAULT '',
  `op3_qtd` int(10) DEFAULT 0,
  `op4` varchar(20) DEFAULT '',
  `op4_qtd` int(10) DEFAULT 0,
  `op5` varchar(20) DEFAULT '',
  `op5_qtd` int(10) DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT 'INATIVO'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `enquete_historico` (
  `id` int(11) NOT NULL,
  `ip` int(20) DEFAULT NULL,
  `id_enquete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enquente_historico`
--
ALTER TABLE `enquente_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_enquete` (`id_enquete`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enquente_historico`
--
ALTER TABLE `enquente_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `enquente_historico`
--
ALTER TABLE `enquente_historico`
  ADD CONSTRAINT `enquente_historico_ibfk_1` FOREIGN KEY (`id_enquete`) REFERENCES `enquente` (`id`);
COMMIT;