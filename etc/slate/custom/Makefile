refresh-resources:
	# CSS
	cp /srv/slate/source/stylesheets/_variables.scss.original /srv/slate/source/stylesheets/_variables.scss
	cp /srv/slate/source/stylesheets/screen.css.scss.original /srv/slate/source/stylesheets/screen.css.scss
	cat /srv/slate/source/custom_stylesheets/_append_to_variablers.scss >> /srv/slate/source/stylesheets/_variables.scss
	cat /srv/slate/source/custom_stylesheets/_append_to_screen.css.scss >> /srv/slate/source/stylesheets/screen.css.scss

	# Config file
	cp /srv/slate/config.rb.original /srv/slate/config.rb
	cat /srv/slate/custom/_append_to_config.rb >> /srv/slate/config.rb