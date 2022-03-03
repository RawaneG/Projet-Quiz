<?php
function champ_obligatoire(string $key,string $data,array &$errors,string $message= "ce champ est obligatoire")
{
    if(empty($data))
    {
        $errors[$key] = $message;
    }
}
function valid_email(string $key,string $data,array &$errors,string $message= "Cet email est invalide")
{
    if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$data))
    {
        $errors[$key] = $message;
    }
}
function valid_password(string $key,string $data,array &$errors,string $message= "Le mot de passe est 
incorrect")
{
    if(!preg_match("/[a-zA-Z]/",$data) || !preg_match("/[0-9]/", $data) || $data < 6)
    {
        $errors[$key] = $message;
    }
}