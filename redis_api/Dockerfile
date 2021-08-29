FROM centos:7
ENV TZ=America/Recife
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && yum update -y && yum -y install epel-release \ 
&& yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm -y && yum install yum-utils \ 
&& yum-config-manager --enable remi-php72 && yum update -y && yum install httpd php72 -y &&yum install php-redis -y && yum install php -y
COPY push_cred.php /var/www/html/