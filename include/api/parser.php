<?php

/**
 * @Author: LarochelleJ
 * @Date:   2023-03-15 20:59:10
 * @Last Modified by:   LarochelleJ
 * @Last Modified time: 2023-03-15 21:51:26
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
        // Responses that doesnt need to be parsed
        case 'OK':
        case 'ERROR':
            return $responseData[0];
        break;
        default:
            break;
    }
}

?>
