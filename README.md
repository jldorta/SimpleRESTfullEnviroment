# SimpleRESTfullEnviroment

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

