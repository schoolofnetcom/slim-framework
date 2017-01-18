DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


INSERT INTO `users` VALUES (1,'Erik Figueiredo','erik@schoolofnet.com','123456','123456', NOW(), NOW());
INSERT INTO `users` VALUES (2,'Usuario 1','usuario1@schoolofnet.com','654321','654321', NOW(), NOW());
INSERT INTO `users` VALUES (3,'Usuario 2','usuario2@schoolofnet.com','123456','123456', NOW(), NOW());
INSERT INTO `users` VALUES (4,'Usuario 3','usuario3@schoolofnet.com','123456','123456', NOW(), NOW());
