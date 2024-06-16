# Weather App

Este é um aplicativo web desenvolvido em PHP e Bootstrap que consome a API do OpenWeather para fornecer informações meteorológicas.

![apiapp](https://github.com/Rafssxx/ClimaApi-php/assets/168215489/f53fdeff-1cef-4a4b-ac7f-dff8d655eb5f)


## Funcionalidades

- Exibe a temperatura atual, e condições climáticas de qualquer cidade.
- Interface responsiva construída com Bootstrap.
- Consumo da API do OpenWeather para obter dados meteorológicos em tempo real.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação do lado do servidor.
- **Bootstrap**: Framework CSS para design responsivo e moderno.
- **OpenWeather API**: Serviço de terceiros utilizado para obter dados meteorológicos.

## Requisitos

- PHP 7.0 ou superior
- Servidor web (Apache, Nginx, etc.)
- Chave de API do OpenWeather

## Utilização

Para receber uma **key** da api open weather deve ser realizaado um login na plataforma  *https://openweathermap.org/*, apos realizar login basta clicar no icone do seu perfil e acessar <code> api keys </code> como mostra as fotos abaixo.


![apiproject](https://github.com/Rafssxx/ClimaApi-php/assets/168215489/588ea378-4333-4b64-8ae1-1a00fdfacbae)


![apikey](https://github.com/Rafssxx/ClimaApi-php/assets/168215489/b9e49bb9-3d8f-4697-ab70-f80d0ddb3135)

Apos receber a key basta mudar o trecho de codigo <code> "Sua key da api" </code> no arquivo ApiService.php para a sua key fornecida na plataforma da openWeather
<pre>
  <code>
    class ApiService
{
    private $key = "Sua key da api";
    private $city;
  </code>
</pre>


