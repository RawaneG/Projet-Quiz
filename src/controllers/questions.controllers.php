<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST['action']))
        {
            if($_POST['action'] == "ask")
            {
                $errors = [];

                $question = correct($_POST['question']);
                $nbrePoints = correct($_POST['nbrePoints']);
                $select = correct($_POST['selection']);
                $text = $_POST['singleText'];
                $radio = $_POST['radio'];
                $radioText = [];
                $checkBox = [];
                $checkboxText = [];
                foreach ($_POST['checkbox'] as $value) 
                {
                    $checkBox[] = $value;
                }
                foreach ($_POST['checkBoxText'] as $value) 
                {
                    $checkBoxText[] = $value;
                }
                foreach ($_POST['radioText'] as $value) 
                {
                    $radioText[] = $value;
                }
                if($question == '' || $question == null)
                {
                    $errors['question'] = "Veuillez entrer une question";
                }
                if(count($errors) == 0)
                {
                    if(file_exists(PATH_DB))  
                    {  
                        $current_data = file_get_contents(PATH_DB); 
                        $array_data = json_decode($current_data, true); 
                        $extraCheckBox = 
                        [                      
                            'question' => $question,  
                            'points' => $nbrePoints,  
                            'tdrCheckbox' => $checkBoxText,
                            'correctCheckbox' => $checkBox,
                        ];
                        $extraRadio = 
                        [
                            'question' => $question,  
                            'points' => $nbrePoints,  
                            'tdrRadio' => $radioText,
                            'correctRadio' => $radio
                        ];
                        $extraText = 
                        [
                            'question' => $question,  
                            'points' => $nbrePoints,  
                            'text' => $text
                        ];
                        if($radioText != [] || $radioText != null || $radio != [] || $radio != null)
                        {
                            $array_data['questions'][] = $extraRadio;  
                            $final_data = json_encode($array_data,JSON_PRETTY_PRINT);    
                            file_put_contents(PATH_DB, $final_data,true);
                            header("location:".WEBROOT."?controller=user&action=creerQuestion");
                        }
                        elseif($checkBoxText != [] || $checkBoxText != null || $checkBox != [] || $checkBox != null)
                        {
                            $array_data['questions'][] = $extraCheckBox;  
                            $final_data = json_encode($array_data,JSON_PRETTY_PRINT);    
                            file_put_contents(PATH_DB, $final_data,true);  
                            header('location:'.WEBROOT.'?controller=user&action=creerQuestion');
                        }
                        else
                        {
                            $array_data['questions'][] = $extraText;  
                            $final_data = json_encode($array_data,JSON_PRETTY_PRINT);    
                            file_put_contents(PATH_DB, $final_data,true);  
                            header('location:'.WEBROOT.'?controller=user&action=creerQuestion');
                        }
                    }
                }
                else
                {
                    $_SESSION[KEY_ERRORS] = $errors;
                    header('location:'.WEBROOT.'?controller=user&action=creerQuestion');
                }
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        if(isset($_GET['action']))
        {
            if($_GET['action'] == "question")
            {
                echo "Vous êtes dans la page de questions par GET";

            }
        }
    }
?>