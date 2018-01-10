<?php

namespace Numbers\Projects\Projects\Model\Product;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'PM';
	public $title = 'P/M Product Types';
	public $name = 'pm_product_types';
	public $pk = ['pm_prodtype_id'];
	public $orderby;
	public $limit;
	public $column_prefix = 'pm_prodtype_';
	public $columns = [
		'pm_prodtype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'pm_prodtype_name' => ['name' => 'Name', 'domain' => 'name'],
		'pm_prodtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'pm_product_types_pk' => ['type' => 'pk', 'columns' => ['pm_prodtype_id']]
	];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation = [
		'field' => 'pm_prodtype_id',
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}