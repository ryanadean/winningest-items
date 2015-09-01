-- --------------------------------------------------------
-- Host:                         108.161.135.24
-- Server version:               5.5.40-0ubuntu0.14.04.1-log - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for winningest_sets
CREATE DATABASE IF NOT EXISTS `winningest_sets` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `winningest_sets`;


-- Dumping structure for table winningest_sets.cached_data
CREATE TABLE IF NOT EXISTS `cached_data` (
  `type` varchar(20) CHARACTER SET latin1 NOT NULL,
  `conditionals` varchar(512) CHARACTER SET latin1 NOT NULL,
  `value` text CHARACTER SET latin1 NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`type`,`conditionals`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.champion
CREATE TABLE IF NOT EXISTS `champion` (
  `champion_id` int(11) NOT NULL,
  `champion_name` varchar(20) NOT NULL,
  PRIMARY KEY (`champion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.cogtest
CREATE TABLE IF NOT EXISTS `cogtest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verify_key` varchar(12) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `verified_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cogtest_1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.match
CREATE TABLE IF NOT EXISTS `match` (
  `id` int(11) NOT NULL,
  `created_on` mediumtext,
  `duration` mediumtext,
  `version` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.match_event
CREATE TABLE IF NOT EXISTS `match_event` (
  `match_id` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,
  `event_type` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `timestamp` int(11) NOT NULL,
  `building_type` varchar(45) DEFAULT NULL,
  `tower_type` varchar(45) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `monster_type` varchar(45) NOT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `killer_id` int(11) DEFAULT NULL,
  `victim_id` int(11) DEFAULT NULL,
  `assist_id1` int(11) DEFAULT NULL,
  `assist_id2` int(11) DEFAULT NULL,
  `assist_id3` int(11) DEFAULT NULL,
  `assist_id4` int(11) DEFAULT NULL,
  `ward_type` varchar(15) DEFAULT NULL,
  `skill_slot` int(11) DEFAULT NULL,
  `item_slot` int(11) DEFAULT NULL,
  `levelup_type` varchar(15) DEFAULT NULL,
  `item_before` int(11) DEFAULT NULL,
  `item_after` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`match_id`,`assigned_id`,`timestamp`),
  KEY `fk_match_event_1_idx` (`match_id`),
  KEY `fk_match_event_3_idx` (`team_id`),
  KEY `building_type` (`building_type`),
  KEY `match_id` (`match_id`),
  KEY `event_type` (`event_type`),
  KEY `monster_type` (`monster_type`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.match_frame
CREATE TABLE IF NOT EXISTS `match_frame` (
  `assigned_id` int(11) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  `current_gold` int(11) DEFAULT NULL,
  `total_gold` int(11) DEFAULT NULL,
  `minions_killed` int(11) DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `timestamp` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`,`assigned_id`,`timestamp`),
  KEY `fk_match_frame_1_idx` (`assigned_id`),
  KEY `fk_match_frame_2_idx` (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.match_participant
CREATE TABLE IF NOT EXISTS `match_participant` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `champion_id` int(11) DEFAULT NULL,
  `summoner_1` int(11) DEFAULT NULL,
  `summoner_2` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `assigned_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`player_id`),
  KEY `fk_match_participant_1_idx` (`player_id`),
  KEY `fk_match_participant_3_idx` (`team_id`),
  KEY `fk_match_participant_2_idx` (`assigned_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.match_team
CREATE TABLE IF NOT EXISTS `match_team` (
  `team_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `barons` int(11) DEFAULT NULL,
  `dragons` int(11) DEFAULT NULL,
  `first_baron` tinyint(1) DEFAULT NULL,
  `first_blood` tinyint(1) DEFAULT NULL,
  `first_dragon` tinyint(1) DEFAULT NULL,
  `first_tower` tinyint(1) DEFAULT NULL,
  `inhib_kills` int(11) DEFAULT NULL,
  `tower_kills` int(11) DEFAULT NULL,
  `winner` varchar(45) DEFAULT NULL,
  `first_inhib` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`team_id`,`match_id`),
  KEY `fk_match_team_1_idx` (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.participant_stats
CREATE TABLE IF NOT EXISTS `participant_stats` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `assists` int(11) DEFAULT NULL,
  `champion_level` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `doubles` int(11) DEFAULT NULL,
  `firstblood_assist` tinyint(1) DEFAULT NULL,
  `firstblood_kill` tinyint(1) DEFAULT NULL,
  `firstinhib_assist` tinyint(1) DEFAULT NULL,
  `firstinhib_kill` tinyint(1) DEFAULT NULL,
  `firsttower_assist` tinyint(1) DEFAULT NULL,
  `firsttower_kill` tinyint(1) DEFAULT NULL,
  `gold` int(11) DEFAULT NULL,
  `gold_spent` int(11) DEFAULT NULL,
  `inhib_kills` int(11) DEFAULT NULL,
  `item0` int(11) DEFAULT NULL,
  `item1` int(11) DEFAULT NULL,
  `item2` int(11) DEFAULT NULL,
  `item3` int(11) DEFAULT NULL,
  `item4` int(11) DEFAULT NULL,
  `item5` int(11) DEFAULT NULL,
  `item6` int(11) DEFAULT NULL,
  `killing_sprees` int(11) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL,
  `minions_killed` int(11) DEFAULT NULL,
  `jungle_minions_killed` int(11) DEFAULT NULL,
  `enemy_jungle_minions_killed` int(11) DEFAULT NULL,
  `team_jungle_minions_killed` int(11) DEFAULT NULL,
  `pentas` int(11) DEFAULT NULL,
  `quadras` int(11) DEFAULT NULL,
  `sight_wards_purchased` int(11) DEFAULT NULL,
  `damage_dealt` mediumtext,
  `champion_damage_dealt` mediumtext,
  `damage_taken` mediumtext,
  `damage_healed` mediumtext,
  `cc_dealt` mediumtext,
  `tower_kills` int(11) DEFAULT NULL,
  `vision_wards_purchased` int(11) DEFAULT NULL,
  `wards_killed` int(11) DEFAULT NULL,
  `wards_placed` int(11) DEFAULT NULL,
  `winner` tinyint(1) DEFAULT NULL,
  `lane` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.participant_timeline_meta
CREATE TABLE IF NOT EXISTS `participant_timeline_meta` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `data_type` varchar(45) NOT NULL,
  `zero_ten` mediumtext,
  `ten_twenty` mediumtext,
  `twenty_thirty` mediumtext,
  `thirty_end` mediumtext,
  PRIMARY KEY (`id`,`player_id`,`data_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.player
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL,
  `region` varchar(4) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `rank` varchar(15) DEFAULT NULL,
  `division` varchar(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `verified_ip` int(11) DEFAULT NULL,
  `verify_key` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`,`region`),
  KEY `fk_player_1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tag` varchar(8) DEFAULT NULL,
  `rank` varchar(15) DEFAULT NULL,
  `division` varchar(2) DEFAULT NULL,
  `captain_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_team_1_idx` (`captain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.teammember
CREATE TABLE IF NOT EXISTS `teammember` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `invited_on` datetime DEFAULT NULL,
  `joined_on` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teammember_1_idx` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `verified_ip` int(11) DEFAULT NULL,
  `verify_key` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table winningest_sets.vision
CREATE TABLE IF NOT EXISTS `vision` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verify_key` varchar(45) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `verified_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vision_1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
