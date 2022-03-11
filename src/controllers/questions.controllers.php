<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST['action']))
        {
            if($_POST['action'] == "ask")
            {
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
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR.'creation.question.html.php');
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