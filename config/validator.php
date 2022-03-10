<?php
function champ_obligatoire(string $key,string | array $data,array &$errors,string $message= "ce champ est obligatoire")
{
    if(empty($data))
    {
        $errors[$key] = $message;
    }
}
function valid_email(string $key,string $data,array &$errors,string $message= "Cet email est invalide")
{
    if(!preg_match("/[-0-9a-zA-Z.+_]+@(gmail)+.(com)/",$data))
    {
        $errors[$key] = $message;
    }
}
function valid_password(string $key,string $data,array &$errors,string $message= "Le mot de passe est 
incorrect")
{
    if(!preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%^&*]{6,}$/',$data))
    {
        $errors[$key] = $message;
    }
}
function correct(string | array $element)
{
    $element = htmlspecialchars($element);
    $element = trim($element);
    $element = stripslashes($element);
    return $element;
}