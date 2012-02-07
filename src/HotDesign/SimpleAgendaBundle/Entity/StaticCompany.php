<?php

namespace HotDesign\SimpleAgendaBundle\Entity;

/**
 * Clase estática que se encarga de hacer un manejo de las monedas 
 * 
 */
class StaticCompany {

    const PERSONAL = 0;
    const CLARO = 1;
    const MOVISTAR = 2;

    //Arreglo de monedas Disponibles....
    //
    // array(NOMBRE_MONEDA, SIMBOLO, INDICE PARA LLEVAR A DOLAR)

    private static $companies = array(
        self::PERSONAL => array(
            'label' => 'Personal'
        ),
        self::CLARO => array(
            'label' => 'Claro'
        ),
        self::MOVISTAR => array(
            'label' => 'Movistar',
        ),
    );
    private static $id_default = self::PERSONAL;

    public static function getChoices() {
        $output = array();
        foreach (self::$companies as $k => $c)
            $output[$k] = $c['label'];
        return $output;
    }

    public static function getCompanyName($id) {
        if (isset(self::$companies[$id]['label'])) {
            return self::$companies[$id]['label'];
        }
        return false;
    }

    public static function getDefaultCompany() {
        return self::$id_default;
    }

    public static function getIdDefault() {
        return self::$id_default;
    }

};