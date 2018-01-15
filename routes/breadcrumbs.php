<?php
/**
 * Description: breadcrumbs.php PhpStorm.
 *
 * @package     pusaka-maluku
 * @author      alex
 * @created     28/12/2017, modified: 28/12/2017 04:52
 * @copyright   Copyright (c) 2017.
 */

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('module.dashboard'), route('admin.dashboard'));
});

Breadcrumbs::register('system', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('module.setting_system'), null);
});

Breadcrumbs::register('menu', function ($breadcrumbs) {
    $breadcrumbs->parent('system');
    $breadcrumbs->push(__('module.menu_title'), route('admin.system.menus.index'));
});

Breadcrumbs::register('groups', function ($breadcrumbs) {
    $breadcrumbs->parent('system');
    $breadcrumbs->push(__('module.group_title'), route('admin.system.groups.index'));
});

Breadcrumbs::register('groups_access', function ($breadcrumbs) {
    $breadcrumbs->parent('groups');
    $breadcrumbs->push(__('module.access_title'), null);
});

Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->parent('system');
    $breadcrumbs->push(__('module.user_title'), route('admin.system.users.index'));
});

Breadcrumbs::register('logs', function ($breadcrumbs) {
    $breadcrumbs->parent('system');
    $breadcrumbs->push(__('module.logs_title'), route('admin.system.logs.index'));
});

Breadcrumbs::register('configuration', function ($breadcrumbs) {
    $breadcrumbs->parent('system');
    $breadcrumbs->push(__('module.config_title'), route('admin.system.configuration.index'));
});