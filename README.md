# Drupal Theme Cookbook


* [Drupal Theme Cookbook](#drupal-theme-cookbook)
   * [Quick Drupal](#quick-drupal)

## Quick Drupal
*Quick install Drupal, Themes, Modules, libraries*

* [Drush Install](http://www.drush.org/en/master/) - A command line shell and Unix scripting interface for Drupal
* [Drush Commands](http://drushcommands.com/) - Drupal6, Drupal7, Drupal8
* [Drush Drupal Quickup](https://github.com/Paulmicha/drupal-quickup/blob/master/drupal_setup.sh) - Drush map

```
# ====== Drush command used =======

#Export database
drush sql-dump > ./db.sql

#Export gzip database
# mysqldump -p site > db.sql

drush sql-dump > db.sql —gzip —result=/backups/example.sql
# —destination=/backups/example.tar

#Import database From settings.php
drush sql‐cli < db.sql

#Clear datebase
drush sql-drop

#Clear cache
drush cc all

#Login Once
drush uli

#Change password
drush upwd root --password="****"

#Overall backup
drush ard
drush arr
--db-url=mysql://root:***@localhost/Site site.tar.gz

/* Make Download */
drush make --no-core file.make.yml ../../

```