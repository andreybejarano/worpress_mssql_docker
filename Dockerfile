FROM wordpress:4.9.8-php7.2-apache@sha256:54ccbf55f2f303caae2aa8ebb644796b9240a0541831c0ac51bf372de008da24


ENV APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=DontWarn
ENV ACCEPT_EULA=Y
RUN apt-get install gcc
RUN apt-get upgrade libstdc++6
RUN apt-get update && apt-get install -y gnupg2 && apt-get install -y --no-install-recommends apt-utils
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get install -y --no-install-recommends locales apt-transport-https 
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen 
RUN locale-gen
RUN apt-get update
RUN apt-get -y --no-install-recommends install unixodbc-dev msodbcsql17 

RUN docker-php-ext-install mbstring pdo pdo_mysql \
    && pecl install sqlsrv pdo_sqlsrv xdebug \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug