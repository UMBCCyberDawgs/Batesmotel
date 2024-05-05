FROM rockylinux:8.6.20227707
MAINTAINER Julio Valcarcel <julio.valcarcel@sofiac.us>

RUN yum install -y epel-release
RUN yum install -y httpd php php-mysqlnd mariadb-server supervisor

#COPY inc/www.tar.xz /var/www/html/www.tar.xz

# Using a volume instead
# COPY www /var/www/html/

# If we want to update these files, we will need to rebuild the container
COPY inc/supervisord.ini /etc/supervisord.d/docker.ini
COPY inc/setup.sh /tmp/setup.sh
#COPY inc/my.cnf /etc/my.cnf

RUN sed -i.bak 's/^\(display_errors\ =\ \).*/\1On/' /etc/php.ini
RUN /usr/bin/mysql_install_db; chown -R mysql:mysql /var/lib/mysql
RUN chmod u+x /tmp/setup.sh; chmod 4755 /bin/ping;


#RUN cd /var/www/html; tar xf www.tar.xz

EXPOSE 80
EXPOSE 3306

CMD [ "/usr/bin/supervisord" ]
