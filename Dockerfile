# Use Fedora 40 as base image
FROM fedora:40
LABEL maintainer="UMBC CyberDawgs dawgsec@umbc.edu"

# Install necessary packages
RUN dnf install -y httpd php php-mysqlnd mariadb-server supervisor \
    && dnf clean all

# Copy configuration files
COPY inc/supervisord.ini /etc/supervisord.d/docker.ini
COPY inc/setup.sh /tmp/setup.sh

# Update PHP configuration
RUN sed -i.bak 's/^\(display_errors\ =\ \).*/\1On/' /etc/php.ini

# Initialize the MySQL data directory and create the system databases
RUN /usr/bin/mysql_install_db

# Change ownership of MySQL directories to mysql user
RUN chown -R mysql:mysql /var/lib/mysql

# Make setup.sh script executable
RUN chmod u+x /tmp/setup.sh 

#RUN chmod 4755 /bin/ping; TO-DO FIX!!

# Expose ports
EXPOSE 80
EXPOSE 3306

# Run process manager
CMD ["/usr/bin/supervisord"]
