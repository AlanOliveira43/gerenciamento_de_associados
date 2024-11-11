# Gerenciamento de Associados

Projeto de Gerenciamento de Associados utilizando PHP e PostgreSQL. Este projeto permite cadastrar associados, gerenciar anuidades e controlar o status de pagamentos.

## Requisitos

Para rodar este projeto, você precisará de:

- **PHP** (versão 7.4 ou superior) com extensão `pdo_pgsql` habilitada
- **PostgreSQL** (versão 12 ou superior)
- **Servidor Web** como Apache ou Nginx (opcional, mas recomendado)

## Configuração do Ambiente

### 1. Clone o Repositório

Clone o repositório para sua máquina:


git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio

### 2. Instale o PHP e o Servidor Web (opcional)
Se você não tiver PHP instalado, pode usar XAMPP ou WAMP para instalar PHP e um servidor local (Apache).

### 3. Configure o Arquivo config.php
No arquivo config.php, configure a conexão ao banco de dados PostgreSQL com suas credenciais:
Certifique-se de ajustar:

- **host:** geralmente localhost, mas pode mudar.
- **dbname:** nome do banco de dados, neste caso, associacao.
- **usuário e senha:** use o nome de usuário e senha configurados para o PostgreSQL na sua máquina.

### 4. Verifique o Arquivo php.ini

Para que o PHP se conecte ao PostgreSQL, a extensão pdo_pgsql precisa estar habilitada. No arquivo php.ini, 
-  Descomente a linha: extension=pdo_pgsql

-  Reinicie o servidor PHP/Apache após alterar o php.ini.

## Rodando o Projeto

-  Inicie o servidor web:

- Se estiver usando PHP embutido:php -S localhost:4000

- Abra o navegador e vá para:http://localhost:4000/gerenciamento_de_associados/src/index.php