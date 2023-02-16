-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: CardCollections
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `Name` varchar(30) NOT NULL,
  `PicUrl` varchar(120) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES ('Acidic_Slime','https://c1.scryfall.com/file/scryfall-cards/normal/front/c/6/c672b34d-066e-40e6-a499-3ab68ea6514c.jpg?1644344321'),('Agent_of_Treachery','https://c1.scryfall.com/file/scryfall-cards/normal/front/c/c/cc6686e6-4535-49be-b0b3-e76464656cd2.jpg?1639052497'),('Arcane_Denial','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/4/247e08a1-b9ce-4312-aec4-626992933038.jpg?1641601774'),('Arcane_Signet','https://c1.scryfall.com/file/scryfall-cards/normal/front/f/d/fd061dd3-3cf1-4102-a9a2-dd89500171a7.jpg?1645329307'),('Avenger_of_Zendikar','https://c1.scryfall.com/file/scryfall-cards/normal/front/0/3/03dea775-bbb3-4e9c-8514-0605b5ad2e8b.jpg?1632467938'),('Beast_Whisperer','https://c1.scryfall.com/file/scryfall-cards/normal/front/b/7/b7e90355-80ca-49db-914c-62b3a7bd4726.jpg?1631234731'),('Beast_Within','https://c1.scryfall.com/file/scryfall-cards/normal/front/d/e/de50c5d4-6599-4894-a8d7-01d104fc97fd.jpg?1644344364'),('Blasphemous_Act','https://c1.scryfall.com/file/scryfall-cards/normal/front/4/0/40eb7856-95f7-4a62-bc99-b5d0852606ad.jpg?1645328361'),('Blood_on_the_Snow','https://c1.scryfall.com/file/scryfall-cards/normal/front/d/8/d8606f40-0af4-443b-a413-a88dc3e8f32e.jpg?1631047655'),('Comet_Storm','https://c1.scryfall.com/file/scryfall-cards/normal/front/b/b/bb5f586d-6bf0-4590-ad73-2d46b2a45b1a.jpg?1608912233'),('Commanders_Insight','https://c1.scryfall.com/file/scryfall-cards/normal/front/a/7/a70d1553-40f4-42ce-a02e-e42525f9d75e.jpg?1625191177'),('Commanders_Sphere','https://c1.scryfall.com/file/scryfall-cards/normal/front/5/5/55ac2ca9-b6cf-453a-9d8b-8b7be5695f1e.jpg?1641603730'),('Command_Tower','https://c1.scryfall.com/file/scryfall-cards/normal/front/6/5/6576ee65-45e4-4291-a10a-8631366f0e8f.jpg?1645329488'),('Counterspell','https://c1.scryfall.com/file/scryfall-cards/normal/front/a/4/a457f404-ddf1-40fa-b0f0-23c8598533f4.jpg?1645328634'),('Cultivate','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/c/2c7b84c8-b79d-4d05-8d2e-23657bd6ca7c.jpg?1631587837'),('Deadly_Tempest','https://c1.scryfall.com/file/scryfall-cards/normal/front/5/f/5f673d4a-76fa-4e9d-b7f6-299d80c55cb5.jpg?1625976828'),('Dryad_of_the_Ilysian_Grove','https://c1.scryfall.com/file/scryfall-cards/normal/front/6/d/6d964876-194b-49f1-8e74-cfe9269f2c62.jpg?1584114361'),('Endless_Ranks_of_the_Dead','https://c1.scryfall.com/file/scryfall-cards/normal/front/1/5/155ae16c-f32b-421d-a92a-bf13d9f32891.jpg?1637630179'),('Fireminds_Foresight','https://c1.scryfall.com/file/scryfall-cards/normal/front/5/5/555778df-8ed9-4eb3-859b-4246d9e05ee5.jpg?1605275421'),('Forest','https://c1.scryfall.com/file/scryfall-cards/normal/front/a/e/aea5c36b-c107-4daf-bedb-507b4cd64724.jpg?1643664067'),('Generous_Gift','https://c1.scryfall.com/file/scryfall-cards/normal/front/f/2/f2bb6b0c-45e8-43ff-8fd6-78fbf6979b68.jpg?1644343594'),('Gravecrawler','https://c1.scryfall.com/file/scryfall-cards/normal/front/3/c/3c189fe5-a5f9-4057-bb70-0a88ae3169de.jpg?1592763247'),('Gray_Merchant_of_Asphodel','https://c1.scryfall.com/file/scryfall-cards/normal/front/7/c/7c1a7dd8-8034-4f59-a351-33666b26ff5a.jpg?1581479807'),('Headless_Skaab','https://c1.scryfall.com/file/scryfall-cards/normal/front/c/a/ca63f9a2-381e-4c84-b0bb-3acd9445b4db.jpg?1562942787'),('Heroic_Intervention','https://c1.scryfall.com/file/scryfall-cards/normal/front/c/5/c5e72882-dbf8-42d2-9a98-31f2f71e2ed9.jpg?1631587974'),('Hornet_Queen','https://c1.scryfall.com/file/scryfall-cards/normal/front/d/2/d245cb84-56aa-47a1-aa3a-17ffded57e15.jpg?1625194450'),('Island','https://c1.scryfall.com/file/scryfall-cards/normal/front/9/c/9c0f350d-13ec-4e13-9c4c-1d6bfb9aa0b3.jpg?1645328292'),('Mizzix_of_the_Izmagnus','https://c1.scryfall.com/file/scryfall-cards/normal/front/d/0/d0ea2c3a-c36d-44e8-bc46-5361f5f9d0e7.jpg?1562709949'),('Mountain','https://c1.scryfall.com/file/scryfall-cards/normal/front/9/6/961dcc35-a282-4d40-93b3-1cc7fa5221f5.jpg?1645328315'),('Muldrotha_the_Gravetide','https://c1.scryfall.com/file/scryfall-cards/normal/front/c/6/c654737d-34ac-42ff-ae27-3a3bbb930fc1.jpg?1591204580'),('Narset_Parter_of_Veils','https://c1.scryfall.com/file/scryfall-cards/normal/front/8/c/8c39f9b4-02b9-4d44-b8d6-4fd02ebbb0c5.jpg?1574294103'),('Necromancers_Stockpile','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/b/2ba07e86-fdef-4f51-808e-7780883eefe3.jpg?1562784407'),('Negate','https://c1.scryfall.com/file/scryfall-cards/normal/front/1/d/1dc492d5-ec52-4ab3-813e-acb40b0b6d5a.jpg?1645327986'),('Plains','https://c1.scryfall.com/file/scryfall-cards/normal/front/5/f/5fc26aa1-58b9-41b5-95b4-7e9bf2309b54.jpg?1643664250'),('Pongify','https://c1.scryfall.com/file/scryfall-cards/normal/front/a/1/a1501dea-4e0e-49b0-86b5-e8a01f77077d.jpg?1619394479'),('Propaganda','https://c1.scryfall.com/file/scryfall-cards/normal/front/b/c/bc0331b2-7a5b-46f5-9698-f185431ca711.jpg?1631586422'),('Rampant_Growth','https://c1.scryfall.com/file/scryfall-cards/normal/front/0/4/0442b365-c970-478b-b418-ae02d83ca8e1.jpg?1644344555'),('Ravenous_Chupacabra','https://c1.scryfall.com/file/scryfall-cards/normal/front/4/0/40d3e58e-f989-4169-9e2c-a66a23170dcf.jpg?1600701250'),('Reclamation_Sage','https://c1.scryfall.com/file/scryfall-cards/normal/front/1/c/1c4a25f0-2929-4404-9ce5-bcd4715f90a5.jpg?1631235123'),('Reiterate','https://c1.scryfall.com/file/scryfall-cards/normal/front/9/9/99302c41-434f-41ff-a61a-2c3681a0c135.jpg?1619397418'),('Reliquary_Tower','https://c1.scryfall.com/file/scryfall-cards/normal/front/e/f/ef4e383e-ca2c-40d0-b510-8cf9a2e10176.jpg?1645329594'),('Rooftop_Storm','https://c1.scryfall.com/file/scryfall-cards/normal/front/8/0/80cdee59-0ead-4b95-a348-c1e360d781ab.jpg?1637629769'),('Seedborn_Muse','https://c1.scryfall.com/file/scryfall-cards/normal/front/3/f/3f5bee0f-ebc8-4f41-91ee-4eed104ad980.jpg?1610161744'),('Selesnya_Signet','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/f/2fd90c6e-1cdc-4e53-b81e-7a095a63bb34.jpg?1592673678'),('Shamanic_Revelation','https://c1.scryfall.com/file/scryfall-cards/normal/front/b/9/b95f36ad-2fb0-448c-b74f-a2a104240d8d.jpg?1644344615'),('Shatter_the_Sky','https://c1.scryfall.com/file/scryfall-cards/normal/front/b/7/b706977b-db8e-4810-882d-ed3745404489.jpg?1581479244'),('Simic_Guildgate','https://c1.scryfall.com/file/scryfall-cards/normal/front/d/9/d93f0124-eb83-4261-8ad2-5590155274a4.jpg?1608918094'),('Simic_Signet','https://c1.scryfall.com/file/scryfall-cards/normal/front/4/c/4cb9a0b9-ddc8-4cdc-b352-0289c66f6fed.jpg?1625979225'),('Solemn_Simulacrum','https://c1.scryfall.com/file/scryfall-cards/normal/front/3/a/3a80f639-b3e8-495a-a967-d9ecff80045d.jpg?1644345338'),('Solve_the_Equation','https://c1.scryfall.com/file/scryfall-cards/normal/front/6/6/66c04ee2-c1e0-45fb-aaf5-1b4459df80fc.jpg?1624590433'),('Sol_Ring','https://c1.scryfall.com/file/scryfall-cards/normal/front/3/8/38d347b7-dc17-417a-ab07-29fe99b9a101.jpg?1645329408'),('Spell_Burst','https://c1.scryfall.com/file/scryfall-cards/normal/front/8/1/8169929c-641f-41c8-a48e-1a7d0c57726b.jpg?1619394723'),('Sunken_Hope','https://c1.scryfall.com/file/scryfall-cards/normal/front/7/3/73fe736d-9ffa-4e8b-a353-d591da749ec3.jpg?1562916522'),('Sun_Titan','https://c1.scryfall.com/file/scryfall-cards/normal/front/e/0/e0f6b7d1-75ea-4153-bbf1-85ed5041fe67.jpg?1631586036'),('Swamp','https://c1.scryfall.com/file/scryfall-cards/normal/front/4/8/48f7492c-67f2-4ba3-848b-7a6a8df7e88b.jpg?1643664160'),('Swiftfoot_Boots','https://c1.scryfall.com/file/scryfall-cards/normal/front/9/c/9c316917-1569-4d95-8729-3b7a0fc39465.jpg?1645327961'),('Swords_to_Plowshares','https://c1.scryfall.com/file/scryfall-cards/normal/front/8/0/80f46b80-0728-49bf-9d54-801eaa10b9b2.jpg?1644343701'),('Tatyova_Benthic_Druid','https://c1.scryfall.com/file/scryfall-cards/normal/front/9/3/93657aaa-7a0f-49ad-b026-6f79b3bd6768.jpg?1591104748'),('Tezzerets_Gambit','https://c1.scryfall.com/file/scryfall-cards/normal/front/1/b/1beea6e6-d201-4f6a-ab06-e5a3d04db123.jpg?1568004086'),('Thought_Vessel','https://c1.scryfall.com/file/scryfall-cards/normal/front/6/7/671d3d4b-e4ab-4d40-a3fd-1db1e52501a7.jpg?1645328029'),('Time_Wipe','https://c1.scryfall.com/file/scryfall-cards/normal/front/6/2/62c59475-6f15-48d2-b105-f49901f20d44.jpg?1557577308'),('Wilhelt_the_Rotcleaver','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/5/2501a911-d072-436d-ae3b-a5164e3b30aa.jpg?1637627743'),('Wood_Elves','https://c1.scryfall.com/file/scryfall-cards/normal/front/2/2/227746cb-8d9e-4f56-a19c-971a35f4cf20.jpg?1631235298'),('Yarok_the_Desecrated','https://c1.scryfall.com/file/scryfall-cards/normal/front/a/1/a1001d43-e11b-4e5e-acd4-4a50ef89977f.jpg?1592517590');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decks`
--

DROP TABLE IF EXISTS `decks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `decks` (
  `DeckID` int(11) NOT NULL AUTO_INCREMENT,
  `DeckName` varchar(15) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Format` varchar(15) NOT NULL,
  PRIMARY KEY (`DeckID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decks`
--

LOCK TABLES `decks` WRITE;
/*!40000 ALTER TABLE `decks` DISABLE KEYS */;
INSERT INTO `decks` VALUES (1,'Zombie',2,'standard'),(2,'Mizzex',2,'commander'),(3,'Yarrok',3,'standard'),(4,'Counterspells',4,'legacy'),(5,'Muldrotha',5,'brawl');
/*!40000 ALTER TABLE `decks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indeck`
--

DROP TABLE IF EXISTS `indeck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indeck` (
  `DeckID` int(11) NOT NULL,
  `Cardname` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `IsCommander` int(11) NOT NULL,
  PRIMARY KEY (`DeckID`,`Cardname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indeck`
--

LOCK TABLES `indeck` WRITE;
/*!40000 ALTER TABLE `indeck` DISABLE KEYS */;
INSERT INTO `indeck` VALUES (1,'Counterspell',4,0),(1,'Endless_Ranks_of_the_Dead',2,0),(1,'Gravecrawler',1,0),(1,'Headless_Skaab',2,0),(1,'Island',10,0),(1,'Necromancers_Stockpile',1,0),(1,'Swamp',10,0),(1,'Wilhelt_the_Rotcleaver',4,0),(2,'Blasphemous_Act',1,0),(2,'Mizzix_of_the_Izmagnus',1,1),(2,'Narset_Parter_of_Veils',1,0),(2,'Negate',1,0),(2,'Sol_Ring',1,0),(2,'Tezzerets_Gambit',1,0),(3,'Acidic_Slime',2,0),(3,'Avenger_of_Zendikar',1,0),(3,'Deadly_Tempest',4,0),(3,'Forest',8,0),(3,'Island',8,0),(3,'Reclamation_Sage',2,0),(3,'Solemn_Simulacrum',4,0),(3,'Wood_Elves',2,0),(4,'Arcane_Denial',4,0),(4,'Island',12,0),(4,'Negate',4,0),(4,'Pongify',2,0),(4,'Solve_the_Equation',1,0),(4,'Spell Burst',4,0),(5,'Arcane_Denial',1,0),(5,'Island',10,0),(5,'Muldrotha_the_Gravetide',1,1),(5,'Rampant_Growth',1,0),(5,'Seedborn_Muse',1,0),(5,'Swamp',10,0);
/*!40000 ALTER TABLE `indeck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ownedby`
--

DROP TABLE IF EXISTS `ownedby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ownedby` (
  `UserID` int(11) NOT NULL,
  `Cardname` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `Availible` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`Cardname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ownedby`
--

LOCK TABLES `ownedby` WRITE;
/*!40000 ALTER TABLE `ownedby` DISABLE KEYS */;
INSERT INTO `ownedby` VALUES (2,'Blasphemous_Act',3,2),(2,'Counterspell',9,5),(2,'Endless_Ranks_of_the_Dead',2,0),(2,'Gravecrawler',1,0),(2,'Headless_Skaab',2,0),(2,'Island',28,18),(2,'Mizzix_of_the_Izmagnus',2,1),(2,'Narset_Parter_of_Veils',2,1),(2,'Necromancers_Stockpile',1,0),(2,'Negate',7,6),(2,'Sol_Ring',4,3),(2,'Swamp',28,18),(2,'Tezzerets_Gambit',1,0),(2,'Wilhelt_the_Rotcleaver',4,0),(3,'Acidic_Slime',2,0),(3,'Avenger_of_Zendikar',1,0),(3,'Deadly_Tempest',5,1),(3,'Forest',31,23),(3,'Island',30,22),(3,'Reclamation_Sage',2,0),(3,'Solemn_Simulacrum',4,0),(3,'Wood_Elves',5,3),(4,'Arcane_Denial',5,1),(4,'Island',22,10),(4,'Negate',6,2),(4,'Pongify',3,1),(4,'Solve_the_Equation',2,1),(4,'Spell_Burst',4,0),(5,'Arcane_Denial',3,21),(5,'Island',30,20),(5,'Muldrotha_the_Gravetide',1,0),(5,'Rampant_Growth',4,3),(5,'Seedborn_Muse',2,1),(5,'Swamp',30,20);
/*!40000 ALTER TABLE `ownedby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(15) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ahousman','mypass12','admin'),(2,'avrohom','mypass12','user'),(3,'shlomoYomTov','mypass12','user'),(4,'yochonon','mypass12','user'),(5,'dovidLeib','mypass12','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-12 22:16:20
