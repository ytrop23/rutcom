drop user if exists 'user'@'localhost'; 
use rutcom;
create user 'user'@'localhost' identified by '1234'; 
grant all on rutcom.* to 'user'@'localhost';  

