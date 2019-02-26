# Babi
![alt text](./public/babi.png)

A babi é sua API para realizar consultas do seu horóscopo diário e semanal de forma simples. 

## Getting Started

Você pode realizar consultas através do nome do signo através da seguinte URL:

```
### GET Horóscopo diário pelo signo

babi.hefesto.io/signo/{signo}/dia

### GET Horóscopo semanal pelo signo

babi.hefesto.io/signo/{signo}/semana
```
Para realizar consultas pela data de nascimento, utilize a segunte URL:
```

### GET Horóscopo diário pela data de nascimento

babi.hefesto.io/{dataDeNascimento}/dia

### GET Horóscopo semanal pelo signo

babi.hefesto.io/{dataDeNascimento}/semana

```

## Quer ajudar?

Para subir um servidor para desenvolvimento, basta executar os comandos:
```
docker-compose build
docker-compose up -d
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
