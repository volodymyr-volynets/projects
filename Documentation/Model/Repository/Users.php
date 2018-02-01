<?php

namespace Numbers\Projects\Documentation\Model\Repository;
class Users extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DN';
	public $title = 'D/N Repository Users';
	public $name = 'dn_repository_users';
	public $pk = ['dn_repousr_tenant_id', 'dn_repousr_repository_id', 'dn_repousr_user_id'];
	public $tenant = true;
	public $orderby = [
		'dn_repousr_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'dn_repousr_';
	public $columns = [
		'dn_repousr_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dn_repousr_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'dn_repousr_repository_id' => ['name' => 'Repository #', 'domain' => 'repository_id'],
		'dn_repousr_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'dn_repousr_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dn_repository_users_pk' => ['type' => 'pk', 'columns' => ['dn_repousr_tenant_id', 'dn_repousr_repository_id', 'dn_repousr_user_id']],
		'dn_repousr_repository_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_repousr_tenant_id', 'dn_repousr_repository_id'],
			'foreign_model' => '\Numbers\Projects\Documentation\Model\Repositories',
			'foreign_columns' => ['dn_repository_tenant_id', 'dn_repository_id']
		],
		'dn_repousr_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_repousr_tenant_id', 'dn_repousr_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}