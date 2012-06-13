	package { "nginx":
		ensure => latest,
	#	hasrestart => true
	}

	package { "php5-fpm":
		ensure => latest
	}

	package { "varnish":
		ensure => latest
	}

	# to hack around the name resolution problem with a 12.04 host, Peter's env only
	file { "/etc/resolv.conf":
		owner => root,
		group => root,
		mode => 644,
		source => "/vagrant/config/puppet/files/vagrant_resolv.conf"
	}

	file { "/etc/nginx/sites-available/vagrantsite":
		owner => root,
		group => root,
		mode  => 644,
		source => "/vagrant/config/puppet/files/vagrant_nginx_postprocess",
		require => Package["nginx"],
		notify => Service["nginx"]
	}

	file { "/etc/nginx/sites-enabled/vagrantsite":
		ensure => symlink,
		target => "/etc/nginx/sites-available/vagrantsite",
		require => Package["nginx"],
		notify => Service["nginx"]
	}

	file { "/etc/nginx/sites-enabled/default":
		ensure => absent,
		#require => Package["nginx"],
		#notify => Package["nginx"]
	}

	file { "/etc/php5/fpm/pool.d/vagrantsite.pool.conf":
		owner => root,
		group => root,
		mode => 644,
		source => "/vagrant/config/puppet/files/vagrant_php5-fpm_pool.conf",
		#require => Package["php5-fpm"],
		#notify => Package["php5-fpm"]
	}

	file { "/home/vagrant/php":
		ensure => directory,
		owner => vagrant,
		group => vagrant,
		require => Package["php5-fpm"]
	}

	file { "/home/vagrant/php/log":
		ensure => directory,
                owner => vagrant,
                group => vagrant,
                require => Package["php5-fpm"]
	}

	file { "/home/vagrant/php/sessions":
		ensure => directory,
                owner => vagrant,
                group => vagrant,
                require => Package["php5-fpm"]
	}

	file { "/home/vagrant/php/log/vagrantsite.access.log":
                owner => vagrant,
                group => vagrant,
                require => Package["php5-fpm"]
	}

	file { "/home/vagrant/php/log/vagrantsite.slow.log":
                owner => vagrant,
                group => vagrant,
                require => Package["php5-fpm"]
	}

	file { "/home/vagrant/php/log/error.log":
                owner => vagrant,
                group => vagrant,
                require => Package["php5-fpm"]
	}

	# varnish config file for :80
	file { "/etc/default/varnish":
		owner => root,
		group => root,
		source => "/vagrant/config/puppet/files/vagrant_etc_default_varnish",
		require => Package["varnish"]
	}


	file { "/etc/varnish/default.vcl":
		owner => root,
		group => root,
		source => "/vagrant/config/puppet/files/vagrant_default.vcl",
		require => Package["varnish"]
	}

	service { "nginx":
		ensure => running,
		#hasrestart => true,
		require => Package["nginx"]
	}

	service { "php5-fpm":
		ensure => running,
		#hasrestart => true,
		require => Package["php5-fpm"]
	}

	# start varnish
	service { "varnish":
		ensure => running,
		require => Package["varnish"],
		subscribe => File["/etc/default/varnish"]
	}



