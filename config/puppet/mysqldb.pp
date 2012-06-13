define mysqldb( $user, $password, $host, $local_hostname ) {
    exec { "create-${name}-db":
      unless => $stage ? {
		'development' => "/usr/bin/mysql -u${user} -pvagrant ${name}",
		default	      => "/usr/bin/mysql --ssl -h ${db_host} ${name}",
	},
      command => $stage ? {
		'development' => "/usr/bin/mysql -uroot -pvagrant -e \"CREATE DATABASE ${name}; GRANT ALL ON ${name}.* TO ${user}@localhost IDENTIFIED BY '$password';\"",
		default       => "/usr/bin/mysql --ssl -h ${db_host} -e \"CREATE DATABASE ${name}; GRANT ALL ON ${name}.* TOTO ${user}@${local_hostname} IDENTIFIED BY '$password' REQUIRE SSL;\"",
      require => Service["mysqld"],
	},
    }
  }

