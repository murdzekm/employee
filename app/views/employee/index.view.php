<?php $this->view("layout/header", $data) ?>

    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pracownicy
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center display " id="myTable" >
                <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Rodzaj</th>
                    <th>Akcja</th>
                </tr>
                </thead>
<!--                <tfoot>-->
<!--                <tr>-->
<!--                    <th>Imię</th>-->
<!--                    <th>Nazwisko</th>-->
<!--                    <th>Login</th>-->
<!--                    <th>Email</th>-->
<!--                    <th>Rodzaj</th>-->
<!--                    <th>Akcja</th>-->
<!--                </tr>-->
<!--                </tfoot>-->
                <tbody>
                <?php foreach ($data["employees"] as $employee) { ?>
                    <tr">
                        <td><?php echo $employee["name"] ?></td>
                        <td><?php echo $employee["surname"] ?></td>
                        <td><?php echo $employee["login"] ?></td>
                        <td><?php echo $employee["email"] ?></td>
                        <td><?php echo $employee["type"] ?></td>
                        <td>
                            <a href="<?= ROOT ?>employeesController/details/<?php echo $employee['id']; ?>"
                               class="btn btn-info">Szczegóły</a>
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal"
                               href="">Usuń</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                "order": [[0, "asc"]],
                "language": {
                    "processing": "Przetwarzanie...",
                    "search": "Szukaj:  ",
                    "lengthMenu": "Pokaż _MENU_ pozycji",
                    "info": "Pozycje od _START_ do _END_ z _TOTAL_",
                    "infoEmpty": "Pozycji 0 z 0 dostępnych",
                    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                    "loadingRecords": "Wczytywanie...",
                    "zeroRecords": "Nie znaleziono ",
                    "paginate": {
                        "first": "Pierwsza",
                        "previous": "Poprzednia",
                        "next": "Następna",
                        "last": "Ostatnia"
                    },
                }
            });
        });
    </script>

<?php $this->view("layout/footer", $data) ?>