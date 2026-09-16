# Desafio_formulario


Estrutura do Banco de Dados
CREATE DATABASE IF NOT EXISTS usuarios;
USE usuarios;
CREATE TABLE IF NOT EXISTS inscricoes (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(150) NOT NULL,
cpf VARCHAR(14) NOT NULL,
email VARCHAR(150) NOT NULL,
municipio VARCHAR(50) NOT NULL,
telefone VARCHAR(20) NOT NULL,
criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

 Como Executar o Projeto Localmente
-- Pré-requisitos --
• Servidor local Web Apache + PHP (ex: XAMPP, WAMP ou Laragon).
• Banco de Dados MySQL ativo.

-- Passo a Passo --
Clonar o Repositório:
git clone https://github.com/AdrianMendess/Desafio_formulario.git
Mover para o Servidor Web:
Cole a pasta clonada no diretório do servidor (ex: htdocs no XAMPP ou www no WAMP).
Configuração do Banco:
Crie o banco de dados e a tabela utilizando o script SQL acima. Em seguida, ajuste o arquivo conexao.php com as credenciais do seu ambiente:
host = 'localhost';
db = 'usuarios';
usuario = 'root';
senha = 'sua_senha';

Acesso no Navegador:
• Formulário de Inscrição: http://localhost/Desafio_formulario/index.php
• Dashboard (/status): http://localhost/Desafio_formulario/status.php
 Organização do Projeto
- conexao.php # Lógica de conexão com o banco de dados via PDO

- index.php # Camada de apresentação (Formulário)

- validacao.php # Regras de sanitização, validação e inserção SQL

- status.php # Camada de apresentação da rota /status (Dashboard)

- status.js # Consumo da API via Fetch e configuração do Chart.js

- status_dados.php # API Backend que gera os dados agregados em JSON

Desenvolvido por Adrian Mendes

