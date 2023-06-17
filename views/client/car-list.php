<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="flex">
            <a href="" class="btn green radius-xl ml-auto mb-8" style="background-color: #016064;" data-toggle="modal" data-target="#add-car"><span>ADD CAR</span></a>&nbsp;
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Plate Number</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Brand</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Model</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Vehicle type</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Fuel Type</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Color</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Transmission Type</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (DBConn::select('cars', '*', ['user_id' =>                 $_SESSION['client_auth']]) as $car) { ?>
                                <tr>
                                    <td><?= $car['plate_no'] ?></td>
                                    <td><?= $car['car_brand'] ?></td>
                                    <td><?= $car['car_model'] ?></td>
                                    <td><?= $car['car_type'] ?></td>
                                    <td><?= $car['fuel_type'] ?></td>
                                    <td><?= $car['color'] ?></td>
                                    <td><?= $car['trans_type'] ?></td>
                                    <td><?= date('M d, Y', strtotime($car['created_at'])) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="add-car" class="modal fade" role="dialog">
    <form id="add-car-form" class="edit-profile m-b30">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;ADD CAR</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="hidden" name="user_id" id="user-id" value="<?= $_SESSION['client_auth'] ?>">
                            <div class="mb-1">
                                <label for="plateNumber"><span class="text-danger"></span></label>
                                <input type="text" name="plateNumber" id="plateNumber" maxlength="8" class="form-control plateNumber" placeholder="Plate Number" required>
                                <span class="msgPlateNumber" style="color: red;"></span>
                            </div>

                            <div class="mb-1">
                                <label for="brand"><span class="text-danger"></span></label>
                                <input type="text" name="brand" id="brand" class="form-control" placeholder="Enter Car Brand" required>
                            </div>

                            <div class="mb-1">
                                <label for="carmodel"><span class="text-danger"></span></label>
                                <input type="text" name="carModel" id="carmodel" class="form-control" placeholder="Enter Car Model" required>
                            </div>

                            <div class="mb-1">
                                <label for="cartype"><span class="text-danger"></span></label>
                                <select type="text" name="carType" id="cartype" class="form-control" placeholder="Type of car" required>
                                    <option value="" selected hidden>-- Select car type --</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="fueltype"><span class="text-danger"></span></label>
                                <select type="text" name="fuelType" id="fueltype" class="form-control" placeholder="Fuel type" required>
                                    <option value="" selected hidden>-- Select fuel type --</option>
                                    <option value="Gas">Gas</option>
                                    <option value="Diesel">Diesel</option>
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="carcolor"><span class="text-danger"></span></label>
                                <input type="text" name="carColor" id="carcolor" class="form-control" placeholder="Color of vehicle" required>
                            </div>

                            <div class="mb-4">
                                <label for="transtype"><span class="text-danger"></span></label>
                                <input type="text" name="transType" id="transtype" class="form-control" placeholder="Transmission Type" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="add_car" value="Add Car">
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('#add-car-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=add_car',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 'success') {
                        alert(resp.msg);
                        window.location.reload(true);
                    } else {
                        alert(resp.msg);
                    }
                }
            });
        });
    });
</script>