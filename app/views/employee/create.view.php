<?php $this->view("layout/header", $data) ?>

    <form action="<?= ROOT ?>employeesController/create" method="post" class="mt-3 needs-validation" novalidate>
        <h3>Dodaj użytkownika</h3>
        <hr/>
<!--        Login: <input type="text" name="login"  class="form-control"/>-->
<!--        Hasło: <input type="password" name="password" class="form-control"/>-->
<!--        Powtórz hasło: <input type="password" name="passwordRepeat" class="form-control"/>-->
<!--        Email: <input type="text" name="email"  class="form-control"/>-->
<!--        Imię: <input type="text" name="name" class="form-control"/>-->
<!--        Nazwisko: <input type="text" name="surname" class="form-control"/>-->
<!--        Rodzaj: <input type="text" name="type" class="form-control"/>-->
<!--        <input type="submit" value="Zapisz" class="btn btn-success"/>-->
<!--    </form>-->

<!--    <form class="needs-validation" novalidate>-->

        <p class="text-danger fw-bold"><?php checkMessage() ?></p>
<!--        --><?php //show($data); ?>
<!--        --><?php //echo $_SESSION['error'] ?>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Login</label>
                <input type="text" name="login" class="form-control" id="validationCustom01" value="<?php echo $data['login'] ?>" placeholder="Login" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Hasło</label>
                <input type="password" name="password" class="form-control" id="validationCustom02" placeholder="Hasło" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Powtórz hasło</label>
                <input type="password" name="passwordRepeat" class="form-control" id="validationCustom02" placeholder="Powtórz hasło" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Email</label>
                <input type="text" name="email" class="form-control" id="validationCustom02" value="<?php echo $data['email'] ?>" placeholder="Email" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Imię</label>
                <input type="text" name="name" class="form-control" id="validationCustom02" value="<?php echo $data['name'] ?>" placeholder="Imię" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Nazwisko</label>
                <input type="text" name="surname" class="form-control" id="validationCustom02" value="<?php echo $data['surname'] ?>" placeholder="Nazwisko" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Rodzaj</label>
                <input type="text" name="type" class="form-control" id="validationCustom02" value="<?php echo $data['type'] ?>" placeholder="Rodzaj" required>
                <div class="invalid-feedback">
                    Pole wymagane.
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb-4" type="submit">Zapisz</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

<?php $this->view("layout/footer", $data) ?>