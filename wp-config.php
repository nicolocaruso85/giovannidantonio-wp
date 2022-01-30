<?php

/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'giovannidantonio');

/** Nome utente del database MySQL */
define('DB_USER', 'giovannidantonio');

/** Password del database MySQL */
define('DB_PASSWORD', 'A$9GzA_`XZP~DHc}');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'syuzGpP`Mu|R!2*:I&C?m0K5N&aTqdi?[2fOh@HK/L9:v5PY4OV,#8P_7!`U#l?8');
define('SECURE_AUTH_KEY',  'ilb-ymm|.QUa)}G/xxP!pN7$C$/WE?yL>I49gl%fu0aW8zCV8Oi=^mCTTz)esGNn');
define('LOGGED_IN_KEY',    'ec?vNk{C^)nYJ&nO1>([Y%*1<6hY}ld.5c. -W1X5p!V@3Jv/2Rx>m62P|SbFiBT');
define('NONCE_KEY',        'R6Huy]i-vlPO)ch0]n,{f46i/&L6Qt0sX[cyMZAd/8_?{I=qN^?78c!zMMT((8d1');
define('AUTH_SALT',        '26+epoWO.E/+Fi+e@qFTt>Gi$PV>qa7m4e~#3$|TK%b#1d^#{4@Xblf~yAXN;Dx(');
define('SECURE_AUTH_SALT', 'zR^c>fePYsI(sCC}Z:72v}EJ.KtrJV1z=bH]$h}HwTBL6I+&|qmqNm!L]]75t^zv');
define('LOGGED_IN_SALT',   '>|Z,SfM^ykb8yk8zngq>RKjZVjzF)j3i&D]Uo-;NGKqG^@6Jc1:OIK!]:*}WmVh}');
define('NONCE_SALT',       'd#Hh((!Lx1:y|&X]s^[Fc,X_jRKYj_5-Dkxu~`YOcza0.rp+pJG[4A3{/L=S}^ {');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 */
define('WPLANG', 'it_IT');

/**
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
function wp_mail() {}
