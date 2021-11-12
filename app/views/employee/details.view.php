<?php $this->view("layout/header", $data) ?>

<div class="col-lg-5 mr-auto">
    <form action="<?= ROOT ?>employeesController/update" method="post">
        <h3>Użytkownik - szczegóły</h3>
        <hr/>
        <input type="hidden" name="id" value="<?php echo $data["employee"]->id ?>"/>
        Imię: <input type="text" name="name" value="<?php echo $data["employee"]->name ?>" class="form-control"/>
        Nazwisko: <input type="text" name="surname" value="<?php echo $data['employee']->surname ?>"
                         class="form-control"/>
        Email: <input type="text" name="email" value="<?php echo $data['employee']->email ?>" class="form-control"/>
        Telefon: <input type="text" name="phone" value="<?php echo $data['employee']->phone ?>" class="form-control"/>
        <input type="submit" value="Zapisz" class="btn btn-success"/>
    </form>
    <a href="<?= ROOT ?>employeesController/index" class="btn btn-info">Wstecz</a>
<!--    <a class="btn btn-danger" onclick='javascript:confirmationDelete($(this));return false;' href="--><?//= ROOT ?><!--employeesController/delete/--><?php //echo $data["employee"]->id; ?><!--">Usuń</a>-->
    <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal" href="<?= ROOT ?>employeesController/delete/<?php echo $data["employee"]->id; ?>">Usuń</a>
</div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Czy na pewno chcesz usunąć pracownika?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<!--                <div class="modal-body">-->
<!--                    -->
<!--                </div>-->
                <div class="modal-footer">
                    <a class="btn btn-primary"  href="<?= ROOT ?>employeesController/delete/<?php echo $data["employee"]->id; ?>">Tak</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Nie</button>
                </div>
            </div>
        </div>
    </div>




<?php $this->view("layout/footer", $data) ?>