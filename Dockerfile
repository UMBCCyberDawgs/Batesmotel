FROM centos:latest
MAINTAINER Julio Valcarcel <julio.valcarcel@sofiac.us>

RUN yum install -y epel-release
RUN yum install -y httpd php php-mysql mariadb-server supervisor

#COPY inc/www.tar.xz /var/www/html/www.tar.xz
COPY www /var/www/html/
COPY inc/supervisord.ini /etc/supervisord.d/docker.ini
COPY inc/setup.sh /tmp/setup.sh
#COPY inc/my.cnf /etc/my.cnf

RUN sed -i.bak 's/^\(display_errors\ =\ \).*/\1On/' /etc/php.ini
RUN /usr/bin/mysql_install_db; chown -R mysql:mysql /var/lib/mysql
RUN chmod u+x /tmp/setup.sh; chmod 4755 /bin/ping;
RUN mkdir -p /run/php-fpm


#RUN cd /var/www/html; tar xf www.tar.xz

EXPOSE 80
EXPOSE 3306

CMD [ "/usr/bin/supervisord" ]
