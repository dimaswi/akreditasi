<?php

Breadcrumbs::for('admin.master', function ($trail) {
    $trail->push('Upload', route('admin.master'));
});