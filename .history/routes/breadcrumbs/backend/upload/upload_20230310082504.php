<?php

Breadcrumbs::for('admin.upload', function ($trail) {
    $trail->push('Upload', route('admin.upload'));
});