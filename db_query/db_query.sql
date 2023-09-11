use db_seminario_lenguajes_php;

#drop table users;
#drop table products;
#drop table product_user;

/*
CREATE TABLE users (
        id int NOT NULL AUTO_INCREMENT,
        full_name varchar(70) not null,
        email varchar(70) NOT NULL unique,
        password varchar(128) NOT NULL,
        PRIMARY KEY (id)
);




CREATE TABLE products (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(70) NOT NULL,
        description varchar(150) NOT NULL,
        price double NOT NULL,
        PRIMARY KEY (id)
);

CREATE TABLE product_user(
	user_id int,
    product_id int,
    primary key(user_id,product_id),
    foreign key(user_id) references users(id),
    foreign key(product_id) references products(id)
);
*/

/*
INSERT INTO users (full_name,email, password)
VALUES ("Ezequiel Bonino","ezequiel@gmail.com", "123456");
*/
## products 
INSERT INTO products (name, description, price)
VALUES ("Telefono", "Este es un telefono",10.5);

INSERT INTO products (name, description, price)
VALUES ("Auriculares", "Este es un auricular",10.5);

INSERT INTO product_user (user_id, product_id)
VALUES (1, 1);

INSERT INTO product_user (user_id, product_id)
VALUES (1, 2);


select * from users;
select * from products;
select * from product_user;