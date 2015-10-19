#!/bin/bash
IMG_NAME=umbccd/batesmotel
CONT_NAME=batesmotel
HTTP_EXPOSE_PORT=8000

if [ "$1" == "build" ]; then
	docker build -t $IMG_NAME . 

elif [ "$1" == "run" ]; then
	docker run -d -p $HTTP_EXPOSE_PORT:80 --name $CONT_NAME $IMG_NAME


elif [ "$1" == "rm" ]; then
	docker stop -t 1 $CONT_NAME
	docker rm $CONT_NAME

elif [ "$1" == "setup" ]; then
	docker exec -d $CONT_NAME /tmp/setup.sh
	docker exec -d $CONT_NAME rm /tmp/setup.sh

elif [ "$1" == "enter" ]; then 
	docker exec -it $CONT_NAME /bin/bash

fi

