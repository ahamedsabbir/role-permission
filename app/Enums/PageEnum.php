<?php

namespace App\Enums;

enum PageEnum: string
{
    case HOME       = 'home';
    case PRODUCTS   = 'products';
    case ABOUT      = 'about-us';
    case CONTACT    = 'contact-us';
    case COMMON     = 'common';
}
