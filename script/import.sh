mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < $1  
mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE -e "update wp_options set option_value='${URL}' WHERE option_name='home' OR option_name='siteurl'"
