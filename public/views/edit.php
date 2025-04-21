<?php
require_once __DIR__ . '/../../app/classes/FileHandler.php';
require_once __DIR__ . '/../../app/classes/vehicleAction.php';
require_once __DIR__ . '/../../app/classes/vehicleBase.php';
require_once __DIR__ . '/../../app/classes/vehicleManager.php';

$vehicleManage = new VehicleManager();
$id = $_GET['id'] ?? null;
$vehicles = $vehicleManage->getVehicles();


$selectedVehicle = null;

foreach($vehicles as $vehicle){
    if($vehicle['id'] == $id){
        $selectedVehicle = $vehicle;
        break;
    } 
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];
    $vehicleManage->editVehicle($id, $data);
    header('Location: ../index.php');
}


include 'header.php';
?>


<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo $vehicle['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type"
                        value="<?php echo $vehicle['type'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="<?php echo $vehicle['price'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" name="image"
                        value="<?php echo $vehicle['image'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>