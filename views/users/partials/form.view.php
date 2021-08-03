<form method="<?= $vars['method'] ?>" action="/user/store">
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="first_name" placeholder="Voornaam">
            </div>

            <div class="col-md-6">
                <input type="text" name="last_name" placeholder="Achternaam">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="email" name="email" placeholder="E-mail">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="city" placeholder="Woonplaats">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <select name="role">
                    <option value="0">Kies een rol...</option>
                    <?php foreach($vars['roles'] as $role) : ?>
                        <option value="<?= $role->id ?>"><?= $role->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Geboortedatum</label><br/>
                <input type="date" name="birthday">
            </div>
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>