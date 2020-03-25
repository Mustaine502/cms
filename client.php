<?php
require_once ('heliocms/core.php');
if (isset($_SESSION['id'])) {
if (isset($_GET['hash'])) {
$client_a = mysqli_query($link, "SELECT * FROM heliocms_hotel");
$client_q = mysqli_fetch_assoc($client_a);
mysqli_query($link, "UPDATE users SET auth_ticket = '', auth_ticket = '".GenerateTicket()."', ip_last = '', ip_last = '".$ip."' WHERE id = '".$user_q['id']."'");
$ticketsql = mysqli_query($link, "SELECT * FROM users WHERE id = '".$user_q['id']."'");
$ticketrow = mysqli_fetch_assoc($ticketsql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="<?php echo $aka; ?>/habbo-web/america/pt/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $aka; ?>/game-data-server-static//./hotel.css">
    <script type="text/javascript" src="<?php echo $aka; ?>/game-data-server-static//./habboapi.js"></script>
</head>
 
<script type="text/javascript">
    var flashvars = {
        "external.texts.txt": "<?php echo $client_q['external_flash_texts']; ?>",
        "connection.info.port": "<?php echo $client_q['port']; ?>",
        "furnidata.load.url": "<?php echo $client_q['furnidata']; ?>",
        "external.variables.txt": "<?php echo $client_q['external_variables']; ?>",
        "client.allow.cross.domain": "1",
        "url.prefix": "<?php echo $site; ?>",
        "external.override.texts.txt": "<?php echo $client_q['external_flash_override_texts']; ?>",
        "supersonic_custom_css": "<?php echo $aka; ?>\/game-data-server-static\/\/.\/hotel.css",
        "external.figurepartlist.txt": "<?php echo $client_q['figuredata']; ?>",
        "flash.client.origin": "popup",
        "client.starting": "¡Por favor espera! O <?php echo $sitename; ?> se está cargando...",
        "processlog.enabled": "1",
        "has.identity": "1",
        "productdata.load.url": "<?php echo $client_q['productdata']; ?>",
        "client.starting.revolving": "¿Te apetecen salchipapas con qué?\/Cargando el universo de pixeles.\/¡¿Todavía estamos aquí?!\/Sigue al pato amarillo.\/Shhh! Estoy intentando pensar.\/No eres tú, soy yo.\/Para ciencia, ¡Tú, monstruito!\/Mira a la izquierda. Mira a la derecha. Parpadea dos veces. ¡Ta-chán!\/El tiempo es sólo una ilusión.\/Cargando mensajes divertidos... Por favor, espera.\/Me gusta tu camiseta.",
        "external.override.variables.txt": "<?php echo $client_q['external_override_variables']; ?>",
        "spaweb": "1",
        "supersonic_application_key": "2c63c535",
        "connection.info.host": "<?php echo $client_q['host']; ?>",
        "sso.ticket": "<?php echo $ticketrow['auth_ticket']; ?>",
        "client.notify.cross.domain": "0",
        "account_id": "<?php echo $user_q['id']; ?>",
        "flash.client.url": "<?php echo $client_q['base']; ?>",
        "unique_habbo_id": "<?php echo $w; ?>",
    };
	</script>
	<script>
    var params = {
    "base": "<?php echo $client_q['base']; ?>",
    "allowScriptAccess": "always",
    "menu": "false",
    "wmode": "opaque"
    };
    swfobject.embedSWF('<?php echo $client_q['habbo_swf']; ?>', 'flash-container', '100%', '100%', '11.1.0', '//habboo-a.akamaihd.net/habboweb/63_1d5d8853040f30be0cc82355679bba7c/3630/web-gallery/flash/expressInstall.swf', flashvars, params, null, null);
    if (!(HabbletLoader.needsFlashKbWorkaround())) {
    params["wmode"] = "opaque";
    }
    FlashExternalInterface.signoutUrl = "<?php echo $site; ?>/logout";
    </script>
<body id="client" class="flashclient">
 
 
<div id="overlay"></div>
<div id="client-ui" >
    <div id="flash-wrapper">
    <div id="flash-container">
    <div ng-if="isOpen &amp;&amp; !flashEnabled" class="client-error">
    <div class="client-error__text">
        <h1 class="client-error__title" translate="CLIENT_ERROR_TITLE">Ops, sem Flash, sem <?php echo $sitename; ?>!</h1>
        <p translate="CLIENT_ERROR_FLASH">Se você está utilizando um PC, você precisa <a href="http://www.adobe.com/go/getflashplayer" target="_blank">atualizar ou instalar o Flash player</a>.</p>
        <div class="client-error__downloads">
            <a href="http://www.adobe.com/go/getflashplayer" ng-href="http://www.adobe.com/go/getflashplayer" target="_blank" class="client-error__flash"></a>
        </div>
        <p translate="CLIENT_ERROR_MOBILE">Se você está utilizando um iPad, iPhone ou um dispositivo Android você deve baixar o <a href="https://itunes.apple.com/app/id794866182" target="_blank"><?php echo $sitename; ?> para iOS</a> na App Store ou <a href="https://play.google.com/store/apps/details?id=air.com.sulake.habboair" target="_blank"><?php echo $sitename; ?> para Android</a> na Google PlayStore.</p>
        <div class="client-error__downloads">
            <a href="https://itunes.apple.com/app/id794866182" ng-href="https://itunes.apple.com/app/id794866182" target="_blank" class="client-error__appstore"></a>
            <a href="https://play.google.com/store/apps/details?id=air.com.sulake.habboair" ng-href="https://play.google.com/store/apps/details?id=air.com.sulake.habboair" target="_blank" class="client-error__googleplay"></a>
        </div>
    </div>
</div>
    </div>
    </div>
</div>
 
</body>
</html>
<?php }} ?>