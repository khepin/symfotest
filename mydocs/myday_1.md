# My first day of using Symfony2

- Downloaded Symfony
- Created a git repository and cloned it locally (empty repo)
- Commit the repo with a "mydoc" folder containing only this readme file for now

## Commit to git

	git add *
	git commit -m "add a first file describing what I did so far"
	git push origin master

## Add symfony2 files from the downloaded archive

Then commit everything again and push so that our remote repository contains everything needed to work.


__Note:__ Symfony files could be added as a git submodule too instead of downloading everything.

## Virtual host

We need to create a virtual host to redirect correctly the requests to Symfony2. The vHost file I use can be found in my [Silex_Vhost](https://github.com/khepin/Silex_VHost/blob/master/vhost) repository. It's the same for Silex as for Symfony2. On a _Ubuntu_ machine, the file goes in

    /etc/apache2/sites-available/mysitename

Add symfotest.loc to the host file. On _Ubuntu_ it's located at

    /etc/hosts

There add a line like:

    127.0.1.1	symfotest.loc

Enable the site in apache:

    sudo a2ensite symfotest

Restart apache:

    sudo /etc/init.d/apache2 restart

Some permission rights need to be set for everything to be working. Logs and cache directory need to be writable.

## Symfony Configuration Check

`/config.php` shows a list of things that need to be setup before Symfony2 runs correctly

### Installing SQLite3 and PDO_SQLite

    sudo apt-get install sqlite3
    sudo apt-get install php5-sqlite

In php.ini set
    
    date.timezone = Asia/Shanghai

Install APC

    sudo apt-get install php-apc
    sudo apt-get install php5-intl

Restart Apache.

## Configure Symfony

Follow online instructions.


Add .gitignore files to the Cache and Logs folders to ignore anything in here.






























