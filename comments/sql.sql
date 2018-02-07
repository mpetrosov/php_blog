CREATE TABLE comments (
cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
uid varchar(128) NOT null,
date datetime NOT null,
message TEXT NOT null
)