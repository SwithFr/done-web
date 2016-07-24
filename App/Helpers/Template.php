<?php


namespace App\Helpers;


class Template
{
    public static function getLabel($type)
    {
        if ($type == "taches") {
            $label = "la tâche";
        } elseif ($type == "projets") {
            $label = "le projet";
        } elseif ($type == "tags") {
            $label = "le tag";
        } elseif ($type == "etats") {
            $label = "l'état";
        }

        return $label;
    }
}