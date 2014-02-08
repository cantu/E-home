create table sensor_data
(
    id      int unsigned not null auto_increment primary key,
    time    tinytext not null,
    counter int unsigned not null,
    temp1   float(4,2) not null,
    temp2   float(4,2) not null,
    temp3   float(4,2) not null,
    humidty float(4,2) not null,
    PIR     boolean not null
);
