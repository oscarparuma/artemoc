<?php
/**
 * Recibe las iniciales del día de la semana y retorna
 * el nombre completo del día de la semana.
 */
if (! function_exists('expandWeekdayName')) {
    function expandWeekdayName($initialsOfWeekdayName) {
        $fullWeekdayName = "";
        switch($initialsOfWeekdayName) {
            case('L'):
                $fullWeekdayName = 'Lunes';
                break;
            case('M'):
                $fullWeekdayName = 'Martes';
                break;
            case('Mi'):
                $fullWeekdayName = 'Miércoles';
                break;
            case('J'):
                $fullWeekdayName = 'Jueves';
                break;
            case('V'):
                $fullWeekdayName = 'Viernes';
                break;
            case('S'):
                $fullWeekdayName = 'Sábado';
                break;
            case('D'):
                $fullWeekdayName = 'Domingo';
                break;
        }
        return $fullWeekdayName;
    }
}