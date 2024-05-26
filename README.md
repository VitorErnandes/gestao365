Sistema de gerenciamento de empresas.

O projeto foi criado com o laravel 10 utilizando o template sneat-bootstrap-html-laravel-admin-template-free da themeselection.

Para utilizar o sistema, é necessário seguis os passoa abaixo.

1. Clonar o repositório.
2. Criar ou alterar caso já exista, o arquivo .env na raiz do projeto
3. Ajustar a conexão com o banco de dados no arquivo .env. O projeto foi projetado no mysql, então recomando que seja utilizado-o também para evitar quaisquer incopatibilidades.
4. Executar o comando para criar as migrations e seeds no banco de dados: php artisan migrate --seed

Após ter o banco de dados já com as tabelas e seus dados de permissionamento, siga o passo a passo para a instalação e configuração do front-end.

1. Execute o comando a seguir para instalar todos os pacotes necessários: npm install
2. Execute o comando a seguir para compilar os arquivos em modo de desenvolviment: npm run dev
3. Execute o comando a seguir para compilar os arquivos em modo de produção: npm run build

Com todo o passo a passo anterior feito, o projeto deve funcionar perfeitamente, então acesse e faça login no sistema a partir do link: http://localhost/gestao365/public/login e com as credênciais abaixo.

Login: superadmin@gestao365.com
Senha: G3zTã0E6S

Essas credênciais são criadas com a seeder UserSeeder que fica dentro de database/seeders/UserSeeder

Após login no sistema, você poderá criar novos usuários e regras e definir assim as permissões já existentes para os mesmos.
