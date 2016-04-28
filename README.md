# Drupal 7 Theme Cookbook


## Drupal 7

* [Drupal Theme Cookbook](#drupal-theme-cookbook)
   * [Quick Drupal](#quick-drupal)
      * [Install](#install)
      * [Multi-site Config](#multi-site-config)
      * [Database Settings](#database-settings)
      * [Theme Info](#info)
      * [tpl.php](#tpl)
      * [template.php](#template)
   * [Tools](#tools)
      * [SSH Command Used](#ssh-command-used)
      * [Git Command Used](#git-command-used)
      * [Drush](#drush)
         * [Drush Command Used](#drush-command-used)

## Quick Drupal
*Quick install Drupal, Themes, Modules, libraries*

### Install
[https://www.drupal.org/project/drupal](https://www.drupal.org/project/drupal)

```
$ drush(#drush) dl drupal

$ mv drupal... siteName

$ cp siteName/sites/default/default.settings.php  siteName/sites/default/settings.php

$ mysql -udbuser -pdbpassword

$ mysql> create database sitedb

$ mkdir files #Apache need write (chmod a+w files)

# Open in the browser

```

### Multi-site Config
```
$ cp example.sites.php site.php

$ $sites['dev.drupal.org'] = 'example.com';

$ cp siteName/sites/default siteName/sites/example.com

$ cp siteName/sites/example.com/defaule.settings.php siteName/sites/example.com/settings.php

```

### Database Settings
```
#  Theme Database

#  $databases = array (
#    'default' =>
#    array (
#      'default' =>
#      array (
#        'database' => '',
#        'username' => '',
#        'password' => '',
#        'host' => '',
#        'port' => '',
#        'driver' => 'mysql',
#        'prefix' => '',
#      ),
#    ),
#  );

# Theme Debug

# $conf['theme_debug'] = TRUE;


# Use default theme

#  $http_host = explode('.', $_SERVER['HTTP_HOST']);
#  if ($http_host[0] == 'm') {
# 	   $conf['site_name'] = 'mobile site';
#    $conf['theme_default'] = 'mobile';
#  }

# $base_url = 'http://www.example.com/drupal';

# $conf['proxy_server'] = '';
# $conf['proxy_port'] = 8080;
# $conf['proxy_username'] = '';
# $conf['proxy_password'] = '';

```

### Theme Info


### Tpl files

### Template.php


## Tools
*Use Editor, compiler tools, management tools, auxiliary tools to effectively handle the responsibilities*

## SSH Command Used
```

#Search
grep -r 'wenroo' modules/

```

## Git Command Used
```
git clone
git pull
git status  #check
git add file
git commit -m  ''
git push

#add and commit
git commit -am ''

# merge self
git fetch origin branch
# merge auto
git pull origin branch

# merge one by one conflict
git rebase
# merge finsh conflict
git merge

# Cancel local changes
git checkout filename

# Graphical management 图形化管理工具
git gui  #https://git-scm.com/docs/git-gui

# Checkout new branch and don't need commint
git stash       #Save
git stash list  #view
git stash pop   #merge
git stash clear #remove

# change user info
git config --global user.name username
git config --global user.mail user@wenroo.com

# ignore files
vi .gitignore    #Current
vim ~/.gitconfig #Global

# local sources #本地源
git remote -v #View
git remote set-url origin git@github.com:wenroo/drupal-theme-cookbook.git  #edit

# Svn to Git
git svn clone -s http://.....  #Clone
git svn rebase  #pull
git svn dcommit #Push

```


## Drush
* [Drush Install](http://www.drush.org/en/master/) - A command line shell and Unix scripting interface for Drupal
* [Drush Commands](http://drushcommands.com/) - Drupal6, Drupal7, Drupal8
* [Drush Drupal Quickup](https://github.com/Paulmicha/drupal-quickup/blob/master/drupal_setup.sh) - Drush map
* [Drush Command Used](#drush-command-used)

## Drush Command Used
```
#Export database
drush sql-dump > ./db.sql

#Export gzip database
# mysqldump -p site > db.sql

drush sql-dump > db.sql —gzip —result=/backups/example.sql
# —destination=/backups/example.tar

# Import database From settings.php
drush sql‐cli < db.sql

# Clear datebase
drush sql-drop

# Clear cache
drush cc all

# Login Once
drush uli

# Change password
drush upwd root --password="****"

# Overall backup
drush ard
drush arr
--db-url=mysql://root:***@localhost/Site site.tar.gz

# Make Download
drush make --no-core file.make.yml ../../

```









