<?php
session_start();

// Paris and Idiorm
require_once 'Paris/idiorm.php';
require_once 'Paris/paris.php';

ORM::configure('mysql:host=localhost;dbname=toussel');
ORM::configure('username','toussel');
ORM::configure('password', '123toussel123');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

require 'models/Chat.php';

//require_once 'Twig/Autoloader.php';
//Twig_Autoloader::register();

class TemplateRenderer
{
    public $loader; // Instance of Twig_Loader_Filesystem
    public $environment; // Instance of Twig_Environment

    public function __construct($envOptions = array(), $templateDirs = array())
    {
        // Merge default options
        // You may want to change these settings
        $envOptions += array(
            'debug' => false,
//            'charset' => 'iso-8859-2',
            'charset' => 'utf-8',
//            'cache' => './cache', // Store cached files under cache directory
            'strict_variables' => true,
        );
        $templateDirs = array_merge(
            array('./template') // Base directory with all templates
    );
        $this->loader = new Twig_Loader_Filesystem($templateDirs);
        $this->environment = new Twig_Environment($this->loader, $envOptions);
    }

    public function render($templateFile, array $variables)
    {
        return $this->environment->render($templateFile, $variables);
    }
}
?>