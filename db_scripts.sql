CREATE TABLE tbl_users(
	id int AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) not null UNIQUE,
    user_password varchar(50) not null UNIQUE,
    user_role boolean not null,
    full_name varchar(100) not null,
    department varchar(50),
    phone varchar(50) not null UNIQUE,
    email varchar(50) not null UNIQUE,
    status boolean not null default 1,
    created_at timestamp not null default current_timestamp
);
CREATE TABLE tbl_vehicles(
	id int AUTO_INCREMENT PRIMARY KEY,
    plate_number varchar(50) not null UNIQUE,
    vehicle_type varchar(50) not null,
    chasis_number varchar(50) not null UNIQUE,
    brand varchar(50) not null,
    color varchar(50) not null,
    vehicle_description varchar(50) not null,
    photo varchar(50) not null,
    status boolean not null default 1,
    created_at timestamp not null default current_timestamp
);
CREATE TABLE tbl_driver(
	id int AUTO_INCREMENT PRIMARY KEY,
    vehicle_id int,
    national_id varchar(50) not null UNIQUE,
    driving_license varchar(50) not null UNIQUE,
    license_validity varchar(50) not null,
    full_name varchar(100) not null,
    phone varchar(50) not null UNIQUE,
    email varchar(50) not null UNIQUE,
    photo varchar(50) not null,
    address varchar(50) not null,
    status boolean not null default 1,
    created_at timestamp not null default current_timestamp
);
CREATE TABLE tbl_book_trip(
	user_id int not null,
    vehicle_id int not null,
    destination varchar(50) not null,
    pickup_point varchar(50),
    return_date varchar(50) not null,
    estimated_km float not null,
    cost_km float not null default 2500.00,
    extra_cost float not null,
    paid boolean default false,
    confirm_trip boolean default false,
    status boolean not null default 1,
    created_at timestamp not null default current_timestamp
);
