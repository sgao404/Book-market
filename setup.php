<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/18/2015
 * Time: 7:47 PM
 */

include_once 'functions.php';

createTable('books',
    'id SMALLINT NOT NULL AUTO_INCREMENT,
            name VARCHAR(32) NOT NULL,
            isbn VARCHAR(32) NOT NULL,
            condition TINYINT NOT NULL,
            course VARCHAR(32),
            price VARCHAR(32) NOT NULL,
            expire VARCHAR(32) NOT NULL,
            contact VARCHAR(32) NOT NULL,
            owner VARCHAR(32) NOT NULL,
            PRIMARY KEY (id)');

createTable('users',
    'id SMALLINT NOT NULL AUTO_INCREMENT,
            username VARCHAR(32) NOT NULL,
            password VARCHAR(32) NOT NULL,
            PRIMARY KEY (id)');
?>

<br>...done.
</body>
</html>