FROM wordpress:php7.3-apache


ENV APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=DontWarn
ENV ACCEPT_EULA=Y
RUN apt-get update && apt-get install -y gnupg2 && apt-get install -y --no-install-recommends apt-utils
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN echo "deb http://packages.microsoft.com/ubuntu/16.04/prod xenial main xenial main" >> /etc/apt/sources.list 
RUN apt-get install -y --no-install-recommends locales apt-transport-https
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen 
RUN locale-gen
RUN apt-get update
RUN apt-get -y --no-install-recommends install unixodbc-dev msodbcsql17

RUN docker-php-ext-install mbstring pdo pdo_mysql \
    && pecl install sqlsrv pdo_sqlsrv xdebug \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug
