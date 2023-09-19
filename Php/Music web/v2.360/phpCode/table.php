<?php
/* email && username || owner => 100
 name => 40*/

$connect = mysqli_connect('localhost', 'Quick', 'rAsH(TE6m@HMvsv8', 'Quick');
mysqli_multi_query($connect, "CREATE TABLE `Music` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NULL,
	`singer` varchar(100) NULL,
	`album` varchar(100) NULL,
	`link` varchar(100) NOT NULL,
	`owner` varchar(100) NOT NULL
  );
  CREATE TABLE `channel` (
    `id` varchar(100) PRIMARY KEY,
    `name` varchar(40) NOT NULL,
    `bio` varchar(200) NULL,
    `image` varchar(500) NULL,
    `rank` varchar(500) NULL,
    `post` int(255) NULL,
    `followers` int(255) NULL,
    `following` int(255) NULL,
    `star` varchar(100) NULL,
    `theme` varchar(100) NULL,
    `owner` varchar(100) NOT NULL
  );
  CREATE TABLE `hashtag` (
    `name` varchar(40) PRIMARY KEY,
    `post` int(255) NULL
  );
  CREATE TABLE `theme` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `type` varchar(20) NOT NULL,
    `bg` varchar(40) NOT NULL,
    `border` varchar(20) NULL,
    `surface` varchar(20) NULL,
    `text-primary` varchar(20) NULL,
    `text-secondary` varchar(20) NULL,
    `primary` varchar(20) NULL,
    `text-inverse` varchar(20) NULL,
    `creator` varchar(100) NOT NULL
  );
  CREATE TABLE `user` (
    `email` varchar(100) PRIMARY KEY,
    `name` varchar(40) NOT NULL,
    `channel` varchar(40) NULL,
    `password` varchar(100) NOT NULL,
    `image` varchar(500) NULL,
    `rank` varchar(500) NULL,
    `cookie` varchar(500) NOT NULL
  );
  CREATE TABLE `cookie` (
    `cookie` varchar(500) PRIMARY KEY,
    `browser_agent` varchar(1500) NOT NULL,
    `date` int(50) NOT NULL
  )
  ");
if ($connect->connect_error) {
  die("Error : " . $connect->connect_error);
}
