/*Roles*/

/*Umbra System*/
CREATE USER 'umbra_system'@'localhost' IDENTIFIED BY 'system';
GRANT SELECT,INSERT,UPDATE,DELETE ON umbra.* TO 'umbra_system'@'localhost';

/*Player*/
CREATE USER 'player'@'localhost' IDENTIFIED BY 'player';
GRANT SELECT ON umbra.* TO 'player'@'localhost';

/*Moderator*/
CREATE USER 'moderator'@'localhost' IDENTIFIED BY 'moderator';
GRANT SELECT ON umbra.* TO 'moderator'@'localhost';
GRANT INSERT ON umbra.Monster TO 'moderator'@'localhost';
GRANT INSERT ON umbra.NPC TO 'moderator'@'localhost';
GRANT DELETE ON umbra.User_Account TO 'moderator'@'localhost';
GRANT DELETE ON umbra.Monster TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.User_Account TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.PC TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.Monster TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.NPC TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.Item TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.Guild TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.Alliance TO 'moderator'@'localhost';
GRANT UPDATE ON umbra.Items_owned_by_characters TO 'moderator'@'localhost';

/*Developer*/
CREATE USER 'developer'@'localhost' IDENTIFIED BY 'developer';
GRANT SELECT ON umbra.User_Account TO 'developer'@'localhost';
GRANT SELECT ON umbra.Monster TO 'developer'@'localhost';
GRANT SELECT ON umbra.NPC TO 'developer'@'localhost';
GRANT SELECT ON umbra.Quest TO 'developer'@'localhost';
GRANT SELECT ON umbra.Characters_in_quests TO 'developer'@'localhost';
GRANT INSERT ON umbra.Monster TO 'developer'@'localhost';
GRANT INSERT ON umbra.NPC TO 'developer'@'localhost';
GRANT INSERT ON umbra.Quest TO 'developer'@'localhost';
GRANT INSERT ON umbra.Characters_in_quests TO 'developer'@'localhost';
GRANT UPDATE ON umbra.Monster TO 'developer'@'localhost';
GRANT UPDATE ON umbra.NPC TO 'developer'@'localhost';
GRANT UPDATE ON umbra.Quest TO 'developer'@'localhost';
GRANT UPDATE ON umbra.Characters_in_quests TO 'developer'@'localhost';
GRANT DELETE ON umbra.Monster TO 'developer'@'localhost';
GRANT DELETE ON umbra.NPC TO 'developer'@'localhost';
GRANT DELETE ON umbra.Quest TO 'developer'@'localhost';
GRANT DELETE ON umbra.Characters_in_quests TO 'developer'@'localhost';



