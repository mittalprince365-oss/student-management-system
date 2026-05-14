CREATE DATABASE sms;

USE sms;

CREATE TABLE student (
    uid INT PRIMARY KEY,
    uname VARCHAR(100) NOT NULL,
    uemail VARCHAR(100) NOT NULL,
    uphoneno VARCHAR(20) NOT NULL,
    udate DATE NOT NULL
);