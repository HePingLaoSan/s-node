<?php

XT::assign("LANGS", $GLOBALS['cfg']->getLangs());
XT::assign("ACTIVE_LANG", $GLOBALS['plugin']->getActiveLang());

$result = XT::query("
    SELECT
 *
    FROM
        " . $GLOBALS['plugin']->getTable("forum_categories_details") . "
    WHERE
        node_id = " . $GLOBALS['plugin']->getValue("node_id") . "
        AND lang = '" . $GLOBALS['plugin']->getActiveLang() . "'
    ",__FILE__,__LINE__,0);

$data = array();
while($row = $result->FetchRow()){
    $data[] = $row;
}

XT::assign("ID", $GLOBALS['plugin']->getValue("id"));
XT::assign("NODE_ID", $GLOBALS['plugin']->getValue("node_id"));
XT::assign("NODE", $data[0]);

$content = XT::build("editcategories.tpl");

?>
