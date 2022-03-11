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
                $checkboxText = [];
                $radioText = [];
                foreach ($_POST['checkBoxText'] as $value) 
                {
                    $checkboxText[] = $value;
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