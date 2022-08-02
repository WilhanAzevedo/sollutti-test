
## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/WilhanAzevedo/sollutti-test.git
```

Entre no diretório do projeto

```bash
  cd sollutti-test
```

Configure as variaveis de ambiente no .env


Instale as dependências

```bash
  composer install
```

Copie ```.env.example``` para ```.env```

Configure os dados do servidor de Email

EXEMPLO
```bash
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=cf5e00ed0c2
    MAIL_PASSWORD=ce273118430
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=teste@email.com
    MAIL_FROM_NAME="${APP_NAME}"
```

Execute o Docker

```bash
    docker-compose up -d
```

Execute as migrations

```bash
    php artisan migrate
```

Inicie o servidor

```bash
    php artisan serve
```

Inicie as filas
    
```bash
    php artisan queue:work
```
