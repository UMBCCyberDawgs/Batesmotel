FROM centos:6.6
RUN yum update -y; yum install -y httpd
RUN yum install -y mysql mysql-server
RUN echo "NETWORKING=yes" > /etc/sysconfig/network
RUN /sbin/service mysqld start
RUN yum install -y php php-mysql php-devel php-gd php-pecl-memcache
RUN yum install -y openssh-server openssh-clients passwd

RUN ssh-keygen -q -N "" -t dsa -f /etc/ssh/ssh_host_dsa_key && ssh-keygen -q -N "" -t rsa -f /etc/ssh/ssh_host_rsa_key 

RUN mkdir -p /root/.ssh && touch /root/.ssh/authorized_keys && chmod 700 /root/.ssh
ADD id_rsa.pub /root/.ssh/authorized_keys

#ADD phpinfo.php /var/www/html
ADD www/ /var/www/html/
EXPOSE 22 80 443
