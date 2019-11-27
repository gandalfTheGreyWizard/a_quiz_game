Intro:-

This is a repository that uses my built in php and js routers , other than that you can use sass inside components or pages in the frontend.
There is a pre built style.scss file inside the assets folder that has many prebuilt scss classes for certain reusable coding standards against css.

download the filesystem

1. composer install
2. composer dump-autoload


#for frontend pages
1. make a directory inside pages with the name similar to the url rendered.
	ex:-	ex:-	/blogs	will render blogs.html inside blogs floder inside pages /pages/blogs/blogs.html

	note:- create blogs.scss too to be compiled as blogs.css inside /pages/blogs to be autoloaded under url /blogs

#for backend

1. define controllers inside src/Controllers,  name of the file and class name should be camel case. like 
	Admin.php
	namespace Mysite\Controllers; 
	class Admin{}
2. Similarly for models,
	Admin.php
	namespace Mysite\Models;
	class Admin{}

	Note:- for models define the environments for mongo connections in $this->conn = msqli_connect() inside constructor and then use $this->conn
3. Note:-   Model name and controller name should be same and so the classname for the model being autoloaded in the controller.

#for rest api calls.
1. there are already two ajax calls writtend inside the components/helpers/helperjs.html
	1st without jwt, second with jwt
2. you can add frontend helper functions there.
3. to check the validity of the jwt go to /admin and enter id- soumik   pass- password and then goto blogs and do submit. check the response for jwt validity;

#for apache servers
#create .htaccess file 
#add "FallbackResource /index.php" to it for proper url loaders to be executed.
#keep the project unfolded in the apache html root directory.