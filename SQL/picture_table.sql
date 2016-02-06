/*user_pk == column pk in table users */
create table pictures (
picture_pk varchar(25) not null,
picture blob not null,
picture_size varchar(25) not null default '',
picture_type varchar(25) not null default '',
picture_name varchar(100) not null default '',
user_pk varchar(25) not null,
picture_info varchar(256) not null default '',
PRIMARY KEY picture_pk
);