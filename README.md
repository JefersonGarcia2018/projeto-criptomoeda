<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# Projeto desenvolvido utilizando Laravel 9 + PHP 8 + Mysql

Este projeto foi desenvolvido em LARAVEL com objetivo de buscar os preços de criptomoedas fornecidos pela da API da BINANCE através do endpoint: https://testnet.binancefuture.com/fapi/v1/ticker/price .
## Funcionalidades do Sistema
A busca desses dados é realizada através da interface de linha de comando Artisan do Laravel.
Foram criados dois comandos Artisan:
- php artisan c:saveBidPriceOnDataBase --> busca dados de criptomoedas no endpoint https://testnet.binancefuture.com/fapi/v1/ticker/price e os salva na Base de Dados Mysql.
- php artisan c:checkAvgBidPrice --> verifica o preço médio da criptomoeda informada e retorna se o preço (último) está menor do que 0.5% do que o preço médio.

## Ambiente de desenvolvimento
Projeto implementado e rodado em ambiente de desenvolvimento local, com sistema operacional Windows e pacote XAMPP: servidor web Apche e banco de dados MySQL.

## Baixar o projeto
Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/JefersonGarcia2018/projeto-criptomoeda.git

# Acessar o diretório do projeto
cd projeto-criptomoeda
```

## Configuração
``` bash
# Atualizar dependências
composer install

# Configurar variáveis de ambiente
cp .env.example .env
# após executar o comando acima, crie a Base de Dados MySQL com o mome que você preferir, e atribua este nome a váriável BD_DATABASE que está contida no arquivo .env

#Agora, deve-se gerar a [ APP_KEY ] com o seguinte comando:
php artisan key:generate

# Executar migrations (tabelas)
php artisan migrate
```
