FROM  nginx:latest

LABEL key="Celso Henrique Taliatelli <celsotaliatelli>"

RUN apt-get update

COPY app /usr/share/nginx/html/app

RUN chown -R www-data:www-data /usr/share/nginx/html/app

EXPOSE 80