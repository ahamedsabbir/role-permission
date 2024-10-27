<?php

namespace App\Enums;

enum SectionEnum: string
{
    // Home page section
    case HOME_BANNER = 'home_banner';
    case HOME_BANNERS = 'home_banners';
    case WHY_CHOOSE = 'why_choose';
    case REVIEW = 'review';
    case REVIEWS = 'reviews';
    case HOME_AI = 'home_ai';

    //Products page section
    case PRODUCT_BANNER_IMAGE = 'product_banner_image';
    case PRODUCT_BANNER_CONTENT = 'product_banner_content';
    case PRODUCT_HEADER_CONTENT = 'product_header_content';
    case PRODUCTS = 'products';
    case PRODUCT_AI = 'product_ai';


    //about us page section
    case ABOUT_BANNER = 'about_banner';
    case MISSION = "mission";
    case MISSIONS = "missions";
    case TEAM = "team";
    case TEAMS = "teams";
    case ABOUT_CHOOSE = "about_choose";
    case ABOUT_CHOOSES = "about_chooses";
    case MEET = "about_meet";
    case MEETS = "about_meets";
    case ABOUT_AI = "about_ai";

    //contact page section
    case CONTACT_BANNER = 'contact_banner';
    case SPEAK = "prefer_to_speak";
    case SPEAKS = "prefer_to_speaks";


    //Footer
    case FOOTER = 'footer';
    case SOLUTION = "solution";

    // Home page section
    public static function getHome()
    {
        return [
            self::HOME_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::HOME_BANNERS->value => ['item' => 3, 'type' => 'get'],
            self::WHY_CHOOSE->value => ['item' => 1, 'type' => 'first'],
            self::REVIEW->value => ['item' => 1, 'type' => 'first'],
            self::REVIEWS->value => ['item' => 3, 'type' => 'get'],
            self::HOME_AI->value => ['item' => 1, 'type' => 'first'],
        ];
    }

    // Products page section
    public static function getProduct()
    {
        return [
            self::PRODUCT_BANNER_IMAGE->value => ['item' => 2, 'type' => 'get'],
            self::PRODUCT_BANNER_CONTENT->value => ['item' => 1, 'type' => 'first'],
            self::PRODUCT_HEADER_CONTENT->value => ['item' => 1, 'type' => 'first'],
            self::PRODUCTS->value => ['item' => 3, 'type' => 'get'],
            self::PRODUCT_AI->value => ['item' => 1, 'type' => 'first'],
        ];
    }

    // About us page section
    public static function getAbout()
    {
        return [
            self::ABOUT_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::MISSION->value => ['item' => 1, 'type' => 'first'],
            self::MISSIONS->value => ['item' => 6, 'type' => 'get'],
            self::TEAM->value => ['item' => 1, 'type' => 'first'],
            self::TEAMS->value => ['item' => 6, 'type' => 'get'],
            self::ABOUT_CHOOSE->value => ['item' => 1, 'type' => 'first'],
            self::ABOUT_CHOOSES->value => ['item' => 6, 'type' => 'get'],
            self::MEET->value => ['item' => 1, 'type' => 'first'],
            self::MEETS->value => ['item' => 3, 'type' => 'get'],
            self::ABOUT_AI->value => ['item' => 1, 'type' => 'first'],
        ];
    }

    // Contact us page section
    public static function getContact()
    {
        return [
            self::CONTACT_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::SPEAK->value => ['item' => 1, 'type' => 'first'],
            self::SPEAKS->value => ['item' => 3, 'type' => 'get'],
        ];
    }

    // Demo page section
    public static function getDemo()
    {
        return [
            self::DEMO_HEADER->value => ['item' => 1, 'type' => 'first'],
            self::DEMO_LEFT->value => ['item' => 1, 'type' => 'first'],
            self::DEMO_RIGHT->value => ['item' => 1, 'type' => 'first'],
            self::DEMO_FOOTER->value => ['item' => 1, 'type' => 'first'],
            self::DEMO_AI->value => ['item' => 1, 'type' => 'first'],
        ];
    }

    // Reports page section
    public static function getReport()
    {
        return [
            self::REPORT_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::REPORTS->value => ['item' => 4, 'type' => 'get'],
            self::REPORTS_CONVERSION->value => ['item' => 1, 'type' => 'first'],
            self::REPORTS_CONVERSION_ITEM->value => ['item' => 3, 'type' => 'get'],
            self::REPORTS_BREAKDOWN->value => ['item' => 1, 'type' => 'first'],
            self::REPORT_AI->value => ['item' => 1, 'type' => 'first'],
        ];
    }

    public static function getCommon()
    {
        return [
            self::FOOTER->value => ['item' => 1, 'type' => 'first'],
            self::SOLUTION->value => ['item' => 1, 'type' => 'first'],
        ];
    }

}

