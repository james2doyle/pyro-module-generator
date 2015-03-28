FROM szeist/phalcon-apache2

# Add repository files to server
ADD ./pyro-module-generator /var/www
WORKDIR /var/www

# make dirs writable
RUN chmod -R 777 /var/www/cache/volt
RUN chmod -R 777 /var/www/public/generated

# update the config for empty base_url
RUN sed -i -e "s/pyro-module-generator\///" /var/www/config/config.php

# Command to start the app
ENTRYPOINT ["/usr/sbin/apache2"]
CMD ["-D", "FOREGROUND"]
