FROM bitnami/minideb:buster
RUN mkdir -p /var/www
ADD . /var/www
WORKDIR /var/www
RUN chmod +x /var/www/dependencies/build.sh
RUN /var/www/dependencies/build.sh
EXPOSE 80
