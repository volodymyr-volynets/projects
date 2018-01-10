<?php

namespace Numbers\Projects\Documentation\Model\Repository;
class Roles extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DN';
	public $title = 'D/N Repository Roles';
	public $name = 'dn_repository_roles';
	public $pk = ['dn_reporol_tenant_id', 'dn_reporol_repository_id', 'dn_reporol_role_id'];
	public $tenant = true;
	public $orderby = [
		'dn_reporol_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'dn_reporol_';
	public $columns = [
		'dn_reporol_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dn_reporol_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'dn_reporol_repository_id' => ['name' => 'Repository #', 'domain' => 'repository_id'],
		'dn_reporol_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
		'dn_reporol_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dn_repository_roles_pk' => ['type' => 'pk', 'columns' => ['dn_reporol_tenant_id', 'dn_reporol_repository_id', 'dn_reporol_role_id']],
		'dn_reporol_repository_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_reporol_tenant_id', 'dn_reporol_repository_id'],
			'foreign_model' => '\Numbers\Projects\Documentation\Model\Repositories',
			'foreign_columns' => ['dn_repository_tenant_id', 'dn_repository_id']
		],
		'dn_reporol_role_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_reporol_tenant_id', 'dn_reporol_role_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Roles',
			'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
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