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
method varchar(100),
product_id varchar(100),
price varchar(100),
qty varchar(100),
date varchar(100),
status varchar(100) default 'await'
);
select * from orders;
update orders set product_id = '7' where qty = '7';
update orders set status = 'Await' where qty = '5';
select * from productst;
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

select*from productst;
CREATE TABLE productst (
    id VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(100),
    image VARCHAR(100),
    product_detail VARCHAR(200)
);

INSERT INTO productst (id, name, price, image, product_detail) VALUES
('1', 'Margherita Pizza', '10.99', 'image1.jpg', 'Classic Margherita pizza with fresh tomatoes, mozzarella, and basil.'),
('2', 'Pepperoni Pizza', '12.99', 'image2.jpg', 'Spicy pepperoni slices with mozzarella cheese on a crispy crust.'),
('3', 'BBQ Chicken Pizza', '13.99', 'image3.webp', 'Grilled chicken, BBQ sauce, red onions, and cilantro.'),
('4', 'Caesar Salad', '8.99', 'image4.jpg', 'Romaine lettuce, croutons, and Caesar dressing with grated Parmesan cheese.'),
('5', 'Greek Salad', '9.49', 'image5.jpg', 'Mixed greens, tomatoes, cucumbers, olives, feta cheese, and Greek dressing.'),
('6', 'Spaghetti Bolognese', '11.99', 'image6.jpg', 'Spaghetti pasta with a rich and savory beef Bolognese sauce.'),
('7', 'Chicken Alfredo', '12.49', 'image7.jpg', 'Fettuccine pasta with creamy Alfredo sauce and grilled chicken.'),
('8', 'Cheeseburger', '10.49', 'image8.jpg', 'Juicy beef patty with cheddar cheese, lettuce, tomato, and pickles.'),
('9', 'Veggie Burger', '9.99', 'image9.jpg', 'Grilled veggie patty with lettuce, tomato, and avocado.'),
('10', 'Fish and Chips', '13.49', 'image10.jpeg', 'Crispy battered fish fillets with fries and tartar sauce.'),
('11', 'Chicken Tenders', '8.99', 'image11.webp', 'Crispy chicken tenders served with honey mustard dipping sauce.'),
('12', 'Beef Tacos', '10.99', 'image12.webp', 'Three soft tortillas filled with seasoned beef, lettuce, cheese, and salsa.'),
('13', 'Chicken Quesadilla', '9.99', 'image13.jpg', 'Grilled chicken and melted cheese in a toasted tortilla.'),
('14', 'Sushi Roll', '12.99', 'image14.webp', 'Assorted sushi rolls with fresh fish, rice, and seaweed.'),
('15', 'Pad Thai', '11.49', 'image15.webp', 'Stir-fried rice noodles with shrimp, tofu, eggs, and peanuts.'),
('16', 'General Tso\'s Chicken', '13.49', 'image16.jpg', 'Sweet and spicy chicken served with steamed rice and broccoli.'),
('17', 'Steak Frites', '19.99', 'image17.jpeg', 'Grilled steak served with French fries and garlic butter.'),
('18', 'Lobster Bisque', '14.99', 'image18.jpg', 'Creamy lobster soup with a hint of sherry.'),
('19', 'Clam Chowder', '10.49', 'image19.webp', 'New England-style clam chowder with potatoes and bacon.'),
('20', 'Tiramisu', '6.99', 'image20.jpg', 'Classic Italian dessert with layers of coffee-soaked ladyfingers and mascarpone cheese.');

CREATE TABLE beverage (
    id VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(100),
    image VARCHAR(100),
    product_detail VARCHAR(200)
);
INSERT INTO beverage (id, name, price, image, product_detail) VALUES
('25', 'Coca-Cola', '1.99', 'image25.webp', 'Classic Coca-Cola in a chilled bottle.'),
('26', 'Lemonade', '2.49', 'image26.webp', 'Freshly squeezed lemonade with a hint of mint.'),
('27', 'Iced Tea', '2.29', 'image27.jpg', 'Refreshing iced tea with lemon slices.'),
('28', 'Orange Juice', '2.99', 'image28.webp', 'Freshly squeezed orange juice, rich in vitamin C.'),
('29', 'Milkshake', '3.49', 'image29.webp', 'Creamy vanilla milkshake topped with whipped cream.');



CREATE TABLE wishlist(
id varchar(100),
user_id varchar(100),
product_id varchar(10),
price varchar(100)
);
INsert into user (name,email,password) values (nn,nn,mn);
select*from wishlist;

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `adults` smallint(6) NOT NULL,
  `childrens` smallint(6) NOT NULL,
  `booking_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=New Booking; 1=Confirmed; 2=Rejected;',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ;

CREATE TABLE `tbl_booking_status` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `table_no` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL COMMENT '1=Confirmed; 2=Rejected;',
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_table` (
  `id` int(11) NOT NULL,
  `table_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

INSERT INTO `user` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 9990105028, '1', '$2y$10$RhReit4tS4ghp5ZlkyHfS.K1Nl//nlXZ8lvglm0oCMNMomALHJ4ti', '2024-02-20 11:40:58');

ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_booking_status`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);
  
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `tbl_booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `tbl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `user`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
select*from cart;
DELETE FROM wishlist WHERE price IN (20, 10, 30);
