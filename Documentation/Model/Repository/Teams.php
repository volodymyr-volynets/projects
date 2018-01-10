<?php

namespace Numbers\Projects\Documentation\Model\Repository;
class Teams extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DN';
	public $title = 'D/N Repository Teams';
	public $name = 'dn_repository_teams';
	public $pk = ['dn_repoteam_tenant_id', 'dn_repoteam_repository_id', 'dn_repoteam_team_id'];
	public $tenant = true;
	public $orderby = [
		'dn_repoteam_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'dn_repoteam_';
	public $columns = [
		'dn_repoteam_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dn_repoteam_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'dn_repoteam_repository_id' => ['name' => 'Repository #', 'domain' => 'repository_id'],
		'dn_repoteam_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
		'dn_repoteam_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dn_repository_teams_pk' => ['type' => 'pk', 'columns' => ['dn_repoteam_tenant_id', 'dn_repoteam_repository_id', 'dn_repoteam_team_id']],
		'dn_repoteam_repository_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_repoteam_tenant_id', 'dn_repoteam_repository_id'],
			'foreign_model' => '\Numbers\Projects\Documentation\Model\Repositories',
			'foreign_columns' => ['dn_repository_tenant_id', 'dn_repository_id']
		],
		'dn_repoteam_team_id_fk' => [
			'type' => 'fk',
			'columns' => ['dn_repoteam_tenant_id', 'dn_repoteam_team_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Teams',
			'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
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