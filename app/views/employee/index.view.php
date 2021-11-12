<?php $this->view("layout/header", $data) ?>

    <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">

        <?php foreach ($data["employees"] as $employee) { ?>
            <?php echo $employee["id"]; ?> -
            <?php echo $employee["login"]; ?> -
            <?php echo $employee["email"]; ?> -
            <?php echo $employee["name"], " ", $employee["surname"]; ?> -
            <?php echo $employee["type"]; ?>
            <div class="right">
                <a href="<?= ROOT ?>employeesController/details/<?php echo $employee['id']; ?>" class="btn btn-info">Szczegóły</a>
                <!-- <a class="btn btn-danger" onclick='javascript:confirmationDelete($(this));return false;' href=" --><?//= ROOT ?><!--employeesController/delete/--><?php //echo $employee['id']; ?><!--">Usuń</a>-->
                <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal" href="">Usuń</a>
            </div>
            <hr/>
        <?php } ?>
    </section>


<?php $this->view("layout/footer", $data) ?>