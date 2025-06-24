#!/bin/bash

# Absolute path to PHP binary (adjust if needed)
PHP_BIN="/usr/bin/php"

# Absolute path to cron.php (adjust path below if needed)
CRON_FILE="$(pwd)/cron.php"

# Cron expression to run every hour
CRON_JOB="0 * * * * $PHP_BIN $CRON_FILE > /dev/null 2>&1"

# Check if job is already added
(crontab -l 2>/dev/null | grep -v -F "$CRON_FILE"; echo "$CRON_JOB") | crontab -

echo "✅ CRON job set to run cron.php every hour"
