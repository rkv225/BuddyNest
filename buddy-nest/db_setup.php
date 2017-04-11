<?php
include_once 'functions.php';

echo "<h2>Setting up Database. Please Wait...</h2>";

createTable('friends','user VARCHAR(20),friend VARCHAR(20)');
createTable('friend_request','user_s VARCHAR(20),user_r VARCHAR(20)');
createTable('message','s_id VARCHAR(20),r_id VARCHAR(20),time VARCHAR(20),message VARCHAR(4096)');
createTable('password','u_id VARCHAR(20), password VARCHAR(20),PRIMARY KEY (u_id)');
createTable('profile', 'u_id VARCHAR(20), f_name TEXT, l_name TEXT,gender TEXT,d_o_b DATE,e_mail VARCHAR(40),country TEXT,about VARCHAR(4096),hometown VARCHAR(15),religion VARCHAR(15), PRIMARY KEY(u_id)');
createTable('t_comment','t_id VARCHAR(64),u_id VARCHAR(20),time VARCHAR(20),comment VARCHAR(4096)');
createTable('t_likes','t_id VARCHAR(64),u_id VARCHAR(20)');
createTable('t_post','t_id VARCHAR(64),u_id VARCHAR(20),time VARCHAR(20),post VARCHAR(4096),PRIMARY KEY (t_id)');
?>
