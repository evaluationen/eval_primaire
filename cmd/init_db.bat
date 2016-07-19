echo "initialisation de la Base de données"

set datetimef=%date:~-4%_%date:~3,2%_%date:~0,2%__%time:~0,2%_%time:~3,2%_%time:~6,2%

mysql -u root --execute="GRANT USAGE ON *.* TO 'eval'@'localhost';"
mysql -u root --execute="DROP USER IF EXISTS 'eval'@'localhost';"
mysql -u root --execute="FLUSH PRIVILEGES;"
mysql -u root --execute="CREATE USER 'eval'@'localhost' IDENTIFIED BY 'eval976$';"

REM %date%_%time:~0,8%

mysqldump -u root evaluation | gzip > C:/wamp/www/eval_primaire/backup_db/"evaluation_mysql_"%datetimef%.sql.gz

rem cd ../backup_db/
rem set "before=evaluation_mysql.sql.gz"  rem renommer le fichier
rem set "after=evaluation_mysql_%time:~0,2%.sql.gz" 
rem ren %before% %after%

mysql -u root --execute="SET FOREIGN_KEY_CHECKS = 0;"
mysql -u root --execute="DROP DATABASE IF EXISTS evaluation;"
mysql -u root --execute="CREATE DATABASE evaluation;"
mysql -u root --execute="GRANT ALL ON evaluation.* TO 'eval'@'localhost';"
mysql -u root --execute="SET FOREIGN_KEY_CHECKS = 1;"

mysql -u root -D evaluation < eval_db_init.sql

::echo "fin d'installation ..."

pause

