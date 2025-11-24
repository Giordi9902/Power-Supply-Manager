create table users(
    id int auto_increment primary key,
    username varchar(100) not null unique,
    password varchar(255) not null,
    created_at timestamp default current_timestamp
);

create table power_supplies(
    id int auto_increment primary key,
    marca varchar(255) NOT NULL,
    modello varchar(100) NOT NULL,
    input_min_v decimal(10,2),
    input_max_v decimal(10,2),
    ampere_input decimal(10,2),
    ampere_output decimal(10,2),
    freq_min_hz decimal(10,2),
    freq_max_hz decimal(10,2),
    output_details decimal(10,2) NOT NULL,
    made_in VARCHAR(100),
    note TEXT,
    created_at timestamp default current_timestamp
);