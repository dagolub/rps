#### How to play
```bash
docker pull dagolub/rps
docker run -it --rm dagolub/rps
```
If you want choose number of games
```bash
docker run -it --rm dagolub/rps php /code/bin/console.php app:game --number-games=5
```
#### How to test
```bash
docker pull dagolub/rps:test
docker run -it --rm dagolub/rps
```
#### How to debug
[Read this](https://500.keboola.com/xdebug-for-a-cli-app-in-docker-and-phpstorm-66a939c2c603)
```
docker pull dagolub/rps:xdebug
docker run -it --rm \
--env "XDEBUG_CONFIG=remote_host=docker.for.mac.localhost remote_port=9000" \
--env "PHP_IDE_CONFIG=serverName=rps" \
dagolub/rps:xdebug php /code/bin/console.php
```