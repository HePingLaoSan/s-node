<?php
/**
 * Check if unit is used in the catalog
 */

$result = XT::query("
    SELECT
        count(pkg_unit) as cnt
    FROM
        " . XT::getTable('rezepte') . "
    WHERE
        pkg_unit = " . XT::getValue('id')
    ,__FILE__,__LINE__,0);

$row = $result->FetchRow();
if($row['cnt'] > 0){
    XT::log('This package unit is used in the catalog, cannot be deleted', __FILE__, __LINE__, XT_ERROR);
}


?>