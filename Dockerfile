FROM ismdeep/nginx-php:ubuntu-20-04

MAINTAINER L. Jiang <l.jiang.1024@gmail.com>

RUN  mkdir -p      /var/www/monitor/
Add  .             /var/www/monitor/

RUN cd /var/www/monitor;git describe --abbrev=0 --tags > /monitor-version
RUN cd /var/www/monitor;rm -rfv .git
RUN cd /var/www/monitor/storage; chmod -R 777 logs
RUN cd /var/www/monitor/storage; chmod -R 777 framework

COPY nginx-config /etc/nginx/sites-enabled/monitor
RUN cd /var/www/monitor && composer install
