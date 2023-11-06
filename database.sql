CREATE DATABASE drivemenow;
USE drivemenow;

CREATE TABLE users(
    usersID INT NOT NULL AUTO_INCREMENT,
    usersEmail VARCHAR(255) NOT NULL,
    usersUid VARCHAR(255) NOT NULL,
    usersPwd VARCHAR(255) NOT NULL,
    PRIMARY KEY (usersID)
);

CREATE TABLE cars(
    id INT NOT NULL AUTO_INCREMENT,
    image_path VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    capacity VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    rate INT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO cars (image_path, category, name, capacity, description, rate) VALUES ('assets/images/Cars/PickUps/Ford Ranger.jpg', 'PickUps', 'Ford Ranger', '4-seater', 'The Ford Ranger is a versatile and capable pickup that is popular in Kenya. It has a spacious interior, a comfortable ride, and advanced features such as a terrain management system.', 21000),
 ('assets/images/Cars/PickUps/Isuzu D-Max.jpg', 'PickUps', 'Isuzu D-Max', '7-seater', 'The Isuzu D-Max is a reliable pickup that is popular in Kenya. It has a spacious interior, a comfortable ride, and advanced features such as a terrain management system.', 25000), 
 ('assets/images/Cars/PickUps/Mitsubishi L200.jpg', 'PickUps', 'Mitsubishi L200', '4-seater', 'The Mitsubishi L200 is a reliable pickup that is popular in Kenya. It has a spacious interior, a comfortable ride, and advanced features such as a terrain management system.', 20000),
 ('assets/images/Cars/PickUps/Nissan Navara.jpg', 'PickUps', 'Nissan Navara', '7-seater', 'The Nissan Navara is a reliable pickup that is popular in Kenya. It has a spacious interior, a comfortable ride, and advanced features such as a terrain management system.', 30000), 
 ('assets/images/Cars/PickUps/Toyota Hilux.jpg', 'PickUps', 'Toyota Hilux', '8-seater', 'The Toyota Hilux is a reliable pickup that is popular in Kenya. It has a spacious interior, a comfortable ride, and advanced features such as a terrain management system.', 40000),
 ('assets/images/Cars/Sedan/mazda.jpg', 'Sedan', 'Mazda Axela', '4-seater', 'The Mazda Axela (also known as the Mazda 3) is a stylish and fun-to-drive sedan that is well suited for those who enjoy driving. It has a spacious cabin, a sporty suspension, and a powerful engine.', 19500),
 ('assets/images/Cars/Sedan/mercedez benz c class.jpg', 'Sedan', 'Mercedes Benz', '7-seater', 'The Mercedes-Benz C-Class is a luxury sedan that offers a comfortable ride, advanced features, and a stylish design. It has a spacious cabin, a powerful engine, and is ideal for those who value luxury and comfort.', 28000),
 ('assets/images/Cars/Sedan/subaru impreza.jpg', 'Sedan', 'Subaru Impreza', '4-seater', 'The Subaru Impreza is a popular sedan that is known for its reliability, performance, and all-wheel drive system. It has a spacious interior, a smooth ride, and is ideal for those who enjoy driving on rough terrain.', 24500),
 ('assets/images/Cars/Sedan/subaru outback.jpg', 'Sedan', 'Subaru Outback', '7-seater', 'The Subaru Outback is a popular sedan that is known for its reliability, performance, and all-wheel drive system. It has a spacious interior, a smooth ride, and is ideal for those who enjoy driving on rough terrain.', 12500),
 ('assets/images/Cars/Sedan/Toyota Corolla.jpg', 'Sedan', 'Toyota Corolla', '4-seater', 'The Toyota Corolla is a reliable and fuel-efficient sedan that is popular in Kenya. It is spacious, comfortable, and has a good resale value.', '13450'),
 ('assets/images/Cars/SUV/Land Cruiser.jpg', 'SUV', 'Land Cruiser', '5-seater', 'The Toyota Land Cruiser Prado is a rugged and reliable SUV that is well suited for off-road adventures. It is spacious, comfortable, and has a good resale value.', 30000),
 ('assets/images/Cars/SUV/Land Rover Discovery.jpg', 'SUV', 'Land Rover Discovery', '7-seater', 'The Land Rover Discovery is a rugged and reliable SUV that is well suited for off-road adventures. It is spacious, comfortable, and has a good resale value.', 35000),
 ('assets/images/Cars/SUV/Range Rover.jpg', 'SUV', 'Range Rover', '7-seater', 'The Range Rover is a rugged and reliable SUV that is well suited for off-road adventures. It is spacious, comfortable, and has a good resale value.', '40000'),
 ('assets/images/Cars/SUV/Toyota-Fortuner.jpg', 'SUV', 'Toyota Fortuner', '7-seater', 'The Toyota Fortuner is a reliable and fuel-efficient van that is popular in Kenya. It is spacious, comfortable, and has a good resale value.', '35000'),
 ('assets/images/Cars/SUV/Nissan-X-Trail5.jpg', 'SUV', 'Nissan X-Trail', '7-seater', 'The Nissan X-Trail is a mid-size SUV that is practical, comfortable, and reliable. It has a spacious cabin, a smooth ride, and is well suited for city driving.', 28000);
