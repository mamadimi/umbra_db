
/*Create table User_Account to keep information about a user*/
CREATE TABLE User_Account (
         Email          VARCHAR(30)    NOT NULL,
         Pasword        VARCHAR(20)    NOT NULL DEFAULT '', 
         Payment_Method  VARCHAR(50)             DEFAULT '-',
         First_Name     VARCHAR(50)    NOT NULL DEFAULT '',
         Last_Name      VARCHAR(50)    NOT NULL DEFAULT '',
         Birth_Date     DATE	       NOT NULL ,
         Credits        INT , 
         Banned_bit     BIT,
           
         PRIMARY KEY  (Email)
         
       );
       
/*Inserts to table User_Account*/
INSERT INTO User_Account VALUES  ('nmodoura@hotmail', '123456789N!', 'paypal', 'Nektarios', 'Modouras', '1993-10-06', 1524,0);
INSERT INTO User_Account VALUES  ('randomplayer@freemail.gr', '987654321', 'credit_card', 'fakefirstname', 'fakelastname', '1994-09-08', 100,0);
INSERT INTO User_Account VALUES  ('bot398@freemail.gr', 'P@ssword', NULL, 'dfsdfdgdfg', 'jmhghnhj', '1900-02-05', 2454,1);
INSERT INTO User_Account VALUES  ('Winner@gmail.com', 'password!', NULL, 'John', 'Brown', '1999-10-02', 2556,0);
INSERT INTO User_Account VALUES  ('player50@yahoo.gr', '12345', 'paysafe', 'noone', 'noone', '1995-01-09', 224,0);

CREATE TABLE user_login_cookies (

	 rand_id        INT   NOT NULL ,
         Email          VARCHAR(30)    NOT NULL,
           
         PRIMARY KEY  (rand_id),

CONSTRAINT fk_user_login_cookies 
		FOREIGN KEY (Email) REFERENCES User_Account(Email) ON UPDATE CASCADE ON DELETE CASCADE 
            
         
       );

/*Creation of table Characters*/ 
CREATE TABLE Characters (
         ID_char           VARCHAR(10)    NOT NULL UNIQUE,
         Name_char         VARCHAR(50)    NOT NULL , 
         Lvl	  		   INT     	      NOT NULL DEFAULT 1,        
         Agility    	   INT  		  NOT NULL DEFAULT 10,
		 Strength    	   INT  		  NOT NULL DEFAULT 10,
		 Stamina	       INT  		  NOT NULL DEFAULT 10,
		 Intelligence	   INT  		  NOT NULL DEFAULT 10, 
		 Hp			       FLOAT  	      NOT NULL DEFAULT 100,
		 Max_Hp		       FLOAT  	      NOT NULL DEFAULT 100,
		 Mp			       INT  		  NOT NULL DEFAULT 100,
		 Max_Mp		       INT  		  NOT NULL DEFAULT 100,
		 Move_Speed		   FLOAT  	      NOT NULL DEFAULT 40,
		 Physical_Attack   FLOAT  	      NOT NULL DEFAULT 40,
		 Magical_Attack	   FLOAT          NOT NULL DEFAULT 40,
		 Physical_Defence  INT  	      NOT NULL DEFAULT 20,
		 Magical_Defence   INT  	      NOT NULL DEFAULT 20,	
		 Critical_Rate	   FLOAT          NOT NULL DEFAULT 2,
		 Critical_Damage   FLOAT          NOT NULL DEFAULT 30,
		 Block			   FLOAT          NOT NULL DEFAULT 10,
		 Evasion		   FLOAT          NOT NULL DEFAULT 10,
		 Attack_Speed	   FLOAT          NOT NULL DEFAULT 1.0,
		 Attack_Range	   FLOAT          NOT NULL ,
		 Coordinate_x	   FLOAT          NOT NULL ,
		 Coordinate_y	   FLOAT          NOT NULL ,
		 Area		       VARCHAR(50)    NOT NULL ,
		 
         
         
         PRIMARY KEY  (ID_char),
		 CONSTRAINT   chk_Level  			CHECK (Lvl >0),
		 CONSTRAINT   chk_Agility  			CHECK (Agility >0),
		 CONSTRAINT   chk_Strength  		CHECK (Strength >0),
		 CONSTRAINT   chk_Stamina   		CHECK (Stamina >0),
		 CONSTRAINT   chk_Intelligence 		CHECK (Intelligence >0),
		 CONSTRAINT   chk_Hp		   	 	CHECK (Hp >=0),
		 CONSTRAINT   chk_Max_Hp  			CHECK (Max_Hp >0),
		 CONSTRAINT   chk_Mp		  	    CHECK (Mp >=0),
		 CONSTRAINT   chk_Max_Mp  			CHECK (Max_Mp >0),		 
         CONSTRAINT   chk_Move_Speed  		CHECK (Move_Speed >0),	
		 CONSTRAINT   chk_Physical_Attack 	CHECK (Physical_Attack >=0),	
		 CONSTRAINT   chk_Magical_Attack  	CHECK (Magical_Attack >=0),	
		 CONSTRAINT   chk_Physical_Defence  CHECK (Physical_Defence >=0),	
		 CONSTRAINT   chk_Magical_Defence  	CHECK (Magical_Defence >=0),	
		 CONSTRAINT   chk_Critical_Rate  	CHECK (Critical_Rate BETWEEN 0 AND 100),	
		 CONSTRAINT   chk_Critical_Damage  	CHECK (Critical_Damage >0),	
		 CONSTRAINT   chk_Block  			CHECK (Block >0),	
		 CONSTRAINT   chk_Evasion  			CHECK (Evasion >0),	
		 CONSTRAINT   chk_Attack_Speed  	CHECK (Attack_Speed >0),
		 CONSTRAINT   chk_Attack_Range  	CHECK (Attack_Range >0)
		 
       );
       
/*Insert into characters*/	
INSERT INTO Characters VALUES('n1','John',50,300,300,300,300,10000,10000,10000,10000,5,300,300,5000,5000,10,50,1,1,1,1,24.48,40.21,'Starting Area');   
INSERT INTO Characters VALUES('n2','Jack',50,300,300,300,300,10000,10000,10000,10000,5,300,300,5000,5000,10,50,10,10,1,1,50.76,124.68,'Wilderness');   
INSERT INTO Characters VALUES('n3','Guard',50,1000,1000,1000,1000,100000,100000,100000,100000,5,100000,100000,500000,500000,70,200,50,50,1.5,1,110.54,51.14,'Capital');   
INSERT INTO Characters VALUES('n4','General Merchant',50,300,300,300,300,10000,10000,10000,10000,5,300,300,5000,5000,10,50,1,1,1,1,13.56,72.25,'Village');   
INSERT INTO Characters VALUES('n5','King',50,300,300,300,300,10000,10000,10000,10000,5,300,300,5000,5000,10,50,1,1,1,1,32.57,86.45,'Palace');   

INSERT INTO Characters VALUES('m1','Chicken',1,1,1,1,1,10,10,10,10,5,1,0,1,1,1,1,1,1,1,1,45.20,36.98,'Starting Area');   
INSERT INTO Characters VALUES('m2','Goblin',10,30,30,20,10,150,150,150,150,5,40,0,7,7,10,50,1,1,1.3,1,129.45,7.89,'Village');   
INSERT INTO Characters VALUES('m3','Orc',30,40,100,100,10,3000,3000,2500,2500,5,200,0,500,300,16,75,5,1,0.8,1,78.54,22.65,'City');   
INSERT INTO Characters VALUES('m4','Orc Chieftain',50,50,250,200,10,5531,5531,2500,2500,5,500,0,750,400,20,100,10,10,0.9,1,69.21,0.05,'City');   
INSERT INTO Characters VALUES('m5','Dragon',100,1000,1000,1000,1000,10000000,10000000,10000000,10000000,8,5000,5000,2000,2000,27,150,1,20,1.3,25,54.21,12.58,'Wilderness');   

INSERT INTO Characters VALUES('p1','Jackkkk35',1,5,5,5,5,200,200,1000,1000,5,15,15,3,3,5,50,2,2,1,1,32.89,5.65,'Starting Area');  
INSERT INTO Characters VALUES('p2','Lord51',14,20,8,15,8,976,976,679,679,6.1,50,15,15,15,20,65,2,10,1.2,25,66.89,58.63,'Village');   
INSERT INTO Characters VALUES('p3','aaadckvjsi',35,15,126,114,50,2351,2351,100,1000,5.5,300,15,500,350,10,55,15,5,1.1,1,73.65,159.68,'Village');   
INSERT INTO Characters VALUES('p4','Bot999',70,643,695,427,379,1583,15831,14521,14521,6.7,725,15,700,700,40,200,5,30,1.5,1,92.51,145.23,'City');   
INSERT INTO Characters VALUES('p5','Dragon_Hunter978',91,126,174,759,942,21260,21260,25390,25390,5.8,15,925,750,1200,30,150,5,5,1.3,28,21.45,152.63,'Wilderness'); 


/*Creation of table PC*/ 	   
CREATE TABLE PC (
         ID_char           VARCHAR(10)       NOT NULL UNIQUE,
         Title             VARCHAR(50)    , 
         Gold	  		   INT     	      NOT NULL DEFAULT 10,        
         XP		    	   INT  		  NOT NULL DEFAULT 0,
		 XP_to_next_level  INT  		  NOT NULL DEFAULT 50,
		 Cast_Time		   FLOAT  	      NOT NULL DEFAULT 1,
		 Skill_Cooldown	   FLOAT  	      NOT NULL DEFAULT 1,
		 Email		       VARCHAR(30)    NOT NULL ,
		 Clas	                VARCHAR(20),
		 Gender	              VARCHAR(20),
		 

         PRIMARY KEY  (ID_char),
		 CONSTRAINT   pk_PC FOREIGN KEY (ID_char) REFERENCES Characters (ID_char) ON UPDATE CASCADE ON DELETE CASCADE,
         CONSTRAINT fk_PC  FOREIGN KEY (Email) REFERENCES User_Account (Email) ON UPDATE CASCADE ON DELETE CASCADE,
		 CONSTRAINT   chk_Gold  				CHECK (Gold >=0),	
		 CONSTRAINT   chk_XP  					CHECK (XP >=0),	
		 CONSTRAINT   chk_XP_to_next_level  	CHECK (XP_to_next_level >0),	
		 CONSTRAINT   chk_Cast_Time  			CHECK (Cast_Time >=0),	
		 CONSTRAINT   chk_Skill_Cooldown  		CHECK (Skill_Cooldown >=0),
		 CONSTRAINT chk_Class CHECK ( Clas IN ('fighter','wizard','rogue') ), 
		 CONSTRAINT chk_Gender CHECK ( Gender IN ('male','female') ) 

       );
       
/*Insert into PCs*/
INSERT INTO PC VALUES('p1',NULL,15,5,21,1,1,'nmodoura@hotmail','rogue','female');  
INSERT INTO PC VALUES('p2',NULL,100,1256,543,1,1,'randomplayer@freemail.gr','rogue','female');  
INSERT INTO PC VALUES('p3','Sir',825,524524,1045622,1,0.8,'Winner@gmail.com','wizard','female');  
INSERT INTO PC VALUES('p4','Lady',999999999,999999999,1,0.1,0.1,'bot398@freemail.gr','fighter','male');  
INSERT INTO PC VALUES('p5','Slayer',103457,0,50,0.5,0.5,'nmodoura@hotmail','fighter','male');  


/*Creation of table NPC*/ 
CREATE TABLE NPC (
         ID_char           VARCHAR(10)       NOT NULL UNIQUE,
         Trader             BIT			  NOT NULL DEFAULT 0, 		 
         
         PRIMARY KEY  (ID_char),
		 CONSTRAINT   pk_NPC FOREIGN KEY (ID_char) REFERENCES Characters (ID_char) ON UPDATE CASCADE ON DELETE CASCADE
       );
       
/*Insert into NPCs*/
INSERT INTO NPC VALUES('n1',0);  
INSERT INTO NPC VALUES('n2',0);  
INSERT INTO NPC VALUES('n3',0);  
INSERT INTO NPC VALUES('n4',1);  
INSERT INTO NPC VALUES('n5',0); 
	  
/*Creation of table Monster*/ 
CREATE TABLE Monster (
         ID_char                    VARCHAR(10)    NOT NULL UNIQUE,
         Difficulty                 INT            NOT NULL, 
         Aggro_Radius               FLOAT          NOT NULL,
         Max_Distance_Before_Reset  FLOAT          NOT NULL,
         Respawn_Time               FLOAT          NOT NULL,
		 
         PRIMARY KEY  (ID_char),
		 CONSTRAINT   pk_Monster FOREIGN KEY (ID_char) REFERENCES Characters (ID_char) ON UPDATE CASCADE ON DELETE CASCADE,
		 CONSTRAINT   chk_Difficulty  				CHECK (Difficulty >0),	
		 CONSTRAINT   chk_Aggro_Radius  			CHECK (Aggro_Radius >0),	
		 CONSTRAINT   chk_Max_Distance_Before_Reset CHECK (Max_Distance_Before_Reset >0),
		 CONSTRAINT   chk_Respawn_Time  			CHECK (Respawn_Time >0)
       );
	   	   
/*Insert into Monsters*/
INSERT INTO Monster VALUES('m1',1,1,30,300);  
INSERT INTO Monster VALUES('m2',1,5,30,300);  
INSERT INTO Monster VALUES('m3',1,5,30,300);  
INSERT INTO Monster VALUES('m4',3,5,30,600);  
INSERT INTO Monster VALUES('m5',5,20,500,21600); 

/*Creation of table Item*/
CREATE TABLE   Item (

    ID_item VARCHAR(10)    NOT NULL,
    Name_item varchar(50)  NOT NULL,
	Rarity VARCHAR(20) ,
	Description_item varchar(50) ,
	Tradeable bit ,
	Shop_Price float ,
	Category varchar(50) ,
	Equipable bit ,
	Usable bit ,
	Stackable bit ,
	Physical_Damage_item float ,
	Magical_Damage_item float ,
	Agility_item int ,
	Strength_item int ,
	Stamina_item int ,
	Intelligence_item int ,
	Critical_Rate_item float ,
	Critical_Damage_item float ,
    
	
	PRIMARY KEY  (ID_item) ,
	CONSTRAINT chk_Shop_Price  CHECK (Shop_Price >=0) 
);

/*Insert into table Item*/
INSERT INTO Item VALUES('i1','Legendary Sword','Unique', 'Sword of Legend',1,100000,'Sword',1,0,0,3000,3000,0,0,0,0,0,0);
INSERT INTO Item VALUES('i2','Heroic cape','Very rare', 'The best cloak',0,NULL,'Cloak',1,0,0,0,0,100,100,100,100,5,10);
INSERT INTO Item VALUES('i3','Necklace of speed','Rare','Increases Agilty',1,0,'Necklace',1,0,0,0,0,50,0,0,0,5,10);
INSERT INTO Item VALUES('i4','Dragonhide Shield','Very Rare','A basic shield',1,10,'Shield',1,0,0,0,0,0,0,30,0,0,0);
INSERT INTO Item VALUES('i5','Longbow','Rare','A stronger but slower bow',1,NULL,'2H_Weapon',1,0,0,50,0,50,0,0,10,15,50);
INSERT INTO Item VALUES('i6','Sharp Poisonus Dagger','Very Rare','Inflicts poison status on successful hit',0,NULL,'1H_Weapon',1,0,0,100,0,40,70,10,10,10,60);
INSERT INTO Item VALUES('i7','Small Health Potion','Normal','Restores health',1,5,'Potion',0,1,1,NULL,NULL,0,0,0,0,0,0);
INSERT INTO Item VALUES('i8','St. Cuthbert Armour','Unique', 'Saintly protection.',0,NULL,'Armour',1,0,0,0,0,500,500,200,200,5,10);
INSERT INTO Item VALUES('i9','Light Armour','Basic', 'Simple light armor.',1,20,'Armour',1,0,0,0,0,30,30,20,20,0,10);







/*Creation of table Quest*/
CREATE TABLE   Quest (

    Name_Quest VARCHAR(30)    NOT NULL,
    Xp_Reward int ,
	Gold_Reward int ,
	Description_quest varchar(500) ,
    
	
	PRIMARY KEY  (Name_Quest) ,
	CONSTRAINT chk_Gold_Reward CHECK (Gold_Reward >=0) ,
	CONSTRAINT chk_Xp_Reward  CHECK (Xp_reward >=0)
);

/*Insert into table Quest*/
INSERT INTO Quest VALUES('Kill a chicken',10,15,'Try killing some chickens.');
INSERT INTO Quest VALUES('Kill a Goblin',200,40,'Goblin raiders appeared near the village. Please help us kill them.');
INSERT INTO Quest VALUES('Kill 50 orcs',4000,1000,'The orcs of the mountains have started a war against us. Help us reduce their numbers and you will be rewarded.');
INSERT INTO Quest VALUES('Talk to John',10,5,'Please go and ask john when he will be back?');
INSERT INTO Quest VALUES('Deliver the message',1000,100,'Deliver this important document to jack immediately.');
INSERT INTO Quest VALUES('The orc chief',50000,1500,'The orcs have a new chieftain. He is the reason they became so aggressive these days. You are a skilled warrior, if you can do something about this chief you will not regret it.');
INSERT INTO Quest VALUES('Kill the dragon',0,1000000,'This dragon is a great danger for our country. Unfortunately noone is strong enough to defeat him. It would take a small army to even have a chance against him. Please seek companions and destroy this evil creature once and for all.');
INSERT INTO Quest VALUES ('Beginner Quest',10,10,'Go to Umbra city,find the blacksmith and buy an item');


/*Creation of table Alliance*/
CREATE TABLE Alliance(
	Name_Alliance VARCHAR(20) NOT NULL,

	PRIMARY KEY (Name_Alliance)

);

/*Insert into table Alliance*/
INSERT INTO Alliance VALUES('Fighters');
INSERT INTO Alliance VALUES('Killers');
INSERT INTO Alliance VALUES('Crafters');
INSERT INTO Alliance VALUES('Builders');
INSERT INTO Alliance VALUES('Ninjas');

/*Creation of table Guild*/
CREATE TABLE  Guild (

    Name_Guild VARCHAR(20)    NOT NULL,
    Number_of_members int ,
	Description_Guild varchar(50) ,
	Guild_Gold int ,
	Name_Alliance varchar(20) ,


    PRIMARY KEY  (Name_Guild) ,
	CONSTRAINT fk_Guild FOREIGN KEY (Name_Alliance) REFERENCES Alliance (Name_Alliance),
	CONSTRAINT chk_Number_of_membersd  CHECK (Number_of_members >=0) 
);

/*Insert into table Guild*/
INSERT INTO Guild VALUES('The slayers',95,'Fighting bosses.',10054,'Fighters');
INSERT INTO Guild VALUES('Dragon',200,'We can kill the dragon.',22345,'Fighters');
INSERT INTO Guild VALUES('Pirates',57,'We will steal everything from you',345443,'Killers');
INSERT INTO Guild VALUES('Warriors',538,'We got a castle !!!!',77552221,'Fighters');
INSERT INTO Guild VALUES('Blacksmiths',194,'Noone makes better weapons than us.',456567,'Crafters');
INSERT INTO Guild VALUES('Armory',246,'Our armor protects you from everything',245464,'Crafters');



/*Characters_in_quests*/
CREATE TABLE  Characters_in_quests (
         ID_char        VARCHAR(10)    NOT NULL,
         Name_Quest     VARCHAR(30)    NOT NULL,  
         Complete_quest BIT,   
         In_progress    INT ,           
		 Not_Started    BIT,   	  	   
		 Qstart         BIT,
         QEnd           BIT, 
         Target         BIT,
           
         PRIMARY KEY  (ID_char,Name_Quest),
         
        CONSTRAINT fk_Characters_in_quests
            FOREIGN KEY (ID_char) REFERENCES Characters(ID_char) ON UPDATE CASCADE ON DELETE CASCADE,
            FOREIGN KEY (Name_Quest) REFERENCES Quest(Name_Quest) ON UPDATE CASCADE ON DELETE CASCADE,
			 
         CONSTRAINT chk_In_progress CHECK (In_progress BETWEEN 0 AND 100)
         

       );
/*Insert into Characters_in_Quest*/
INSERT INTO Characters_in_quests VALUES('p5','Kill the dragon',0,50,0,NULL,NULL,NULL);
INSERT INTO Characters_in_quests VALUES('n2','Kill the dragon',NULL,NULL,NULL,1,NULL,1);
INSERT INTO Characters_in_quests VALUES('m5','Kill the dragon',NULL,NULL,NULL,0,1,0);

INSERT INTO Characters_in_quests VALUES('p1','The orc chief',0,0,1,NULL,NULL,NULL);
INSERT INTO Characters_in_quests VALUES('n5','The orc chief',NULL,NULL,NULL,1,NULL,1);
INSERT INTO Characters_in_quests VALUES('m4','The orc chief',NULL,NULL,NULL,0,1,0);

INSERT INTO Characters_in_quests VALUES('p1','Deliver the message',0,75,0,NULL,NULL,NULL);
INSERT INTO Characters_in_quests VALUES('n5','Deliver the message',NULL,NULL,NULL,1,NULL,0);
INSERT INTO Characters_in_quests VALUES('n2','Deliver the message',NULL,NULL,NULL,0,0,1);
       
/*Create table Items_owned_by_characters */
CREATE TABLE  Items_owned_by_characters (
        ID_char        VARCHAR(10)     NOT NULL,
        ID_item        VARCHAR(10)     NOT NULL,  
        Place          VARCHAR(10)     NOT NULL,
        Slot           VARCHAR(20)             ,
        Amount         INT             ,
        Start_Time     DATETIME        NOT NULL       ,
        End_Time       DATETIME                           ,
           
         PRIMARY KEY  (ID_char,ID_item),
         
		 CONSTRAINT fk_Items_owned_by_characters
                    FOREIGN KEY (ID_char) REFERENCES Characters(ID_char) ON UPDATE CASCADE ON DELETE CASCADE,
                    FOREIGN KEY (ID_item) REFERENCES Item(ID_item) ON UPDATE CASCADE ON DELETE CASCADE,
			 
                    CONSTRAINT chk_Place CHECK ( Place IN ('drop','shop','invertory','equip','warehouse') ) ,
					CONSTRAINT chk_Slot CHECK ( Slot IN ('main hand','off hand','two-handed','neck','armour','feet','legs','arms','head','potion') ) 

);

/*Insert into Items_owned_by_characters*/
INSERT INTO Items_owned_by_characters VALUES('p5','i1','equip','main hand',NULL,'2015-12-15 13:48:07',NULL);       
INSERT INTO Items_owned_by_characters VALUES('m5','i2','drop','neck',NULL,'2015-12-15 09:08:15','2015-12-15 10:00:01');  
INSERT INTO Items_owned_by_characters VALUES('m4','i3','drop','neck',NULL,'2015-12-15 20:58:44','2015-12-15 21:30:06');
INSERT INTO Items_owned_by_characters VALUES('p1','i3','equip','neck',NULL,'2015-12-15 21:30:06',NULL);
INSERT INTO Items_owned_by_characters VALUES('p5','i2','equip','neck',NULL,'2015-12-15 10:00:01',NULL);  

INSERT INTO Items_owned_by_characters VALUES('p5','i4','equip','off hand',NULL,'2015-12-15 00:11:22',NULL);

INSERT INTO Items_owned_by_characters VALUES('m3','i5','drop','two-handed',NULL,'2015-12-15 12:48:07','2015-12-15 12:53:09');  
INSERT INTO Items_owned_by_characters VALUES('p1','i5','equip','two-handed',NULL,'2015-12-15 12:53:09',NULL);  


INSERT INTO Items_owned_by_characters VALUES('p1','i6','invertory','main hand',NULL,'2015-12-15 04:32:53',NULL);  

INSERT INTO Items_owned_by_characters VALUES('n5','i7','shop','potion',1000,'2015-12-15 10:09:55','2015-12-15 15:22:12');
INSERT INTO Items_owned_by_characters VALUES('p5','i7','equip','potion',1000,'2015-12-15 15:22:12',NULL);




INSERT INTO Items_owned_by_characters VALUES('p5','i8','equip','armour',NULL,'2015-12-15 16:22:12',NULL);
INSERT INTO Items_owned_by_characters VALUES('p1','i9','equip','armour',NULL,'2015-12-15 18:27:26',NULL);

/*
INSERT INTO Items_owned_by_characters VALUES('p5','i9','equip','armour',NULL,'2015-12-15 18:27:6',NULL);
INSERT INTO Items_owned_by_characters VALUES('p5','i6','equip','main hand',NULL,'2015-12-15 04:32:53',NULL);  
INSERT INTO Items_owned_by_characters VALUES('p1','i4','equip','off hand',NULL,'2015-12-15 00:11:22',NULL);
INSERT INTO Items_owned_by_characters VALUES('p1','i4','equip','two-handed',NULL,'2015-12-15 00:11:22',NULL);
INSERT INTO Items_owned_by_characters VALUES('p1','i7','equip','potion',10,'2015-12-15 15:22:12',NULL);




INSERT INTO Item VALUES('i1','Civilian_Sword','Normal', 'Can?t cut anything',1,10,'Sword',1,0,0,5,0,0,0,0,0,0,0);       fighter
INSERT INTO Item VALUES('i4','Round Shield','Basic','A basic shield',1,10,'Shield',1,0,0,0,0,0,0,30,0,0,0);				fighter
INSERT INTO Item VALUES('i10','Simple Dagger','Basic','Simple Dagger',0,NULL,'1H_Weapon',1,0,0,10,0,20,0,0,10,10,0);	rogue
INSERT INTO Item VALUES('i10','Simple Staff','Basic','Simple Staff',0,NULL,'1H_Weapon',1,0,0,10,0,0,0,10,20,10,0);		wizard

INSERT INTO Item VALUES('i7','Small Health Potion','Normal','Restores health',1,5,'Potion',0,1,1,NULL,NULL,0,0,0,0,0,0);	all

INSERT INTO Item VALUES('i8','Heavy Armour','Basic', 'Simple heavy armor.',1,20,'Armour',1,0,0,0,0,50,50,10,20,0,20);	fighter
INSERT INTO Item VALUES('i8','Light Armour','Basic', 'Simple light armor.',1,20,'Armour',1,0,0,0,0,30,30,20,20,0,10);	rogue
INSERT INTO Item VALUES('i8','Robes','Basic', 'Simple robes.',1,20,'Armour',1,0,0,0,0,10,10,10,0,20,10);				wizard
*/





       
       
/*Create table Parties*/
CREATE TABLE  Parties (
         ID_char1       VARCHAR(10)    NOT NULL,
         ID_char2       VARCHAR(10)    NOT NULL,
         Name_Party     VARCHAR(10)    NOT NULL,  
         Leader         BIT   		   NOT NULL DEFAULT 0,
         Start_Time     DATETIME       NOT NULL       ,
         End_Time       DATETIME                          ,
           
         PRIMARY KEY  (ID_char1,ID_char2),
         
		 CONSTRAINT fk_Parties
                    FOREIGN KEY (ID_char1) REFERENCES Characters(ID_char) ON UPDATE CASCADE ON DELETE CASCADE,
                    FOREIGN KEY (ID_char2) REFERENCES Characters(ID_char) ON UPDATE CASCADE ON DELETE CASCADE

);

/*Insert into Parties*/
INSERT INTO Parties VALUES  ('p1', 'p2', 'party1',0,'2015-12-15 22:30:06',NULL);
INSERT INTO Parties VALUES  ('p3', 'p5', 'party2',1,'2015-12-15 20:02:47','2015-12-15 23:14:12');

       
/*Create table PCs_in_guilds*/
CREATE TABLE  PCs_in_guilds (
         ID_char        VARCHAR(10)    NOT NULL,
         Name_Guild     VARCHAR(20)    NOT NULL,  
         Rankk          VARCHAR(20)    NOT NULL, 
         Invite         BIT,
         Kick           BIT,
         Use_Guild_Bank BIT,
         Start_Time     DATETIME           NOT NULL       ,
         End_Time       DATETIME                          ,
         
           
         PRIMARY KEY  (ID_char,Name_Guild),
         
        CONSTRAINT fk_PCS_in_quild 
            FOREIGN KEY (ID_char) REFERENCES Characters(ID_char) ON UPDATE CASCADE ON DELETE CASCADE ,
            FOREIGN KEY (Name_Guild) REFERENCES Guild(Name_Guild) ON UPDATE CASCADE ON DELETE CASCADE 
       );

/*Insert into PCs_in_guilds*/
INSERT INTO PCs_in_guilds VALUES  ('p1', 'The slayers', 'General',1,1,1,'2015-12-15 15:35:35',NULL);
INSERT INTO PCs_in_guilds VALUES  ('p2', 'The slayers', 'Member',0,0,0,'2015-12-22 20:35:35','2015-12-23 21:25:55');
INSERT INTO PCs_in_guilds VALUES  ('p3', 'Warriors', 'Memeber',0,0,0,'2015-12-22 21:35:35',NULL);
INSERT INTO PCs_in_guilds VALUES  ('p4', 'Warriors', 'Officer',1,0,0,'2015-12-22 22:35:35',NULL);
INSERT INTO PCs_in_guilds VALUES  ('p5', 'Armory', 'Member',0,0,0,'2015-12-29 20:35:35','2015-12-30 20:56:59');
INSERT INTO PCs_in_guilds VALUES  ('p2', 'Armory', 'Officer',1,0,0,'2015-12-24 22:35:35',NULL);









