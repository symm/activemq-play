## Getting started
`docker-compose up`


## Admin overview

Navigate to: http://localhost:8161/admin

Login with 

`admin:admin`

## Demo code (PHP)

`cd example-code`

To demo Virtual topic with two consumers reading from their own queues:

```
php produce.php
php consumer-a.php
php consumer-b.php
```
