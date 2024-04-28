1 - must to intall docker 
2 -install php_apache in docker 
3 - Create Dockerfile for connect run with code 
4 - for run code use commamd below
 docker run -i --rm --name php_cont -p 80:80 php_apache 
 OR
 docker run -i --rm --name php_cont -v Filelocalstorecode\:/var/www/html -p 80:80 php_apache
   