<?php

Breadcrumbs::for('admin.master', function ($trail) {
    $trail->push('master', route('admin.master'));
});