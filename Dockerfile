#Se descarga version del servidor
FROM ubuntu:focal

#agregamos esto para que no se interactue con la shell mientras se instalan dependencias
ARG DEBIAN_FRONTEND=noninteractive

#actualizamos
RUN apt-get update

#instalamos apache2
RUN apt-get install -y apache2

#instalamos dependencias de php y mysql
RUN apt-get install -y php7.4
RUN apt-get install -y php7.4-mysql

#instalamos git
RUN apt-get install -y git


#se abre los puertos por defecto HTTP y HTTPS 80 y 443
EXPOSE 80 433

#definimos ENTRYPOINT
ENTRYPOINT ["/usr/sbin/apache2ctl"]
CMD ["-D","FOREGROUND"]