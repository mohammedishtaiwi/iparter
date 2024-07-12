<?php
 
// Home

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



Breadcrumbs::for('web.Home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('web.Home'));
});
 
// Home > Contact Us
Breadcrumbs::for('Contact-Us', function ($trail) {
    $trail->parent('web.Home');
    $trail->push('Contact Us', route('web.Contact-Us'));
});
 
