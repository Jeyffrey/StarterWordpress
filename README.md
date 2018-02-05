# Jeyffrey Wordpress Starter


Simple starter theme for a quick theming launch. Have fun.

Tools used :
- SASS
- BabelJS
- BrowserSync


<pre>npm install</pre>
<pre>gulp watch</pre>

## Wordpress function.php
Wordpress parameters are defined in the 'function-partials' folder.
Some parameters are currently in comments but already prepared :

### init.wp.php
- Hide admin bar
- Init wordpress modules
- Remove Wordpress useless tools
- Post excerpt length (commented)
- Disable comments (commented)
- Disable post type (commented)
- Add ACF option page (commented)
- Disable Contact Form 7 style (commented)
- Yoast SEO move at the bottom of your page (commented)

### init.enqueue.php
- Deregister jQuery
- Deregister "wp-embed"
- Register our JS file
- Use "admin-ajax" (commented)

### init.medias.php
- Image default parameters
- Specific image sizes
- Change Wordpress uploads destination (commented)

### classes.pages.php
- Custom body classes for every content type

### custom.post-types.php
- Create new Custom Post Type (commented)
- Parent menu link goes active in new Custom Post Type (commented)

### backoffice.login.php
- Add a specific logo on the admin-login screen

### backoffice.dashboard.php
- Remove initial wordpress widgets on the dashboard
- Add a page list widget
- Add a custom post type list widget
