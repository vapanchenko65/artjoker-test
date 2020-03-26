<h1>Регистрация</h1>

<form id='register' action="" method="post" name="registerform">
    <div>
        <label>ФИО:<br>
            <input id="u_name" name="u_name" size="50" type="text" value="<?php echo $data["name"];?>">
        </label>
        <?php if(isset($data["errors"]["error_name"]) && $data["errors"]["error_name"]) {?>
            <span class="error"><?php echo $data["errors"]["error_name"];?></span>
        <?php }?>
        <span id='error_name' class="error" style="display:none;"></span>

    </div>

    <div>
        <label>Ваш email:<br>
            <input id="u_email" name="u_email" size="50" type="email" value="<?php echo $data["email"];?>">
        </label>
        <?php if(isset($data["errors"]["error_email"]) && $data["errors"]["error_email"]) {?>
            <span class="error"><?php echo $data["errors"]["error_email"];?></span>
        <?php }?>
        <span id='error_email' class="error" style="display:none;"></span>
    </div>

    <div id="wrap_regions">
        <label>Ваш регион:<br>
            <select id="regions" name="regions" class="chosen-select" >
                <option value="">Выберите регион</option>
                <?php
                if(isset($data) && is_array($data) && isset( $data['regions']) && is_array( $data['regions'])) {
                    foreach($data['regions'] as $region) {
                        echo '<option value="'.$region ["ter_id"].'">'.$region ["ter_address"].'</option>';
                    }
                }
                ?>
            </select>
        </label>
        <?php if(isset($data["errors"]["error_subsubregions"]) && $data["errors"]["error_subsubregions"]) {?>
            <span class="error"><?php echo $data["errors"]["error_subsubregions"];?></span>
        <?php }?>
        <span id='error_regions' class="error" style="display:none;"></span>
    </div>
<br/>
    <div><input name="register" type="submit" value="Регистрация"></div>
</form>