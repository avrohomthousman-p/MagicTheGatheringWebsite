<?php

include 'databaseLoginData.php';




function createTables(){
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    
    $query = <<< TEXT
          CREATE TABLE Users (
            UserID        INT                    PRIMARY KEY  AUTO_INCREMENT,
            Username      VARCHAR(15)            UNIQUE NOT NULL,
            Password      VARCHAR(15)            NOT NULL,   
            Role          VARCHAR(15)            NOT NULL DEFAULT 'user'
          );       
TEXT;
    mysqli_query($connection, $query);
    
    
    
    
    $query = <<< TEXT
           CREATE TABLE Cards (
            Name          VARCHAR(30)    PRIMARY KEY,
            PicUrl        VARCHAR(120)   NOT NULL         
           );          
TEXT;
    mysqli_query($connection, $query);
    
    
    
    
    $query = <<< TEXT
       CREATE TABLE Decks (
        DeckID             INT            PRIMARY KEY   AUTO_INCREMENT,
        DeckName           VARCHAR(15)    NOT NULL,
        UserID             INT            NOT NULL REFERENCES Collections (CollectionID),
        Format             VARCHAR(15)    NOT NULL
       );     
TEXT;
    mysqli_query($connection, $query);
    
    
    
    $query = <<< TEXT
       CREATE TABLE OwnedBy (
        UserID             INT,
        Cardname           VARCHAR(30)    NOT NULL  REFERENCES Orders (OrderID),
        Quantity           INT            NOT NULL  DEFAULT 1,
        Availible          INT            NOT NULL,
        PRIMARY KEY(UserID, Cardname)  
       );     
TEXT;
    mysqli_query($connection, $query);
    
    
    
    $query = <<< TEXT
       CREATE TABLE InDeck (
        DeckID             INT            REFERENCES Decks (DeckID),
        Cardname           VARCHAR(30)    REFERENCES Cards (Name),
        Quantity           INT            NOT NULL  DEFAULT 1,
        IsCommander        INT            NOT NULL,
        PRIMARY KEY(DeckID, Cardname) 
       );
TEXT;
    mysqli_query($connection, $query);
    
    
    
    $query = <<< TEXT
            CREATE TABLE CardOfTheDay (
              Cardname        VARCHAR(30)     PRIMARY KEY,
              LastUpdated     DATE
            );
TEXT;
    
    mysqli_query($connection, $query);
    
    
    $connection->close();
}


function populateTables(){
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));


    //Fill Users table
    mysqli_query($connection, "INSERT INTO Users (Username, Password, Role) VALUES('ahousman', 'mypass12', 'admin');");
    mysqli_query($connection, "INSERT INTO Users (Username, Password, Role) VALUES('avrohom', 'mypass12', 'user');"); 
    mysqli_query($connection, "INSERT INTO Users (Username, Password, Role) VALUES('shlomoYomTov', 'mypass12', 'user');");
    mysqli_query($connection, "INSERT INTO Users (Username, Password, Role) VALUES('yochonon', 'mypass12', 'user');");
    mysqli_query($connection, "INSERT INTO Users (Username, Password, Role) VALUES('dovidLeib', 'mypass12', 'user');");

    
    
    //fill Cards table
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Mizzix_of_the_Izmagnus', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/d/0/d0ea2c3a-c36d-44e8-bc46-5361f5f9d0e7.jpg?1562709949');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Negate', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/1/d/1dc492d5-ec52-4ab3-813e-acb40b0b6d5a.jpg?1645327986');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Sol_Ring', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/3/8/38d347b7-dc17-417a-ab07-29fe99b9a101.jpg?1645329408');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Solve_the_Equation', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/6/6/66c04ee2-c1e0-45fb-aaf5-1b4459df80fc.jpg?1624590433');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Tezzerets_Gambit', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/1/b/1beea6e6-d201-4f6a-ab06-e5a3d04db123.jpg?1568004086');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Reiterate', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/9/9/99302c41-434f-41ff-a61a-2c3681a0c135.jpg?1619397418');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Fireminds_Foresight', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/5/5/555778df-8ed9-4eb3-859b-4246d9e05ee5.jpg?1605275421');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Comet_Storm', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/b/b/bb5f586d-6bf0-4590-ad73-2d46b2a45b1a.jpg?1608912233');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Mountain', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/9/6/961dcc35-a282-4d40-93b3-1cc7fa5221f5.jpg?1645328315');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Island', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/9/c/9c0f350d-13ec-4e13-9c4c-1d6bfb9aa0b3.jpg?1645328292');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Swamp', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/4/8/48f7492c-67f2-4ba3-848b-7a6a8df7e88b.jpg?1643664160');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Plains', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/5/f/5fc26aa1-58b9-41b5-95b4-7e9bf2309b54.jpg?1643664250');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Forest', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/a/e/aea5c36b-c107-4daf-bedb-507b4cd64724.jpg?1643664067');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Reliquary_Tower', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/e/f/ef4e383e-ca2c-40d0-b510-8cf9a2e10176.jpg?1645329594');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Thought_Vessel', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/6/7/671d3d4b-e4ab-4d40-a3fd-1db1e52501a7.jpg?1645328029');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Spell_Burst', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/8/1/8169929c-641f-41c8-a48e-1a7d0c57726b.jpg?1619394723');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Commanders_Insight', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/a/7/a70d1553-40f4-42ce-a02e-e42525f9d75e.jpg?1625191177');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Cultivate', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/2/c/2c7b84c8-b79d-4d05-8d2e-23657bd6ca7c.jpg?1631587837');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Command_Tower', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/6/5/6576ee65-45e4-4291-a10a-8631366f0e8f.jpg?1645329488');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Arcane_Signet', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/f/d/fd061dd3-3cf1-4102-a9a2-dd89500171a7.jpg?1645329307');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Swords_to_Plowshares', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/8/0/80f46b80-0728-49bf-9d54-801eaa10b9b2.jpg?1644343701');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Beast_Within', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/d/e/de50c5d4-6599-4894-a8d7-01d104fc97fd.jpg?1644344364');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Generous_Gift', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/f/2/f2bb6b0c-45e8-43ff-8fd6-78fbf6979b68.jpg?1644343594');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Rampant_Growth', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/0/4/0442b365-c970-478b-b418-ae02d83ca8e1.jpg?1644344555');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Blasphemous_Act', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/4/0/40eb7856-95f7-4a62-bc99-b5d0852606ad.jpg?1645328361');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Heroic_Intervention', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/c/5/c5e72882-dbf8-42d2-9a98-31f2f71e2ed9.jpg?1631587974');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Swiftfoot_Boots', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/9/c/9c316917-1569-4d95-8729-3b7a0fc39465.jpg?1645327961');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Reclamation_Sage', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/1/c/1c4a25f0-2929-4404-9ce5-bcd4715f90a5.jpg?1631235123');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Sun_Titan', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/e/0/e0f6b7d1-75ea-4153-bbf1-85ed5041fe67.jpg?1631586036');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Solemn_Simulacrum', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/3/a/3a80f639-b3e8-495a-a967-d9ecff80045d.jpg?1644345338');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Commanders_Sphere', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/5/5/55ac2ca9-b6cf-453a-9d8b-8b7be5695f1e.jpg?1641603730');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Time_Wipe', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/6/2/62c59475-6f15-48d2-b105-f49901f20d44.jpg?1557577308');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Shatter_the_Sky', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/b/7/b706977b-db8e-4810-882d-ed3745404489.jpg?1581479244');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Beast_Whisperer', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/b/7/b7e90355-80ca-49db-914c-62b3a7bd4726.jpg?1631234731');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Deadly_Tempest', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/5/f/5f673d4a-76fa-4e9d-b7f6-299d80c55cb5.jpg?1625976828');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Simic_Guildgate', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/d/9/d93f0124-eb83-4261-8ad2-5590155274a4.jpg?1608918094');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Simic_Signet', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/4/c/4cb9a0b9-ddc8-4cdc-b352-0289c66f6fed.jpg?1625979225');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Arcane_Denial', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/2/4/247e08a1-b9ce-4312-aec4-626992933038.jpg?1641601774');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Selesnya_Signet', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/2/f/2fd90c6e-1cdc-4e53-b81e-7a095a63bb34.jpg?1592673678');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Tatyova_Benthic_Druid', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/9/3/93657aaa-7a0f-49ad-b026-6f79b3bd6768.jpg?1591104748');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Avenger_of_Zendikar', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/0/3/03dea775-bbb3-4e9c-8514-0605b5ad2e8b.jpg?1632467938');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Pongify', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/a/1/a1501dea-4e0e-49b0-86b5-e8a01f77077d.jpg?1619394479');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Seedborn_Muse', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/3/f/3f5bee0f-ebc8-4f41-91ee-4eed104ad980.jpg?1610161744');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Gray_Merchant_of_Asphodel', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/7/c/7c1a7dd8-8034-4f59-a351-33666b26ff5a.jpg?1581479807');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Wood_Elves', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/2/2/227746cb-8d9e-4f56-a19c-971a35f4cf20.jpg?1631235298');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Propaganda', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/b/c/bc0331b2-7a5b-46f5-9698-f185431ca711.jpg?1631586422');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Narset_Parter_of_Veils', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/8/c/8c39f9b4-02b9-4d44-b8d6-4fd02ebbb0c5.jpg?1574294103');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Dryad_of_the_Ilysian_Grove', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/6/d/6d964876-194b-49f1-8e74-cfe9269f2c62.jpg?1584114361');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Shamanic_Revelation', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/b/9/b95f36ad-2fb0-448c-b74f-a2a104240d8d.jpg?1644344615');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Acidic_Slime', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/c/6/c672b34d-066e-40e6-a499-3ab68ea6514c.jpg?1644344321');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Wilhelt_the_Rotcleaver', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/2/5/2501a911-d072-436d-ae3b-a5164e3b30aa.jpg?1637627743');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Yarok_the_Desecrated', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/a/1/a1001d43-e11b-4e5e-acd4-4a50ef89977f.jpg?1592517590');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Endless_Ranks_of_the_Dead', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/1/5/155ae16c-f32b-421d-a92a-bf13d9f32891.jpg?1637630179');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Rooftop_Storm', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/8/0/80cdee59-0ead-4b95-a348-c1e360d781ab.jpg?1637629769');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Blood_on_the_Snow', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/d/8/d8606f40-0af4-443b-a413-a88dc3e8f32e.jpg?1631047655');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Ravenous_Chupacabra', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/4/0/40d3e58e-f989-4169-9e2c-a66a23170dcf.jpg?1600701250');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Sunken_Hope', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/7/3/73fe736d-9ffa-4e8b-a353-d591da749ec3.jpg?1562916522');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Hornet_Queen', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/d/2/d245cb84-56aa-47a1-aa3a-17ffded57e15.jpg?1625194450');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Agent_of_Treachery', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/c/c/cc6686e6-4535-49be-b0b3-e76464656cd2.jpg?1639052497');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Counterspell', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/a/4/a457f404-ddf1-40fa-b0f0-23c8598533f4.jpg?1645328634');");
    mysqli_query($connection, "INSERT INTO Cards (Name, PicUrl) VALUES('Muldrotha_the_Gravetide', 'https://c1.scryfall.com/file/scryfall-cards/normal/front/c/6/c654737d-34ac-42ff-ae27-3a3bbb930fc1.jpg?1591204580');");

    
     
    
    //Fill Decks table
    mysqli_query($connection, "INSERT INTO Decks (Deckname, Format, UserID) VALUES('Zombie', 'standard', 2);");
    mysqli_query($connection, "INSERT INTO Decks (Deckname, Format, UserID) VALUES('Mizzex', 'commander', 2);");
    mysqli_query($connection, "INSERT INTO Decks (Deckname, Format, UserID) VALUES('Yarrok', 'standard', 3);");
    mysqli_query($connection, "INSERT INTO Decks (Deckname, Format, UserID) VALUES('Counterspells', 'legacy', 4);");
    mysqli_query($connection, "INSERT INTO Decks (Deckname, Format, UserID) VALUES('Muldrotha', 'brawl', 5);"); 
     
    
    
    //Fill OwnedBy table
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Wilhelt_the_Rotcleaver', 4, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Counterspell', 9, 5);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Endless_Ranks_of_the_Dead', 2, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Swamp', 28, 20);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Island', 28, 20);");
    
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Mizzix_of_the_Izmagnus', 2, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Negate', 7, 6);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Blasphemous_Act', 3, 2);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Narset_Parter_of_Veils', 2, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Sol_Ring', 4, 3);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (2, 'Tezzerets_Gambit', 1, 0);");
    
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Island', 30, 22);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Forest', 31, 23);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Reclamation_Sage', 2, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Solemn_Simulacrum', 4, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Wood_Elves', 5, 3);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Deadly_Tempest', 5, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Avenger_of_Zendikar', 1, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (3, 'Acidic_Slime', 2, 0);");
    
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Island', 22, 10);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Spell_Burst', 4, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Negate', 6, 2);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Solve_the_Equation', 2, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Pongify', 3, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (4, 'Arcane_Denial', 5, 1);");
    
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Muldrotha_the_Gravetide', 1, 0);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Arcane_Denial', 3, 21);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Rampant_Growth', 4, 3);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Seedborn_Muse', 2, 1);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Island', 30, 20);");
    mysqli_query($connection, "INSERT INTO OwnedBy (UserID, Cardname, Quantity, Availible) VALUES (5, 'Swamp', 30, 20);");
    
    
    
    //fill InDeck table
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (1, 'Wilhelt_the_Rotcleaver', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (1, 'Counterspell', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (1, 'Endless_Ranks_of_the_Dead', false, 2);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (1, 'Swamp', false, 8);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (1, 'Island', false, 8);");
    
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Mizzix_of_the_Izmagnus', true, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Negate', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Blasphemous_Act', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Narset_Parter_of_Veils', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Sol_Ring', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (2, 'Tezzerets_Gambit', false, 1);");
    
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Island', false, 8);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Forest', false, 8);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Reclamation_Sage', false, 2);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Solemn_Simulacrum', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Wood_Elves', false, 2);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Deadly_Tempest', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Avenger_of_Zendikar', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (3, 'Acidic_Slime', false, 2);");
    
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Island', false, 12);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Spell Burst', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Negate', false, 4);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Solve_the_Equation', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Pongify', false, 2);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (4, 'Arcane_Denial', false, 4);");
    
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Muldrotha_the_Gravetide', true, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Arcane_Denial', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Rampant_Growth', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Seedborn_Muse', false, 1);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Island', false, 10);");
    mysqli_query($connection, "INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity) VALUES (5, 'Swamp', false, 10);");
    
    //fill CardOfTheDay table (which should always have exactly 1 row)
    mysqli_query($connection, "INSERT INTO CardOfTheDay(Cardname, LastUpdated) VALUES('Seedborn_Muse', CURDATE());");
    
    $connection->close();
}


function printTable($table){
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $result = $connection->query("SELECT * FROM {$table};");

    while ($row = $result->fetch_assoc()) {
        foreach($row as $k => $v){
            echo($k . ": " . $v . ", ");
        }
        echo("<br>");
    }
    
    echo("<br><br><br>");
}




createTables();
populateTables();
printTable("Users");
echo("<h1>Sucsess!!</h1>");

