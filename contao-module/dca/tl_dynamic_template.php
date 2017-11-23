<?php

/**
 * Table tl_dynamic_template
 */
$GLOBALS['TL_DCA']['tl_dynamic_template'] = array
(

    // Config
    'config'   => array
    (
        'dataContainer'    => 'Table',
        'switchToEdit'     => true,
        'enableVersioning' => true,
        'sql'              => array
        (
            'keys' => array
            (
                'id' => 'primary',
            ),
        ),
    ),

    // List
    'list'     => array
    (
        'sorting'           => array
        (
            'mode'        => 1,
            'fields'      => array('selector DESC', 'title'),
            'panelLayout' => 'filter;search,limit',
        ),
        'label'             => array
        (
            'fields'         => array('title', 'selector'),
            'format'         => '%s <span style="color:#b3b3b3;padding-left:3px">[Selektor: %s]</span>',
            'group_callback' => array('Boelter\\DynamicTemplates\\Backend\\DataContainer\\DynamicTemplate', 'setGroup'),
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ),
        ),
        'operations'        => array
        (
            'edit'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_dynamic_template']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif',
            ),
            'copy'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_dynamic_template']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.gif',
            ),
            'delete' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_dynamic_template']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\''.$GLOBALS['TL_LANG']['MSC']['deleteConfirm']
                                .'\'))return false;Backend.getScrollOffset()"',
            ),
            'show'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_dynamic_template']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif',
            ),
        ),
    ),

    // Palettes
    'palettes' => array
    (
        'default' => '{title_legend},title,selector;{content_legend},content;{inactive_legend},inactive',
    ),

    // Fields
    'fields'   => array
    (
        'id'       => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ),
        'tstamp'   => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ),
        'title'    => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_dynamic_template']['title'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''",
        ),
        'selector' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_dynamic_template']['selector'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''",
        ),
        'content'  => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_dynamic_template']['content'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'textarea',
            'eval'      => array('mandatory' => true, 'rte' => 'tinyMCE'),
            'sql'       => "text NOT NULL",
        ),
        'inactive' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_dynamic_template']['inactive'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class' => 'w50'),
            'sql'       => "char(1) NOT NULL default ''",
        ),
    ),
);
