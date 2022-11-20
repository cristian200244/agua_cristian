<?php
function nivel($promedio)
    {
        switch ($promedio) {
            case ($promedio > 1 && $promedio <= 5):
                return  "SIN RIESGO";
                break;
            case ($promedio > 5 && $promedio <= 14):
                return  "BAJO";
                break;
            case ($promedio > 14 && $promedio <= 35):
                return  "MEDIO";
                break;
            case ($promedio > 35 && $promedio <= 80):
                return  "ALTO";
                break;
            case ($promedio > 80 && $promedio < 100):
                return "INVIABLE SANITARIAMENTE";
                break;
            default:
                return  "No Se Han Presentado Muestras";
                break;
        }
    }
