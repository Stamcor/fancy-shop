<?php
/**
 * These are the database login details
 * TODO: add protection against unauthorized access of this file!
 */
define("HOST", "localhost" ); 			// The host you want to connect to. 
define("USER", "shop"); 				    // The database username. 
define("PASSWORD", "FancyShop"); 		// The database password. 
define("DATABASE", "shop");         // The database name.

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/**
 * Is this a secure connection?  The default is FALSE, but the use of a
 * HTTPS connection for logging in is recommended.
 * 
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", FALSE);    // For development purposes only!!!!

