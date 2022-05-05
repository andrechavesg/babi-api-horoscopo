![alt text](./public/babi.png)

A babi é sua API para realizar consultas do seu horóscopo diário e semanal de forma simples. 

## Como usar

Você pode realizar consultas através do nome do signo através da seguinte URL:

```
### GET Horóscopo diário pelo signo

localhost/signo/{signo}/dia

### GET Horóscopo semanal pelo signo

localhost/signo/{signo}/semana
```
Lista de signos disponíveis:
```
    aquario
    peixes
    aries
    touro
    gemeos
    cancer
    leao
    virgem
    libra
    escorpiao
    sagitario
    capricornio
```
Para realizar consultas pela data de nascimento, utilize a segunte URL:
```

### GET Horóscopo diário pela data de nascimento

localhost/{dataDeNascimento}/dia

### GET Horóscopo semanal pelo signo

localhost/{dataDeNascimento}/semana

```
A data pode ser passada nos formatos:
```
dd-mm-AAAA
AAAA-mm-dd
AAAAmmdd
timestamp
```
Exemplo de retorno:
```
{
    "signo": "aries",
    "texto": "Enquanto seu regente avança pelo signo de Touro você estará se sentindo estimulado a tomar iniciativas no lado econômico de sua vida. Você poderá fazer aquisição de bens materiais ou poderá ainda fazer novos investimentos. No entanto, lembre-se de que deve ser prudente, pois há uma tendência a se iludir devido a um aspecto astrológico do seu regente com o planeta Netuno. Na realidade, essa configuração pode ser muito boa para aqueles que desejam iniciar um novo relacionamento amoroso que, porém, terá tendência a durar pouco. Mas nesse período carnavalesco, o que esperar?",
    "autor": "Astróloga Graziella Marraccini",
    "urlOrigem": "https://www.somostodosum.com.br/horoscopo/signo/aries.html",
    "dataAcesso": {
        "date": "2019-02-26 04:38:34.865710",
        "timezone_type": 3,
        "timezone": "Europe/Paris"
    }
}
```
[![run in postman](https://run.pstmn.io/button.svg)](https://www.getpostman.com/collections/f9e27539b258bfaedfe3)
## Quer ajudar?

Para subir um servidor em localhost:80, basta executar os comandos:
```
docker-compose build
docker-compose up -d
```
Na pasta raiz do projeto

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
