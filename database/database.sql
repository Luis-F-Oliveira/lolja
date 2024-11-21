create database lolja;

use lolja;

create table Product(
	id int not null auto_increment,
    name varchar(55) not null,
    price decimal(10, 2) not null,
    unit int not null,
    stats varchar(10) not null,
    url varchar(155) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp,
    primary key (id)
);
