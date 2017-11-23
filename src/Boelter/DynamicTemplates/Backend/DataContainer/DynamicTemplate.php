<?php

namespace Boelter\DynamicTemplates\Backend\DataContainer;

class DynamicTemplate
{

    public static function loadTemplatesForSelector($selector)
    {
        $selector = substr($selector, 5);
        $database = \Database::getInstance();

        $dynamicTemplate =
            $database->prepare("SELECT * FROM tl_dynamic_template WHERE selector = ? AND inactive = ? ORDER BY title")
                ->execute(
                    array($selector, '')
                );
        $templates       = array();

        if ($dynamicTemplate->count() == 0) {
            return '';
        }

        while ($dynamicTemplate->next()) {
            $templates[] =
                json_encode(array('title' => $dynamicTemplate->title, 'content' => $dynamicTemplate->content));
        }

        return implode(",\n", $templates)."\n";
    }

    public function setGroup($group, $mode, $field, $row, $dc)
    {
        return $GLOBALS['TL_LANG']['tl_dynamic_template'][$field][0].': '.$group;
    }
}
