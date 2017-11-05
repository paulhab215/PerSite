CREATE DATABASE sitename;

USE sitename;

CREATE TABLE users (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
pass CHAR(40) NOT NULL,
registration_date DATETIME NOT NULL,
PRIMARY KEY (user_id)
);


INSERT INTO users 
(first_name, last_name, email, pass, registration_date) 
VALUES ('Paul', 'Habjanetz', 'test', SHA1('123'), NOW());


CREATE TABLE food (
food_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(60) NOT NULL,
street VARCHAR(50) NOT NULL,
secondary_street VARCHAR(50),
city VARCHAR(30) NOT NULL,
state_abbrv VARCHAR(5) NOT NULL,
state VARCHAR(20) NOT NULL,
zip VARCHAR(10) NOT NULL,
bio TEXT NOT NULL,
date_entered DATETIME NOT NULL,
yelp_link VARCHAR(150) NOT NULL,
PRIMARY KEY (food_id)
);


INSERT INTO food (name, street, secondary_street, city, state_abbrv, state, zip, bio, date_entered, yelp_link) VALUES 
('One Taco', '12200 Research Blvd', '#400', 'Austin', 'TX', 'Texas', '78759', 'An urban taqueria - which I believe has their steak game on point. If you go for breakfast get the Jefe, if you go for lunch/dinner I\'d go for the Original Steak Taco. All are good are good and reasonably priced!',NOW(),'https://www.yelp.com/biz/onetaco-an-urban-taqueria-austin-2'),
('Fresa\'s Chicken Al Carbon', '915 N Lamar Blvd', NULL, 'Austin', 'TX', 'Texas', '78703', 'Nothing says tasty like wood grilled chicken complete with homemade tortillas, authentic salsas and traditional rice and beans. My goto location is right downtown in the heart of Austin and is easily accessible. Yuciatan Spice all the way (#2). Dont overlook the street corn its worth the buy!',NOW(),'https://www.yelp.com/biz/fresas-austin'),
('Saigon Le Vendeur', '2404 E 7th St', '', 'Austin', 'TX', 'Texas', '78702', 'Vietnamese Street Food -  Small food truck located next to the railroads - sip jasmine tea as the trains pass by. The spicy chicken banh mi with egg and avoacado on top is unforgettable.',NOW(),'https://www.yelp.com/biz/saigon-le-vendeur-austin'),
('O\'Daku', '2501 W Parmer Ln', '#500', 'Austin', 'TX', 'Texas', '78727', 'A number of Korean dishes & excellent sushi - one of my favorites in Austin. It is a hidden gem with an amazing happy hour!',NOW(),'https://www.yelp.com/biz/o-daku-sushi-austin'),
('Twisted Root Burger Co.', '7211 Burnet Rd', '', 'Austin', 'TX', 'Texas', '78757', 'Classic burgers with a funky twist. The vibe sets the mood, and the fries finish the deal. What celeberity will you be when you play on the green?',NOW(),'https://www.yelp.com/biz/twisted-root-burger-co-austin-north-austin'),
('Noble Sandwich Company', '4805 Burnet Rd', '', 'Austin', 'TX', 'Texas', '78756', 'A farm-to-table slant applies to big breakfast & lunch in casual, counter-service digs with a patio. My top is the Turkey Chop House with of course an egg on top. But don\'t doubt the Beef tongue it is very good as well!',NOW(),'https://www.yelp.com/biz/noble-sandwich-austin-2');



















































































