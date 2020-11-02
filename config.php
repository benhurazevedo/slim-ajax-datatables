<?php

use \Slim\App;

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
		,'DSN' => 'sqlsrv:SERVER=DESKTOP-P9F53OF;DATABASE=gerenciador_contas'
		,'DATABASE_USER' => 'sa'
		,'DB_PASSWORD' => 'Bqnepc40'
    ]
]);
?>