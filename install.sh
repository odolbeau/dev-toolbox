# Clear cache
chmod -R 777 app/cache app/logs
app/console cache:warmup

# Install assets
app/console assets:install web

# Clear cache
chmod -R 777 app/cache app/logs
app/console cache:warmup
