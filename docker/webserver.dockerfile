FROM nginx:alpine
LABEL maintainer="rogerio"

ADD ./docker/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html