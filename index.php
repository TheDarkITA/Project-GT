<?php
/*
 *---------------------------------------------------------------
 * CONFIG
 *---------------------------------------------------------------
 *
 * Configurazione core
 */
define('ENVIRONMENT', 'development');

/*
 *---------------------------------------------------------------
 * MANAGE ERROR
 *---------------------------------------------------------------
 *
 * Gestisce la visualizzazione degli errori
 */
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		default:
			error_reporting(0);
		break;
	}
}

/*
 *---------------------------------------------------------------
 * MANAGE PHP CONFIGURATION
 *---------------------------------------------------------------
 *
 * Gestisce la visualizzazione degli errori
 */
if(function_exists('set_magic_quotes_runtime'))
{
	@set_magic_quotes_runtime(0); // Magic quotes OFF
}

/*
 *---------------------------------------------------------------
 * COSTANTS
 *---------------------------------------------------------------
 *
 * Costanti
 */
define('BASEPATH', 'system/');

/*
 *---------------------------------------------------------------
 * Start
 *---------------------------------------------------------------
 *
 * Avvia l'esecuzione
 */
include(BASEPATH.'core.php');
?>
