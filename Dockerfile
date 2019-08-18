FROM php:7.3-alpine

RUN mkdir /srv/carnet
WORKDIR /srv/carnet
RUN apk add git
RUN apk add composer
RUN git clone https://github.com/christophenguyen-icademie/carnet.git /srv/carnet
RUN composer install

EXPOSE 8000

CMD php bin/console server:run 0.0.0.0:8000
