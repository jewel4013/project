<?php
require_once __DIR__ . '/../app/classes/FileHandler.php';
require_once __DIR__ . '/../app/classes/vehicleAction.php';
require_once __DIR__ . '/../app/classes/vehicleBase.php';
require_once __DIR__ . '/../app/classes/vehicleManager.php';

$vehicleManage = new VehicleManager();
$vehicles = $vehicleManage->getVehicles();

include 'views/header.php';
?>


<div class="container my-5">
    <div class="row">
        <?php foreach ($vehicles as $vehicle): ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $vehicle['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $vehicle['name'] ?></h5>
                        <p class="card-text">
                            <strong>
                                <span><?php echo $vehicle['type'] ?></span>
                            </strong>
                            <br/>
                            <strong>
                                <span>$<?php echo number_format($vehicle['price'], 2) ?></span>
                            </strong>
                        </p>
                        <a href="views/edit.php?id=<?php echo $vehicle['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="views/delete.php?id=<?php echo $vehicle['id'] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>