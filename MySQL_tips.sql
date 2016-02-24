-- Table structure for table `tz_todo`
CREATE TABLE `tz_todo` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `position` int(8) unsigned NOT NULL default '0',
  `text` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `dt_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/* [24FEB2016] Set up MySQL account (source: Dietel & Dietel - Java How to Program, 7th Ed.)
   1. Open a Command Prompt and start the database server by executing the command
      mysqld-nt.exe. Note that this command has no output—it simply starts the MySQL server. 
      Do not close this window—doing so terminates the server.
      
   2. Next, you’ll start the MySQL monitor so you can set up a user account, open another 
      Command Prompt and execute the command
        mysql -h localhost -u root
        
   3. At the mysql> prompt, type
        USE mysql;
        
      - to select the built-in database named mysql, which stores server information, such
        as user accounts and their privileges for interacting with the server. Note that each
        command must end with a semicolon. To confirm the command, MySQL issues the message 
        “Database changed.”
        
   4. Next, you’ll  add the jhtp7 user account to the mysql built-in  database.  The mysql database 
      contains a table called user with columns that represent the user’s name, password and various privileges. 
      To create the jhtp7 user account with the password jhtp7, execute the following commands from the mysql> prompt:
        create user 'jhtp7'@'localhost' identified by 'jhtp7';
        grant select, insert, update, delete, create, drop, references,
          execute on *.* to 'jhtp7'@'localhost';
          
   5. Type the command
        exit;
        
*/
