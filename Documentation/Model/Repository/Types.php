<?php

namespace Numbers\Projects\Documentation\Model\Repository;
class Types extends \Object\Data {
	public $column_key = 'dn_repotype_id';
	public $column_prefix = 'dn_repotype_';
	public $orderby;
	public $columns = [
		'dn_repotype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'dn_repotype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		10 => ['dn_repotype_name' => 'Global'],
		20 => ['dn_repotype_name' => 'Regular'],
	];
}