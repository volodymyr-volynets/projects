<?php

namespace Numbers\Projects\Projects\Model;
class Products extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'PM';
	public $title = 'P/M Products';
	public $schema;
	public $name = 'pm_products';
	public $pk = ['pm_product_tenant_id', 'pm_product_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'pm_product_';
	public $columns = [
		'pm_product_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'pm_product_id' => ['name' => 'Product #', 'domain' => 'product_id_sequence'],
		'pm_product_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
		'pm_product_type_id' => ['name' => 'Type', 'domain' => 'type_id'],
		'pm_product_name' => ['name' => 'Name', 'domain' => 'name'],
		// inactive & hold
		'pm_product_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'pm_product_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'pm_products_pk' => ['type' => 'pk', 'columns' => ['pm_product_tenant_id', 'pm_product_id']],
		'pm_product_code_un' => ['type' => 'unique', 'columns' => ['pm_product_tenant_id', 'pm_product_code']],
		'pm_product_type_id_fk' => [
			'type' => 'fk',
			'columns' => ['pm_product_type_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Types',
			'foreign_columns' => ['um_usrtype_id']
		]
	];
	public $indexes = [
		'pm_products_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['pm_product_code', 'pm_product_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'pm_product_tenant_id' => 'wg_audit_tenant_id',
			'pm_product_id' => 'wg_audit_product_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation = [
		'field' => 'pm_product_id',
	];

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $attributes = [
		'map' => [
			'pm_product_tenant_id' => 'wg_attribute_tenant_id',
			'pm_product_id' => 'wg_attribute_product_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}