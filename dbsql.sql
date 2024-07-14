create database shop_dp;

CREATE TABLE cart(
id varchar(100),
user_id varchar(100),
product_id varchar(10),
price varchar(100),
qty varchar(100)
);

CREATE TABLE orders(
id varchar(100),
user_id varchar(100),
name varchar(100),
number varchar(100),
email varchar(100),
address varchar(100),
address_type varchar(100),
method varchar(100),
product_id varchar(100),
price varchar(100),
qty varchar(100),
date varchar(100),
status varchar(100)
);

CREATE TABLE productst(
id varchar(100),
name varchar(100),
price varchar(100),
image varchar(100),
product_detail varchar(200)
);

CREATE TABLE users(
id varchar(100),
name varchar(100),
username varchar(100),
password varchar(100)
);


INSERT INTO productst (id, name, price, image, product_detail) VALUES 
('21', 'Product 21', '50.00', 'image21.jpg', 'This is product 21 detail');

CREATE TABLE productst (
    id VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(100),
    image VARCHAR(100),
    product_detail VARCHAR(200)
);

INSERT INTO productst (id, name, price, image, product_detail) VALUES 
('6', 'Product 6', '60.00', 'image6.jpg', 'This is product 6 detail'),
('7', 'Product 7', '70.00', 'image7.jpg', 'This is product 7 detail'),
('8', 'Product 8', '80.00', 'image8.jpg', 'This is product 8 detail'),
('9', 'Product 9', '90.00', 'image9.jpg', 'This is product 9 detail'),
('10', 'Product 10', '100.00', 'image10.jpg', 'This is product 10 detail'),
('11', 'Product 11', '110.00', 'image11.jpg', 'This is product 11 detail'),
('12', 'Product 12', '120.00', 'image12.jpg', 'This is product 12 detail'),
('13', 'Product 13', '130.00', 'image13.jpg', 'This is product 13 detail'),
('14', 'Product 14', '140.00', 'image14.jpg', 'This is product 14 detail'),
('15', 'Product 15', '150.00', 'image15.jpg', 'This is product 15 detail'),
('16', 'Product 16', '160.00', 'image16.jpg', 'This is product 16 detail'),
('17', 'Product 17', '170.00', 'image17.jpg', 'This is product 17 detail'),
('18', 'Product 18', '180.00', 'image18.jpg', 'This is product 18 detail'),
('19', 'Product 19', '190.00', 'image19.jpg', 'This is product 19 detail'),
('20', 'Product 20', '200.00', 'image20.jpg', 'This is product 20 detail');


CREATE TABLE wishlist(
id varchar(100),
user_id varchar(100),
product_id varchar(10),
price varchar(100)
);
INsert into user (name,email,password) values (nn,nn,mn);
select*from wishlist;