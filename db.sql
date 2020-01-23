CREATE TABLE customer(
    c_id int NOT NULL AUTO_INCREMENT,
    c_name varchar(50) NOT NULL,
    c_email varchar(50) NOT NULL,
    c_password varchar(50)  NOT NULL,
    PRIMARY KEY(c_id)
    );

CREATE TABLE beautician(
    b_id int NOT NULL AUTO_INCREMENT,
    b_name varchar(50) NOT NULL,
    b_dob date,
    b_phone int(50),
    b_address varchar(50),
    b_expert varchar(50),
    b_salary numeric(7,2),
    b_joiningdate date,
    PRIMARY KEY(b_id)
    );

CREATE TABLE service(
    s_id int NOT NULL AUTO_INCREMENT,
    s_name varchar(50) NOT NULL,
    description varchar(150),
    s_price numeric(7,2),
    PRIMARY KEY(s_id)
    );

CREATE TABLE orders(
    o_id int NOT NULL AUTO_INCREMENT,
    c_id int,
    b_id int,
    orderedBy varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    phone varchar(50),
    area varchar(50),
    o_date date,
    o_time time,
    no_ofservice int,
    total_bill numeric(7,2),
    description varchar(150),
    confirm int,
    PRIMARY KEY(o_id),
    FOREIGN KEY (c_id) REFERENCES customer(c_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (b_id) REFERENCES beautician(b_id) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE offer(
    offer_id int NOT NULL AUTO_INCREMENT,
    s_id int,
    description varchar(255),
    image varchar(255),
    start_time datetime,
    end_time datetime,
    PRIMARY KEY(offer_id),
    FOREIGN KEY(s_id) REFERENCES service(s_id) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE order_service(
    id int NOT NULL AUTO_INCREMENT,
    o_id int,
    s_id int,
    PRIMARY KEY(id),
    FOREIGN KEY(o_id) REFERENCES orders(o_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(s_id) REFERENCES service(s_id) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE admin(
    admin_id int NOT NULL AUTO_INCREMENT,
    admin_name varchar(50) NOT NULL,
    admin_pass varchar(50),
    PRIMARY KEY(admin_id)
    );