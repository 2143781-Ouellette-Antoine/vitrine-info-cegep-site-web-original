<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-15 20:59:10
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-28 16:14:18
 *
 * All the response processing is here
 */

/**
 * Parse the response, output prepared / processed data
 * @param  [String] $apiResponse [Reponse from API server]
 * @return [AnyType]              [Prepared / processed data]
 */
function parseApiResponse($apiResponse) {
    $responseData = explode("|", trim($apiResponse));

    if ($responseData < 1) return;

    switch ($responseData[0]) {
        case 'LFRACTALS':
            return parseFractalsList($responseData[1]);
        break;
        case 'TVSTATUS':
            return $responseData[1] == "1";
        break;
        case 'TVCONNECT':
            return $responseData[1]; // Session id
        break;
        case 'TVSESSIONSTATUS':
            return $responseData[1]; // Session is valid or not
        break;  
        case 'PLAYF':
            return $responseData[1]; // Fractal has been played or not
        break;
        // Responses that doesnt need to be parsed
        case 'OK':
        case 'ERROR':
            return $responseData[0];
        break;
        default:
            break;
    }
}

function parseFractalsList($str) {
    return explode(";", $str);
}

?>
