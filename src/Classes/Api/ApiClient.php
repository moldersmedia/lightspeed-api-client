<?php

    namespace MoldersMedia\LightspeedApi\Classes\Api;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\BadResponseException;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Psr7\Response;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException;
    use MoldersMedia\LightspeedApi\Classes\Resources\Account;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountPermissions;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountRatelimit;
    use MoldersMedia\LightspeedApi\Classes\Resources\Additionalcosts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Attributes;
    use MoldersMedia\LightspeedApi\Classes\Resources\Blogs;
    use MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticles;
    use MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticlesImage;
    use MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticlesTags;
    use MoldersMedia\LightspeedApi\Classes\Resources\BlogsComments;
    use MoldersMedia\LightspeedApi\Classes\Resources\BlogsTags;
    use MoldersMedia\LightspeedApi\Classes\Resources\Brands;
    use MoldersMedia\LightspeedApi\Classes\Resources\BrandsImage;
    use MoldersMedia\LightspeedApi\Classes\Resources\Catalog;
    use MoldersMedia\LightspeedApi\Classes\Resources\Categories;
    use MoldersMedia\LightspeedApi\Classes\Resources\CategoriesImage;
    use MoldersMedia\LightspeedApi\Classes\Resources\CategoriesProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Checkouts;
    use MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsOrder;
    use MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsPaymentMethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsShipmentMethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsValidate;
    use MoldersMedia\LightspeedApi\Classes\Resources\Contacts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Countries;
    use MoldersMedia\LightspeedApi\Classes\Resources\Customers;
    use MoldersMedia\LightspeedApi\Classes\Resources\CustomersLogin;
    use MoldersMedia\LightspeedApi\Classes\Resources\CustomersMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\CustomersTokens;
    use MoldersMedia\LightspeedApi\Classes\Resources\Dashboard;
    use MoldersMedia\LightspeedApi\Classes\Resources\Deliverydates;
    use MoldersMedia\LightspeedApi\Classes\Resources\Discountrules;
    use MoldersMedia\LightspeedApi\Classes\Resources\Discounts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Events;
    use MoldersMedia\LightspeedApi\Classes\Resources\ExternalServices;
    use MoldersMedia\LightspeedApi\Classes\Resources\Files;
    use MoldersMedia\LightspeedApi\Classes\Resources\Filters;
    use MoldersMedia\LightspeedApi\Classes\Resources\FiltersValues;
    use MoldersMedia\LightspeedApi\Classes\Resources\Groups;
    use MoldersMedia\LightspeedApi\Classes\Resources\GroupsCustomers;
    use MoldersMedia\LightspeedApi\Classes\Resources\Invoices;
    use MoldersMedia\LightspeedApi\Classes\Resources\InvoicesItems;
    use MoldersMedia\LightspeedApi\Classes\Resources\InvoicesMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\Languages;
    use MoldersMedia\LightspeedApi\Classes\Resources\Metafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\Orders;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersCredit;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersCustomstatuses;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersEvents;
    use MoldersMedia\LightspeedApi\Classes\Resources\Paymentmethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\Products;
    use MoldersMedia\LightspeedApi\Classes\Resources\ProductsAttributes;
    use MoldersMedia\LightspeedApi\Classes\Resources\ProductsFiltervalues;
    use MoldersMedia\LightspeedApi\Classes\Resources\ProductsImages;
    use MoldersMedia\LightspeedApi\Classes\Resources\ProductsMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\ProductsRelations;
    use MoldersMedia\LightspeedApi\Classes\Resources\Quotes;
    use MoldersMedia\LightspeedApi\Classes\Resources\QuotesConvert;
    use MoldersMedia\LightspeedApi\Classes\Resources\QuotesPaymentmethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\QuotesProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\QuotesShippingmethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\Redirects;
    use MoldersMedia\LightspeedApi\Classes\Resources\Returns;
    use MoldersMedia\LightspeedApi\Classes\Resources\Reviews;
    use MoldersMedia\LightspeedApi\Classes\Resources\Sets;
    use MoldersMedia\LightspeedApi\Classes\Resources\Shipments;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShipmentsMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShipmentsProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Shippingmethods;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShippingmethodsCountries;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShippingmethodsValues;
    use MoldersMedia\LightspeedApi\Classes\Resources\Shop;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopCompany;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopJavascript;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopLimits;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopScripts;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopTracking;
    use MoldersMedia\LightspeedApi\Classes\Resources\ShopWebsite;
    use MoldersMedia\LightspeedApi\Classes\Resources\Subscriptions;
    use MoldersMedia\LightspeedApi\Classes\Resources\Suppliers;
    use MoldersMedia\LightspeedApi\Classes\Resources\Tags;
    use MoldersMedia\LightspeedApi\Classes\Resources\TagsProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Taxes;
    use MoldersMedia\LightspeedApi\Classes\Resources\TaxesOverrides;
    use MoldersMedia\LightspeedApi\Classes\Resources\Textpages;
    use MoldersMedia\LightspeedApi\Classes\Resources\ThemeCategories;
    use MoldersMedia\LightspeedApi\Classes\Resources\ThemeProducts;
    use MoldersMedia\LightspeedApi\Classes\Resources\Tickets;
    use MoldersMedia\LightspeedApi\Classes\Resources\TicketsMessages;
    use MoldersMedia\LightspeedApi\Classes\Resources\Time;
    use MoldersMedia\LightspeedApi\Classes\Resources\Types;
    use MoldersMedia\LightspeedApi\Classes\Resources\TypesAttributes;
    use MoldersMedia\LightspeedApi\Classes\Resources\Variants;
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsBulk;
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsMovements;
    use MoldersMedia\LightspeedApi\Classes\Resources\Webhooks;

    class ApiClient
    {
        /**
         * The Api Client version (do not change!)
         */
        const CLIENT_VERSION = '1.8.0';

        /**
         * The Api Hosts (do not change!)
         */
        const SERVER_HOST_LOCAL = 'https://api.webshopapp.dev/';

        const SERVER_HOST_TEST = 'https://api.webshopapp.net/';

        const SERVER_HOST_LIVE = 'https://api.webshopapp.com/';

        const SERVER_EU1_LIVE = 'https://api.webshopapp.com/';

        const SERVER_US1_LIVE = 'https://api.shoplightspeed.com/';

        const ERRORS_TOO_MANY_REQUESTS = 'Too many requests in this time period. Try again later.';

        private $sleepMax = 400;

        private $extraSleepTime = 10;

        /**
         * @var string
         */
        public $apiServer = null;

        /**
         * @var string
         */
        public $apiKey = null;

        /**
         * @var string
         */
        public $apiSecret = null;

        /**
         * @var string
         */
        public $apiLanguage = null;

        /**
         * @var int
         */
        public $apiCallsMade = 0;

        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Account
         */
        public $account;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\AccountMetafields
         */
        public $accountMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\AccountPermissions
         */
        public $accountPermissions;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\AccountRatelimit
         */
        public $accountRatelimit;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Additionalcosts
         */
        public $additionalcosts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Attributes
         */
        public $attributes;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Blogs
         */
        public $blogs;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticles
         */
        public $blogsArticles;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticlesImage
         */
        public $blogsArticlesImage;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BlogsArticlesTags
         */
        public $blogsArticlesTags;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BlogsComments
         */
        public $blogsComments;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BlogsTags
         */
        public $blogsTags;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Brands
         */
        public $brands;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\BrandsImage
         */
        public $brandsImage;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Catalog
         */
        public $catalog;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Categories
         */
        public $categories;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CategoriesImage
         */
        public $categoriesImage;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CategoriesProducts
         */
        public $categoriesProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Checkouts
         */
        public $checkouts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsOrder
         */
        public $checkoutsOrder;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsPaymentMethods
         */
        public $checkoutsPayment_methods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsProducts
         */
        public $checkoutsProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsShipmentMethods
         */
        public $checkoutsShipment_methods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CheckoutsValidate
         */
        public $checkoutsValidate;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Contacts
         */
        public $contacts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Countries
         */
        public $countries;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Customers
         */
        public $customers;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CustomersLogin
         */
        public $customersLogin;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CustomersMetafields
         */
        public $customersMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\CustomersTokens
         */
        public $customersTokens;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Dashboard
         */
        public $dashboard;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Deliverydates
         */
        public $deliverydates;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Discountrules
         */
        public $discountrules;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Discounts
         */
        public $discounts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Events
         */
        public $events;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ExternalServices
         */
        public $external_services;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Files
         */
        public $files;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Filters
         */
        public $filters;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\FiltersValues
         */
        public $filtersValues;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Groups
         */
        public $groups;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\GroupsCustomers
         */
        public $groupsCustomers;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Invoices
         */
        public $invoices;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\InvoicesItems
         */
        public $invoicesItems;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\InvoicesMetafields
         */
        public $invoicesMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Languages
         */
        public $languages;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Metafields
         */
        public $metafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Orders
         */
        public $orders;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\OrdersCredit
         */
        public $ordersCredit;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\OrdersMetafields
         */
        public $ordersMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\OrdersProducts
         */
        public $ordersProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\OrdersCustomstatuses
         */
        public $ordersCustomstatuses;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\OrdersEvents
         */
        public $ordersEvents;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Paymentmethods
         */
        public $paymentmethods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Products
         */
        public $products;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ProductsAttributes
         */
        public $productsAttributes;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ProductsFiltervalues
         */
        public $productsFiltervalues;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ProductsImages
         */
        public $productsImages;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ProductsMetafields
         */
        public $productsMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ProductsRelations
         */
        public $productsRelations;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Quotes
         */
        public $quotes;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\QuotesConvert
         */
        public $quotesConvert;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\QuotesPaymentmethods
         */
        public $quotesPaymentmethods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\QuotesProducts
         */
        public $quotesProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\QuotesShippingmethods
         */
        public $quotesShippingmethods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Redirects
         */
        public $redirects;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Returns
         */
        public $returns;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Reviews
         */
        public $reviews;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Sets
         */
        public $sets;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Shipments
         */
        public $shipments;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShipmentsMetafields
         */
        public $shipmentsMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShipmentsProducts
         */
        public $shipmentsProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Shippingmethods
         */
        public $shippingmethods;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShippingmethodsCountries
         */
        public $shippingmethodsCountries;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShippingmethodsValues
         */
        public $shippingmethodsValues;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Shop
         */
        public $shop;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopCompany
         */
        public $shopCompany;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopJavascript
         */
        public $shopJavascript;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopLimits
         */
        public $shopLimits;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopMetafields
         */
        public $shopMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopScripts
         */
        public $shopScripts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopTracking
         */
        public $shopTracking;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ShopWebsite
         */
        public $shopWebsite;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Subscriptions
         */
        public $subscriptions;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Suppliers
         */
        public $suppliers;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Tags
         */
        public $tags;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\TagsProducts
         */
        public $tagsProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Taxes
         */
        public $taxes;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\TaxesOverrides
         */
        public $taxesOverrides;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Textpages
         */
        public $textpages;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ThemeCategories
         */
        public $themeCategories;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\ThemeProducts
         */
        public $themeProducts;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Tickets
         */
        public $tickets;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\TicketsMessages
         */
        public $ticketsMessages;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Time
         */
        public $time;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Types
         */
        public $types;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\TypesAttributes
         */
        public $typesAttributes;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Variants
         */
        public $variants;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\VariantsMetafields
         */
        public $variantsMetafields;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\VariantsBulk
         */
        public $variantsBulk;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\VariantsMovements
         */
        public $variantsMovements;
        /**
         * @var \MoldersMedia\LightspeedApi\Classes\Resources\Webhooks
         */
        public $webhooks;

        /**
         * @param string $apiKey      The api key
         * @param string $apiSecret   The api secret
         * @param string $apiLanguage The language to use the api in
         * @param string $apiServer   The api server to use test / live
         *
         * @throws ApiClientException
         */
        public function __construct( $apiServer, $apiKey, $apiSecret, $apiLanguage )
        {
            if (!function_exists( 'curl_init' )) {
                throw new ApiClientException( 'WebshopappApiClient needs the CURL PHP extension.' );
            }
            if (!function_exists( 'json_decode' )) {
                throw new ApiClientException( 'WebshopappApiClient needs the JSON PHP extension.' );
            }

            $this->setApiServer( $apiServer );
            $this->setApiKey( $apiKey );
            $this->setApiSecret( $apiSecret );
            $this->setApiLanguage( $apiLanguage );

            $this->registerResources();
        }

        /**
         * @return string
         */
        public function getApiLanguage()
        {
            return $this->apiLanguage;
        }

        /**
         * @param $apiServer
         */
        public function setApiServer( $apiServer )
        {
            $this->apiServer = $apiServer;
        }

        /**
         * @param $apiKey
         */
        public function setApiKey( $apiKey )
        {
            $this->apiKey = $apiKey;
        }

        /**
         * @return string
         */
        public function getApiKey()
        {
            return $this->apiKey;
        }

        /**
         * @param $apiSecret
         */
        public function setApiSecret( $apiSecret )
        {
            $this->apiSecret = $apiSecret;
        }

        /**
         * @return string
         */
        public function getApiSecret()
        {
            return $this->apiSecret;
        }

        /**
         * @param $apiLanguage
         */
        public function setApiLanguage( $apiLanguage )
        {
            $this->apiLanguage = $apiLanguage;
        }

        /**
         * @return string
         */
        public function getApiServer()
        {
            return $this->apiServer;
        }

        /**
         * @return int
         */
        public function getApiCallsMade()
        {
            return $this->apiCallsMade;
        }

        public function registerResources()
        {
            $this->account                   = new Account( $this );
            $this->accountMetafields         = new AccountMetafields( $this );
            $this->accountPermissions        = new AccountPermissions( $this );
            $this->accountRatelimit          = new AccountRatelimit( $this );
            $this->additionalcosts           = new Additionalcosts( $this );
            $this->attributes                = new Attributes( $this );
            $this->blogs                     = new Blogs( $this );
            $this->blogsArticles             = new BlogsArticles( $this );
            $this->blogsArticlesImage        = new BlogsArticlesImage( $this );
            $this->blogsArticlesTags         = new BlogsArticlesTags( $this );
            $this->blogsComments             = new BlogsComments( $this );
            $this->blogsTags                 = new BlogsTags( $this );
            $this->brands                    = new Brands( $this );
            $this->brandsImage               = new BrandsImage( $this );
            $this->catalog                   = new Catalog( $this );
            $this->categories                = new Categories( $this );
            $this->categoriesImage           = new CategoriesImage( $this );
            $this->categoriesProducts        = new CategoriesProducts( $this );
            $this->checkouts                 = new Checkouts( $this );
            $this->checkoutsOrder            = new CheckoutsOrder( $this );
            $this->checkoutsPayment_methods  = new CheckoutsPaymentMethods( $this );
            $this->checkoutsProducts         = new CheckoutsProducts( $this );
            $this->checkoutsShipment_methods = new CheckoutsShipmentMethods( $this );
            $this->checkoutsValidate         = new CheckoutsValidate( $this );
            $this->contacts                  = new Contacts( $this );
            $this->countries                 = new Countries( $this );
            $this->customers                 = new Customers( $this );
            $this->customersLogin            = new CustomersLogin( $this );
            $this->customersMetafields       = new CustomersMetafields( $this );
            $this->customersTokens           = new CustomersTokens( $this );
            $this->dashboard                 = new Dashboard( $this );
            $this->deliverydates             = new Deliverydates( $this );
            $this->discountrules             = new Discountrules( $this );
            $this->discounts                 = new Discounts( $this );
            $this->events                    = new Events( $this );
            $this->external_services         = new ExternalServices( $this );
            $this->files                     = new Files( $this );
            $this->filters                   = new Filters( $this );
            $this->filtersValues             = new FiltersValues( $this );
            $this->groups                    = new Groups( $this );
            $this->groupsCustomers           = new GroupsCustomers( $this );
            $this->invoices                  = new Invoices( $this );
            $this->invoicesItems             = new InvoicesItems( $this );
            $this->invoicesMetafields        = new InvoicesMetafields( $this );
            $this->languages                 = new Languages( $this );
            $this->metafields                = new Metafields( $this );
            $this->orders                    = new Orders( $this );
            $this->ordersCredit              = new OrdersCredit( $this );
            $this->ordersMetafields          = new OrdersMetafields( $this );
            $this->ordersProducts            = new OrdersProducts( $this );
            $this->ordersCustomstatuses      = new OrdersCustomstatuses( $this );
            $this->ordersEvents              = new OrdersEvents( $this );
            $this->paymentmethods            = new Paymentmethods( $this );
            $this->products                  = new Products( $this );
            $this->productsAttributes        = new ProductsAttributes( $this );
            $this->productsFiltervalues      = new ProductsFiltervalues( $this );
            $this->productsImages            = new ProductsImages( $this );
            $this->productsMetafields        = new ProductsMetafields( $this );
            $this->productsRelations         = new ProductsRelations( $this );
            $this->quotes                    = new Quotes( $this );
            $this->quotesConvert             = new QuotesConvert( $this );
            $this->quotesPaymentmethods      = new QuotesPaymentmethods( $this );
            $this->quotesProducts            = new QuotesProducts( $this );
            $this->quotesShippingmethods     = new QuotesShippingmethods( $this );
            $this->redirects                 = new Redirects( $this );
            $this->returns                   = new Returns( $this );
            $this->reviews                   = new Reviews( $this );
            $this->sets                      = new Sets( $this );
            $this->shipments                 = new Shipments( $this );
            $this->shipmentsMetafields       = new ShipmentsMetafields( $this );
            $this->shipmentsProducts         = new ShipmentsProducts( $this );
            $this->shippingmethods           = new Shippingmethods( $this );
            $this->shippingmethodsCountries  = new ShippingmethodsCountries( $this );
            $this->shippingmethodsValues     = new ShippingmethodsValues( $this );
            $this->shop                      = new Shop( $this );
            $this->shopCompany               = new ShopCompany( $this );
            $this->shopJavascript            = new ShopJavascript( $this );
            $this->shopLimits                = new ShopLimits( $this );
            $this->shopMetafields            = new ShopMetafields( $this );
            $this->shopScripts               = new ShopScripts( $this );
            $this->shopTracking              = new ShopTracking( $this );
            $this->shopWebsite               = new ShopWebsite( $this );
            $this->subscriptions             = new Subscriptions( $this );
            $this->suppliers                 = new Suppliers( $this );
            $this->tags                      = new Tags( $this );
            $this->tagsProducts              = new TagsProducts( $this );
            $this->taxes                     = new Taxes( $this );
            $this->taxesOverrides            = new TaxesOverrides( $this );
            $this->textpages                 = new Textpages( $this );
            $this->themeCategories           = new ThemeCategories( $this );
            $this->themeProducts             = new ThemeProducts( $this );
            $this->tickets                   = new Tickets( $this );
            $this->ticketsMessages           = new TicketsMessages( $this );
            $this->time                      = new Time( $this );
            $this->types                     = new Types( $this );
            $this->typesAttributes           = new TypesAttributes( $this );
            $this->variants                  = new Variants( $this );
            $this->variantsMetafields        = new VariantsMetafields( $this );
            $this->variantsBulk              = new VariantsBulk( $this );
            $this->variantsMovements         = new VariantsMovements( $this );
            $this->webhooks                  = new Webhooks( $this );
        }

        /**
         * @param string $url
         * @param array  $payload
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $url, $payload )
        {
            return $this->sendRequest( $url, 'post', $payload );
        }

        /**
         * @param string $url
         * @param array  $params
         *
         * @param null   $resource
         * @return array
         */
        public function read( $url, $params = [], $resource = null )
        {
            return $this->sendRequest( $url, 'get', $params, $resource );
        }

        /**
         * @param string $url
         * @param array  $payload
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $url, $payload )
        {
            return $this->sendRequest( $url, 'put', $payload );
        }

        /**
         * @param string $url
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $url )
        {
            return $this->sendRequest( $url, 'delete' );
        }

        /**
         * @return string
         */
        public function getApiHost()
        {
            if ($this->apiServer == 'live') {
                return self::SERVER_HOST_LIVE;
            } elseif ($this->apiServer == 'local') {
                return self::SERVER_HOST_LOCAL;
            } elseif ($this->apiServer == 'eu1') {
                return self::SERVER_EU1_LIVE;
            } elseif ($this->apiServer == 'us1') {
                return self::SERVER_US1_LIVE;
            }

            return self::SERVER_HOST_TEST;
        }

        /**
         * @throws ApiClientException
         */
        private function checkLoginCredentials()
        {
            if (strlen( $this->getApiKey() ) !== 32 || strlen( $this->getApiSecret() ) !== 32) {
                throw new ApiClientException( 'Invalid login credentials.' );
            }
            if (strlen( $this->getApiLanguage() ) !== 2) {
                throw new ApiClientException( 'Invalid API language.' );
            }
        }


        /**
         * @param string $resourceUrl
         * @param array  $params
         *
         * @return string
         */
        private function getUrl( $resourceUrl, $params = null )
        {
            $apiHost = $this->getApiHost();


            $apiHostParts     = parse_url( $apiHost );
            $resourceUrlParts = parse_url( $resourceUrl );

            $apiUrl = $apiHostParts['scheme'] . '://' . $this->getApiKey() . ':' . $this->getApiSecret() . '@' . $apiHostParts['host'] . '/';
            if (isset( $apiHostParts['path'] ) && strlen( trim( $apiHostParts['path'], '/' ) )) {
                $apiUrl .= trim( $apiHostParts['path'], '/' ) . '/';
            }
            $apiUrl .= $this->getApiLanguage() . '/' . $resourceUrlParts['path'] . '.json';

            if (isset( $resourceUrlParts['query'] )) {
                return $apiUrl . '?' . $resourceUrlParts['query'];
            } elseif ($params && is_array( $params )) {
                return $apiUrl . '?' . $this->parseQueryParameter( $params );
            }

            return $apiUrl;
        }

        /**
         * Invoke the Webshopapp API.
         *
         * @param string $url     The resource url (required)
         * @param string $method  The http method (default 'get')
         * @param array  $payload The query/post data
         * @param null   $resource
         *
         * @return mixed The decoded response object
         */
        private function sendRequest( $url, $method, $payload = null, $resource = null )
        {
            $this->checkLoginCredentials();

            $client = $this->makeRequest( $url, $method, $payload, $resource );

            $responseBody = json_decode( $client->getBody()->getContents(), true );

            $this->apiCallsMade++;

            if ($responseBody && preg_match( '/^checkout/i', $url ) !== 1) {
                $responseBody = array_shift( $responseBody );
            }

            return $responseBody;
        }

        /**
         * @param array $params
         * @return string
         */
        private function parseQueryParameter( array $params )
        {
            $queryParameters = [];

            foreach ($params as $key => $value) {
                if (!is_array( $value )) {
                    $queryParameters[] = $key . '=' . urlencode( $value );
                }
            }

            return implode( '&', $queryParameters );
        }

        /**
         * @param $url
         * @param $method
         * @param $payload
         * @return array
         * @throws ApiClientException
         */
        private function prepareCurlOptions( $url, $method, $payload ): array
        {
            if ($method == 'post' || $method == 'put') {
                if (!$payload || !is_array( $payload )) {
                    throw new ApiClientException( 'Invalid payload', 100 );
                }

                $curlOptions = [
                    CURLOPT_URL           => $this->getUrl( $url ),
                    CURLOPT_CUSTOMREQUEST => strtoupper( $method ),
                    CURLOPT_HTTPHEADER    => [ 'Content-Type: application/json' ],
                    CURLOPT_POSTFIELDS    => json_encode( $payload ),
                ];
            } elseif ($method == 'delete') {
                $curlOptions = [
                    CURLOPT_URL           => $this->getUrl( $url ),
                    CURLOPT_CUSTOMREQUEST => 'DELETE',
                ];
            } else {
                $curlOptions = [
                    CURLOPT_URL => $this->getUrl( $url, $payload ),
                ];
            }

            $curlOptions += [
                CURLOPT_HEADER         => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_USERAGENT      => 'WebshopappApiClient/' . self::CLIENT_VERSION . ' (PHP/' . phpversion() . ')',
                CURLOPT_SSLVERSION     => 6,
            ];

            return $curlOptions;
        }

        /**
         * @param $url
         * @param $method
         * @param $payload
         * @param $resource
         * @return \GuzzleHttp\Psr7\Response
         * @throws ApiLimitReachedException
         */
        private function makeRequest( $url, $method, $payload, $resource ): Response
        {
            $uri = $this->getUrl( $url );

            try {
                return ( new Client() )
                    ->request( $method, $uri, [
                        'curl' => $this->prepareCurlOptions( $url, $method, $payload )
                    ] );
            } catch( ClientException $e ) {
                $error = json_decode( $e->getResponse()->getBody()->getContents(), true );

                $callsLeft      = $this->extractCallsLeft( $e->getResponse() );
                $secondForReset = $this->extractResetTime( $e->getResponse() );

                if (!$this->sleepMax) {
                    $this->throwErrorException( $error['error'], $resource, $secondForReset, $payload );
                }

                $this->handleDelay( $callsLeft, $secondForReset );

                return $this->makeRequest( $uri, $method, $payload, $resource );
            }
        }

        /**
         * @param array  $error
         * @param string $resource
         * @param        $limitReset
         * @param array  $payload
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         */
        private function throwErrorException( $error, $resource, $limitReset, $payload )
        {
            if (array_key_exists( 'message', $error )) {

                $message = $error['message'];

                if ($message == self::ERRORS_TOO_MANY_REQUESTS) {
                    throw new ApiLimitReachedException( $limitReset, $payload, $resource );
                }

                throw new ApiClientException( $message );
            }

            throw new ApiClientException( 'Unknown error' );
        }

        /**
         * @param $callsLeft
         * @param $resetMinute
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         */
        private function handleDelay( $callsLeft, $resetMinute )
        {
            if (( $this->sleepMax === 0 ) || ( $callsLeft <= 0 && $resetMinute < $this->sleepMax )) {
                sleep( $resetMinute + $this->extraSleepTime );

                return;
            }

            throw new ApiSleepTimeException( 'Could not sleep. Increase sleep ratio' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        private function extractCallsLeft( $responseInterface )
        {
            return $this->extractFirstParameterFromHeader( $responseInterface, 'X-RateLimit-Remaining' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        private function extractResetTime( $responseInterface )
        {
            return $this->extractFirstParameterFromHeader( $responseInterface, 'X-RateLimit-Reset' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @param string                              $header
         * @return int
         */
        private function extractFirstParameterFromHeader( $responseInterface, $header )
        {
            $limitReset = $responseInterface->getHeader( $header )[0];

            [ $resetMinute ] = explode( '/', $limitReset );

            return (int) $resetMinute;
        }

        private function getAuthCredentials()
        {
            return [
                $this->getApiKey(),
                $this->getApiSecret()
            ];
        }
    }