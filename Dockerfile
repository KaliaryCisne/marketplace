FROM bitnami/minideb:buster
RUN mkdir -p /var/www
ADD . /var/www
WORKDIR /var/www
RUN chmod +x /var/www/azure/build.sh
RUN /var/www/azure/build.sh
EXPOSE 80
RUN chmod +x /var/www/azure/run.sh
CMD /var/www/azure/run.sh
