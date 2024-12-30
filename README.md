# Telesens-site

1. Download WP archieve and unpack it
2. run local php server
php -S localhost:8000

Open http://localhost:8000 and finish all steps of installation
When it's all done and you see main homepage
3. cd wp-content
rm -rf themes
git checkout https://gl.telesens.us/telesens-corporate-site/telesens-site.git

Get all theme files in
"telesens-site"

cd telesens-site
mv themes ../themes

Go to 
https://drive.google.com/drive/folders/13r_Yvnb7859LddWZrahv5lRiczwn_QBz?usp=sharing

Download and unpach "plugins" in /wp-content
unpack "images" to  /wp-content/themes/twentytwentyfour/assets/


Migrate wp_telek.sql

Go to your mysql console and run these queries

"update wp_options set option_value='http://localhost:8000/' where option_name='siteurl';"
"update wp_options set option_value='http://localhost:8000/' where option_name='home';"
"update wp_options set option_value='http://localhost:8000/' where option_name='blogname';"

now go to 
http://localhost:8000/wp-admin/

and login with
telek_user
strong-mysql-pass$

That's it
Enjoy