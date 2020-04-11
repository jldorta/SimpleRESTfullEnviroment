# SimpleRESTfullEnviroment
<img align="left" width="auto" height="40" src="https://cdn.iconscout.com/icon/free/png-256/docker-226091.png">
<img align="left" width="auto" height="40" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1200px-Webysther_20160423_-_Elephpant.svg.png">
<img align="left" width="auto" height="40" src="https://dzone.com/storage/temp/11479913-mariadb.png">

<hr>

## Configuration
Edit .env file to modify default values

### Start the enviroment
```bash
docker-compose up -d
```
### List Ports
```bash
docker-compose ps
```

## Usage
### GET
```
[SERVER]/api/data/:table[/:id]?[field=Value][field_like=Like]
```

### POST
```
[SERVER]/api/data/:table
```

### PUT
```
[SERVER]/api/data/:table/:id
```

### DELETE
```
[SERVER]/api/data/:table/:id
```

