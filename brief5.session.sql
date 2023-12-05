USE electronacer;
--@block

CREATE TABLE user(
    identifiant VARCHAR(50) unique not null,
    pass VARCHAR(50) not null
);

--@block
INSERT INTO user (identifiant, pass) VALUES ("mehdi", "123");

--@block
CREATE TABLE produits (
     reference INT ,
     image_url VARCHAR(255),
     libelle VARCHAR(255) NOT NULL,
     unit_price VARCHAR(255) NOT NULL,
     quantite_min INT NOT NULL,
     quantite_stock INT NOT NULL,
     categorie VARCHAR(40)
);

--@block
INSERT INTO produits (reference, image_url, libelle, unit_price, quantite_min, quantite_stock, categorie) VALUES
    (1,'imgs/a1.jpg', 'Lenovo Laptop 1', '9000 DH', 5, 12, 'laptops'),
    (2,'imgs/a2.jpg', 'Lenovo Laptop 2', '9500 DH', 5, 4, 'laptops'),
    (3,'imgs/a3.jpg', 'Lenovo Laptop 3', '8900 DH', 5, 15, 'laptops'),
    (4,'imgs/a4.jpg', 'Lenovo Laptop 4', '8800 DH', 5, 1, 'laptops'),
    (5,'imgs/b1.jpg', 'Phone 1', '1300 DH', 5, 3, 'telephones'),
    (6,'imgs/b2.jpg', 'Phone 2', '1400 DH', 5, 3, 'telephones'),
    (7,'imgs/b3.jpg', 'Phone 3', '2100 DH', 5, 2, 'telephones'),
    (8,'imgs/b4.jpg', 'Phone 4', '3000 DH', 5, 10, 'telephones'),
    (9,'imgs/c1.jpg', 'Refrigerateur 1', '18900 DH', 5, 6, 'electromenager'),
    (10,'imgs/c2.jpg', 'Pack 1', '30000 DH', 5, 1, 'electromenager'),
    (11,'imgs/c3.jpg', 'Pack 2', '31000 DH', 5, 2, 'electromenager'),
    (12,'imgs/c4.jpg', 'Lave-vaisselle', '4000 DH', 5, 99, 'test'),
    (13,'imgs/d1.jpg', 'PlayStation 5', '2 DH', 5, 1, 'consoles'),
    (14,'imgs/d2.jpg', 'PS5 Controller', '600 DH', 5, 20, 'consoles'),
    (15,'imgs/d3.jpg', 'Xbox One', '100 DH', 5, 5, 'consoles')

--@block
UPDATE produits SET categorie = 'electromenager' WHERE categorie = 'test';