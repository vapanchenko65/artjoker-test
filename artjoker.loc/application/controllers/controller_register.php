<?php

class Controller_Register extends Controller
{

	function __construct()
	{
		$this->model = new Model_Register();
		$this->view = new View();
	}

    function action_index()
    {

        $data = array();
        $data["errors"] = array();
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $regions = $this->model->get_regions();
                $data['regions'] = $regions;
                $data["name"] = '';
                $data["email"] = '';
                $this->view->generate('register_view.php', 'template_view.php', $data);
                break;
            case 'POST':
                if(isset($_POST['u_name']) && isset($_POST['u_email']))
                {

                    if(!$_POST['u_name']) {
                        $data["errors"]["error_name"] = 'Обязательное поле';
                    }
                    if(!$_POST['u_email']) {
                        $data["errors"]["error_email"] = 'Обязательное поле';
                    }
                    if(!isset($_POST['subsubregions']) || !$_POST['subsubregions']) {
                        $data["errors"]["error_subsubregions"] = 'Обязательное поле';
                    }

                    $data["name"] = $_POST['u_name'];
                    $data["email"] = $_POST['u_email'];
                    $data["subsubregions"] = $_POST['subsubregions'];

                    if($data["errors"]) {
                        $regions = $this->model->get_regions();
                        $data['regions'] = $regions;
                        $this->view->generate('register_view.php', 'template_view.php', $data);
                    } else {

                        $old_user = $this->model->get_user_by_email($_POST['u_email']);
                    if($old_user) {
                        $data["subsubregions"] = $old_user["territory"];
                        $data["header_page"] = 'Old User is exist with same email';
                    } else {
                        $data_for_insert = ['email' => $_POST['u_email'], 'name' => $_POST['u_name'],'territory' => $_POST['subsubregions']];
                        $inset_user = $this->model->add_user($data_for_insert);
                        $data["header_page"] = 'Вы зарегистрированы';
                    }

                        $data["subsubregions_name"] = $this->model->get_subsubregion($data["subsubregions"]);
                        $this->view->generate('registered_view.php', 'template_view.php', $data);

                    }

                }


                break;
            default:
        }

    }

    function action_getSubregions()
    {

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            if(isset($_POST['region_code']) && $_POST['region_code']) {

                $subregions = $this->model->get_subregions($_POST['region_code']);

                $newoptions = '';

                if(is_array( $subregions)) {
                    foreach($subregions as $subregion) {
                        $newoptions .='<option value="'.$subregion ["ter_id"].'">'.$subregion ["ter_address"].'</option>';
                    }
                }

                $subregionsSelect = '
                    <div id="wrap_subregions">
                        <label>Ваш район:<br>
                            <select id="subregions" name="subregions" class="chosen-select">
                                <option value="">Выберите район</option>'.$newoptions.'
                            </select>
                        </label>
                         <span id="error_subregions" class="error" style="display:none;"></span>
                    </div>';

                echo $subregionsSelect;
            }

        }
    }

    function action_getAddresses()
    {

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            if(isset($_POST['subregion_code']) && $_POST['subregion_code']) {

                $subregions = $this->model->get_subregions($_POST['subregion_code']);

                $newoptions = '';

                if(is_array( $subregions)) {
                    foreach($subregions as $subregion) {
                        $newoptions .='<option value="'.$subregion ["ter_id"].'">'.$subregion ["ter_address"].'</option>';
                    }
                }

                $subregionsSelect = '
                    <div id="wrap_subregions">
                        <label>Ваш подрайон:<br>
                            <select id="subsubregions" name="subsubregions" class="chosen-select" >
                                <option value="">Выберите подрайон</option>'.$newoptions.'
                            </select>
                        </label>
                         <span id="error_subsubregions" class="error" style="display:none;"></span>
                    </div>';

                echo $subregionsSelect;
            }

        }
    }

}
