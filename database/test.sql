CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `bio` varchar(160) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
   PRIMARY KEY(u_id)
);


CREATE TABLE `coos` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `discription` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY(c_id),
  FOREIGN KEY(user_id) REFERENCES user(u_id)
);


CREATE TABLE `comments` (
  `cm_id` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
   PRIMARY KEY(cm_id),
   FOREIGN KEY(user_id) REFERENCES user(u_id),
   FOREIGN KEY(post_id) REFERENCES post(p_id)
);

CREATE TABLE `likes` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
   PRIMARY KEY(l_id),
   FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`),
   FOREIGN KEY (`post_id`) REFERENCES `post` (`po_id`)
);