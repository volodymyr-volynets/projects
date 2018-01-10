<?php

namespace Numbers\Projects\Documentation\Form;
class Repositories extends \Object\Form\Wrapper\Base {
	public $form_link = 'dn_repositories';
	public $module_code = 'DN';
	public $title = 'D/N Repositories Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'private_container' => ['default_row_type' => 'grid', 'order' => 32100],
		'teams_separator_container' => ['default_row_type' => 'grid', 'order' => 32200],
		'users_separator_container' => ['default_row_type' => 'grid', 'order' => 32200],
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\\Numbers\Projects\Documentation\Model\Repository\Roles',
			'details_pk' => ['dn_reporol_role_id'],
			'order' => 35000
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Projects\Documentation\Model\Repository\Organizations',
			'details_pk' => ['dn_repoorg_organization_id'],
			'required' => true,
			'order' => 35001
		],
		'teams_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Projects\Documentation\Model\Repository\Teams',
			'details_pk' => ['dn_repoteam_team_id'],
			'order' => 35002
		],
		'users_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Projects\Documentation\Model\Repository\Users',
			'details_pk' => ['dn_repousr_user_id'],
			'order' => 35002
		],
	];
	public $rows = [
		'top' => [
			'dn_repository_id' => ['order' => 100],
			'dn_repository_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'acl' => ['order' => 200, 'label_name' => 'Permissions'],
		]
	];
	public $elements = [
		'top' => [
			'dn_repository_id' => [
				'dn_repository_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Repository #', 'domain' => 'repository_id_sequence', 'percent' => 50, 'navigation' => true],
				'dn_repository_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'dn_repository_name' => [
				'dn_repository_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'acl' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
				'private' => ['container' => 'private_container', 'order' => 200],
				'roles' => ['container' => 'roles_container', 'order' => 300],
				'separator' => ['container' => 'teams_separator_container', 'order' => 350],
				'teams' => ['container' => 'teams_container', 'order' => 400],
				'separator2' => ['container' => 'users_separator_container', 'order' => 450],
				'users' => ['container' => 'users_container', 'order' => 500],
			],
		],
		'general_container' => [
			'um_user_type_id' => [
				'dn_repository_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Projects\Documentation\Model\Repository\Types', 'onchange' => 'this.form.submit();'],
				'dn_repository_icon' => ['order' => 2, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
				'dn_repository_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
		],
		'private_container' => [
			self::SEPARATOR_HORIZONTAL => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 50, 'label_name' => 'User Roles', 'icon' => 'far fa-user-circle', 'percent' => 100],
			],
			'dn_repository_private' => [
				'dn_repository_private' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Private', 'type' => 'boolean', 'percent' => 25],
				'dn_repository_all_roles' => ['order' => 2, 'label_name' => 'All Roles', 'type' => 'boolean', 'percent' => 25],
				'dn_repository_weight' => ['order' => 3, 'label_name' => 'Weight', 'domain' => 'weight', 'null' => true, 'percent' => 50],
			]
		],
		'roles_container' => [
			'row1' => [
				'dn_reporol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'dn_reporol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'dn_repoorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'dn_repoorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'teams_separator_container' => [
			self::SEPARATOR_HORIZONTAL => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'Teams', 'icon' => 'fas fa-sitemap', 'percent' => 100],
			]
		],
		'teams_container' => [
			'row1' => [
				'dn_repoteam_team_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team', 'domain' => 'team_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Teams', 'onchange' => 'this.form.submit();'],
				'dn_repoteam_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'users_separator_container' => [
			self::SEPARATOR_HORIZONTAL => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'Users', 'icon' => 'fas fa-users', 'percent' => 100],
			]
		],
		'users_container' => [
			'row1' => [
				'dn_repousr_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Users', 'onchange' => 'this.form.submit();'],
				'dn_repousr_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Repositories',
		'model' => '\Numbers\Projects\Documentation\Model\Repositories',
		'details' => [
			'\Numbers\Projects\Documentation\Model\Repository\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['dn_repoorg_tenant_id', 'dn_repoorg_repository_id', 'dn_repoorg_organization_id'],
				'type' => '1M',
				'map' => ['dn_repository_tenant_id' => 'dn_repoorg_tenant_id', 'dn_repository_id' => 'dn_repoorg_repository_id']
			],
			'\Numbers\Projects\Documentation\Model\Repository\Roles' => [
				'name' => 'Roles',
				'pk' => ['dn_reporol_tenant_id', 'dn_reporol_repository_id', 'dn_reporol_role_id'],
				'type' => '1M',
				'map' => ['dn_repository_tenant_id' => 'dn_reporol_tenant_id', 'dn_repository_id' => 'dn_reporol_repository_id']
			],
			'\Numbers\Projects\Documentation\Model\Repository\Teams' => [
				'name' => 'Teams',
				'pk' => ['dn_repoteam_tenant_id', 'dn_repoteam_repository_id', 'dn_repoteam_team_id'],
				'type' => '1M',
				'map' => ['dn_repository_tenant_id' => 'dn_repoteam_tenant_id', 'dn_repository_id' => 'dn_repoteam_repository_id']
			],
			'\Numbers\Projects\Documentation\Model\Repository\Users' => [
				'name' => 'Teams',
				'pk' => ['dn_repousr_tenant_id', 'dn_repousr_repository_id', 'dn_repousr_user_id'],
				'type' => '1M',
				'map' => ['dn_repository_tenant_id' => 'dn_repousr_tenant_id', 'dn_repository_id' => 'dn_repousr_repository_id']
			],
		]
	];

	public function refresh(& $form) {

	}

	public function validate(& $form) {

	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where) {
		if ($field_name == 'dn_reporol_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Projects\Documentation\Model\Repository\Organizations'], 'dn_repoorg_organization_id', ['unique' => true]);
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
//		if ($options['options']['field_name'] == 'um_usrassign_child_user_id' || $options['options']['field_name'] == 'um_usrassign_parent_user_id') {
//			if (empty($neighbouring_values['um_usrassign_multiple'])) {
//				$options['options']['method'] = 'select';
//			}
//		}
	}

	public function overrideTabs(& $form, & $options, & $tab, & $neighbouring_values) {
		$result = [];
		if ($tab == 'acl' && (empty($form->values['dn_repository_type_id']) || $form->values['dn_repository_type_id'] == 10)) {
			$result['hidden'] = true;
		}
		return $result;
	}
}