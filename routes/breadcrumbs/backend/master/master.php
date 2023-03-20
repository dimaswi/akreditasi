<?php

Breadcrumbs::for('admin.master', function ($trail) {
    $trail->push('Master', route('admin.master'));
});
