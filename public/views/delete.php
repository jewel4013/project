<?php
require_once __DIR__ . '/../../app/classes/FileHandler.php';
require_once __DIR__ . '/../../app/classes/vehicleAction.php';
require_once __DIR__ . '/../../app/classes/vehicleBase.php';
require_once __DIR__ . '/../../app/classes/vehicleManager.php';

$vehicleManage = new VehicleManager();
$id = $_GET['id'] ?? null;

$vehicleManage->deleteVehicle($id);
header('Location: ../index.php');


exit;