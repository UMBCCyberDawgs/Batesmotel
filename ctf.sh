#!/bin/bash
IMG_NAME=umbccd/batesmotel
CONT_NAME=batesmotel
HTTP_EXPOSE_PORT=8000

if [ -z "$1" ]; then
	echo "Usage: $0 [build | run | rm | setup | enter]"
	exit 1
fi

# Builds the Bates Motel docker image
if [ "$1" == "build" ]; then
	docker build -t $IMG_NAME . 

# Runs containters in background (-d), Mounts a Volume (-v), Hosts website on http://127.0.0.1:8000 (-p), Renames container/image
elif [ "$1" == "run" ]; then
	docker run -d -v $(pwd)/www:/var/www/html/ -p 127.0.0.1:$HTTP_EXPOSE_PORT:80 --name $CONT_NAME $IMG_NAME

elif [ "$1" == "rm" ]; then
	docker stop $CONT_NAME
	docker rm -f $CONT_NAME

elif [ "$1" == "setup" ]; then
	docker exec -d $CONT_NAME mkdir -p /run/php-fpm
	docker exec -d $CONT_NAME /usr/sbin/php-fpm
	docker exec -d $CONT_NAME /tmp/setup.sh
	docker exec -d $CONT_NAME rm /tmp/setup.sh

elif [ "$1" == "enter" ]; then 
	docker exec -it $CONT_NAME /bin/bash

else
	echo "Unknown command"

fi

