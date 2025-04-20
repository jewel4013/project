<?php
class VehicleManager extends VehicleBase implements VehicleAction{
    use FileHandler;

    public $file;

    public function __construct(){
        $this->file = __DIR__.'/../../data/vehicles.json';
    }

    public function addVehicle($data){
        $vehicles =  $this->getVehicles();
        $data['id'] = uniqid();
        $vehicles[] = $data;
        return $this->writeJSON($this->file, $vehicles);

    }
    public function editVehicle($id, $data){
        $vehicles =  $this->getVehicles();
        foreach($vehicles as $key => $vehicle){
            if($vehicle['id'] == $id){
                $vehicles[$key] = array_merge($vehicle, $data);
                break;
            } 
        }
        return $this->writeJSON($this->file, $vehicles);
    }
    public function deleteVehicle($id){
        $vehicles =  $this->getVehicles();
        foreach($vehicles as $key => $vehicle){
            if($vehicle['id'] == $id){
                unset($vehicles[$key]);
                break;
            } 
        }
        return $this->writeJSON($this->file, $vehicles);
    }
    public function getVehicles(){
        return $this->readJSON($this->file);
    }
    public function getDetail(){
        return[
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image,
        ];

    }
}
?>