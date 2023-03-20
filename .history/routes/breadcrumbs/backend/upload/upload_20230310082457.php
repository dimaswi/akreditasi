<?php

Breadcrumbs::for('admin.upload', function ($trail) {
    $trail->push('Title Here', route('admin.upload'));
});