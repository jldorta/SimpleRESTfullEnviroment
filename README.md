# SimpleRESTfullEnviroment

### Configuration
Edit .env file to modify default values

### Start the enviroment
```
docker-compose up -d
docker-compose ps
```

### Usage
*GET*
```
[SERVER]/api/data/:table[/:id]?[field=Value][field_like=Like]
```

*POST*
```
[SERVER]/api/data/:table
```

*PUT*
```
[SERVER]/api/data/:table/:id
```

*DELETE*
```
[SERVER]/api/data/:table/:id
```

