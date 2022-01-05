<?php
/**
 * @package shorturl
 */
$xpdo_meta_map['ShortUrl']= array (
  'package' => 'shorturl',
  'version' => '1.1',
  'table' => 'shorturls',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'MyISAM',
  ),
  'fields' => 
  array (
    'url' => '',
    'short' => '',
    'clicks' => 0,
  ),
  'fieldMeta' => 
  array (
    'url' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'short' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'clicks' => 
    array (
      'dbtype' => 'int',
      'precision' => '16',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
  ),
);
