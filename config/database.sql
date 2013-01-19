-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `sis_verein` varchar(64) NOT NULL default '',
  `sis_liga` varchar(64) NOT NULL default '',
  `sis_art` varchar(255) NOT NULL default '',
  `sis_ligaspiele` varchar(1) NOT NULL default ''  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

