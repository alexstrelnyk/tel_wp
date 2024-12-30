# Telesens-site

1. Download WP archieve and unpack it
2. run local php server
php -S localhost:8000

Open http://localhost:8000 and finish all steps of installation<br>
When it's all done and you see main homepage<br>
3. 
<code>
cd wp-content<br>
rm -rf themes<br>
git checkout https://gl.telesens.us/telesens-corporate-site/telesens-site.git<br>
</code>

Get all theme files in
"telesens-site"

<code>cd telesens-site</code>
<br>
<code>mv themes ../themes</code>

Go to 
https://drive.google.com/drive/folders/13r_Yvnb7859LddWZrahv5lRiczwn_QBz?usp=sharing

Download and unpach "plugins" in /wp-content
unpack "images" to  /wp-content/themes/twentytwentyfour/assets/


<br>
Migrate latest wp_telek.sql file (it could be any of wp_telek{version}.sql files)
<br>
<br>
<b><i>Go to your mysql console and run these queries:</i></b>

<code>
update wp_options set option_value='http://localhost:8000/' where option_name='siteurl';
<br>
update wp_options set option_value='http://localhost:8000/' where option_name='home';
<br>
update wp_options set option_value='http://localhost:8000/' where option_name='blogname';
</code>
<br>
<br>

now go to 
http://localhost:8000/wp-admin/

and login with
telek_user
strong-mysql-pass$

That's it
Enjoy