# JobsSilicon

Este é um projeto de sistema de inscrição de candidatos a uma oportunidade de emprego.

## Instalação e Execução

Para instalar e executar o projeto, siga as seguintes etapas:

1. Clone o projeto em seu ambiente local:
2. Certifique-se de que você tem o Docker instalado em seu sistema.
3. Na raiz do projeto, execute o seguinte comando para baixar as dependências do projeto:
```bash
composer install
```
4. Certifique-se de ter criado o arquivo .env.

5. Na raiz do projeto, execute o seguinte comando para iniciar o projeto:
```bash
./vendor/bin/sail up
```

6. Em seguida, execute os seguintes comandos para migrar e popular o banco de dados:
```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=AddressesSeeder
./vendor/bin/sail artisan db:seed --class=JobSeeder
./vendor/bin/sail artisan db:seed --class=CandidateSeeder
```
    
7. Agora o projeto está pronto para ser executado. Acesse-o em seu navegador usando o endereço `http://localhost`.
