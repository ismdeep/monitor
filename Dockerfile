FROM ismdeep/nginx-php:ubuntu-20-04

MAINTAINER L. Jiang <l.jiang.1024@gmail.com>

RUN  mkdir -p      /var/www/monitor/
Add  .             /var/www/monitor/

RUN cd /var/www/monitor;git describe --abbrev=0 --tags > /monitor-version
RUN cd /var/www/monitor;rm -rfv .git

COPY nginx-config /etc/nginx/sites-enabled/monitor
RUN cd /var/www/monitor; mkdir runtime; chmod -R 777 runtime
RUN cd /var/www/monitor && composer install
