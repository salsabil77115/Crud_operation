<?php
session_start();
require_once './miniRouter-master/miniRouter.php';
include_once './dbstalker-master/core/stalker_configuration.core.php';
include_once './dbstalker-master/core/stalker_registerar.core.php';
include_once './dbstalker-master/core/stalker_schema.core.php';
include_once './dbstalker-master/core/stalker_validator.core.php';
include_once './dbstalker-master/core/stalker_database.core.php';
include_once './dbstalker-master/core/stalker_information_schema.core.php';
include_once './dbstalker-master/core/stalker_query.core.php';
include_once './dbstalker-master/core/stalker_migrator.core.php';
include_once './dbstalker-master/core/stalker_backup.core.php';
include_once './dbstalker-master/core/stalker_table.core.php';
include_once './dbstalker-master/core/stalker_seed.core.php';
include_once './dbstalker-master/core/stalker_seeder.core.php';
include_once './dbstalker-master/core/stalker_view.core.php';

foreach (glob("./dbstalker-master/tables/*.table.php") as $file) {
    require_once $file;
}

Stalker_Registerar::auto_register();
if (Stalker_Migrator::need_migration()) {
    Stalker_Migrator::migrate();
}

$dbcon = Stalker_Database::instance();
include_once 'classes/Crud.php';
$router = new miniRouter();

$router->group("/crud_operation", function ($router) use ($dbcon) {

    $router->get('/', function () {
        include 'homepage.php';
    });

    $router->group('/api', function ($router) use ($dbcon) {
        $router->post('/create', [
            new Crud($dbcon),
            'Create'
        ]);
        $router->put('/update', [
            new Crud($dbcon),
            'Update'
        ]);
        $router->delete('/delete', [
            new Crud($dbcon),
            'Delete'
        ]);
    });
});

$router->fallback(function () {
    echo "Page Not Found";
});

$router->start_routing();

?>