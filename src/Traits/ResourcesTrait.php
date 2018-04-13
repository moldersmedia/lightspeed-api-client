<?php

    /**
     * This trait provides all resource registering to keep the API client nice and clean
     */

    namespace MoldersMedia\LightspeedApi\Traits;

    use MoldersMedia\LightspeedApi\Classes\Resources\Account;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountPermissions;
    use MoldersMedia\LightspeedApi\Classes\Resources\AccountRateLimit;
    use MoldersMedia\LightspeedApi\Classes\Resources\AdditionalCosts;
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
    use MoldersMedia\LightspeedApi\Classes\Resources\DiscountRules;
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
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersCustomstatuses;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersEvents;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\OrdersProducts;
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
    use MoldersMedia\LightspeedApi\Classes\Resources\ShippingMethods;
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
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsBulk;
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsMetafields;
    use MoldersMedia\LightspeedApi\Classes\Resources\VariantsMovements;
    use MoldersMedia\LightspeedApi\Classes\Resources\Webhooks;

    trait ResourcesTrait
    {
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
         *
         */
        public function registerResources()
        {
            /**
             * The parameter $self is assigned for code hinting, inspections and all other IDE
             * options to ignore errors
             */
            /** @var \MoldersMedia\LightspeedApi\Classes\Api\ApiClient $self */
            $self = $this;

            $this->account                   = new Account($self);
            $this->accountMetafields         = new AccountMetafields($self);
            $this->accountPermissions        = new AccountPermissions($self);
            $this->accountRatelimit          = new AccountRateLimit($self);
            $this->additionalcosts           = new AdditionalCosts($self);
            $this->attributes                = new Attributes($self);
            $this->blogs                     = new Blogs($self);
            $this->blogsArticles             = new BlogsArticles($self);
            $this->blogsArticlesImage        = new BlogsArticlesImage($self);
            $this->blogsArticlesTags         = new BlogsArticlesTags($self);
            $this->blogsComments             = new BlogsComments($self);
            $this->blogsTags                 = new BlogsTags($self);
            $this->brands                    = new Brands($self);
            $this->brandsImage               = new BrandsImage($self);
            $this->catalog                   = new Catalog($self);
            $this->categories                = new Categories($self);
            $this->categoriesImage           = new CategoriesImage($self);
            $this->categoriesProducts        = new CategoriesProducts($self);
            $this->checkouts                 = new Checkouts($self);
            $this->checkoutsOrder            = new CheckoutsOrder($self);
            $this->checkoutsPayment_methods  = new CheckoutsPaymentMethods($self);
            $this->checkoutsProducts         = new CheckoutsProducts($self);
            $this->checkoutsShipment_methods = new CheckoutsShipmentMethods($self);
            $this->checkoutsValidate         = new CheckoutsValidate($self);
            $this->contacts                  = new Contacts($self);
            $this->countries                 = new Countries($self);
            $this->customers                 = new Customers($self);
            $this->customersLogin            = new CustomersLogin($self);
            $this->customersMetafields       = new CustomersMetafields($self);
            $this->customersTokens           = new CustomersTokens($self);
            $this->dashboard                 = new Dashboard($self);
            $this->deliverydates             = new Deliverydates($self);
            $this->discountrules             = new DiscountRules($self);
            $this->discounts                 = new Discounts($self);
            $this->events                    = new Events($self);
            $this->external_services         = new ExternalServices($self);
            $this->files                     = new Files($self);
            $this->filters                   = new Filters($self);
            $this->filtersValues             = new FiltersValues($self);
            $this->groups                    = new Groups($self);
            $this->groupsCustomers           = new GroupsCustomers($self);
            $this->invoices                  = new Invoices($self);
            $this->invoicesItems             = new InvoicesItems($self);
            $this->invoicesMetafields        = new InvoicesMetafields($self);
            $this->languages                 = new Languages($self);
            $this->metafields                = new Metafields($self);
            $this->orders                    = new Orders($self);
            $this->ordersCredit              = new OrdersCredit($self);
            $this->ordersMetafields          = new OrdersMetafields($self);
            $this->ordersProducts            = new OrdersProducts($self);
            $this->ordersCustomstatuses      = new OrdersCustomstatuses($self);
            $this->ordersEvents              = new OrdersEvents($self);
            $this->paymentmethods            = new Paymentmethods($self);
            $this->products                  = new Products($self);
            $this->productsAttributes        = new ProductsAttributes($self);
            $this->productsFiltervalues      = new ProductsFiltervalues($self);
            $this->productsImages            = new ProductsImages($self);
            $this->productsMetafields        = new ProductsMetafields($self);
            $this->productsRelations         = new ProductsRelations($self);
            $this->quotes                    = new Quotes($self);
            $this->quotesConvert             = new QuotesConvert($self);
            $this->quotesPaymentmethods      = new QuotesPaymentmethods($self);
            $this->quotesProducts            = new QuotesProducts($self);
            $this->quotesShippingmethods     = new QuotesShippingmethods($self);
            $this->redirects                 = new Redirects($self);
            $this->returns                   = new Returns($self);
            $this->reviews                   = new Reviews($self);
            $this->sets                      = new Sets($self);
            $this->shipments                 = new Shipments($self);
            $this->shipmentsMetafields       = new ShipmentsMetafields($self);
            $this->shipmentsProducts         = new ShipmentsProducts($self);
            $this->shippingmethods           = new ShippingMethods($self);
            $this->shippingmethodsCountries  = new ShippingmethodsCountries($self);
            $this->shippingmethodsValues     = new ShippingmethodsValues($self);
            $this->shop                      = new Shop($self);
            $this->shopCompany               = new ShopCompany($self);
            $this->shopJavascript            = new ShopJavascript($self);
            $this->shopLimits                = new ShopLimits($self);
            $this->shopMetafields            = new ShopMetafields($self);
            $this->shopScripts               = new ShopScripts($self);
            $this->shopTracking              = new ShopTracking($self);
            $this->shopWebsite               = new ShopWebsite($self);
            $this->subscriptions             = new Subscriptions($self);
            $this->suppliers                 = new Suppliers($self);
            $this->tags                      = new Tags($self);
            $this->tagsProducts              = new TagsProducts($self);
            $this->taxes                     = new Taxes($self);
            $this->taxesOverrides            = new TaxesOverrides($self);
            $this->textpages                 = new Textpages($self);
            $this->themeCategories           = new ThemeCategories($self);
            $this->themeProducts             = new ThemeProducts($self);
            $this->tickets                   = new Tickets($self);
            $this->ticketsMessages           = new TicketsMessages($self);
            $this->time                      = new Time($self);
            $this->types                     = new Types($self);
            $this->typesAttributes           = new TypesAttributes($self);
            $this->variants                  = new Variants($self);
            $this->variantsMetafields        = new VariantsMetafields($self);
            $this->variantsBulk              = new VariantsBulk($self);
            $this->variantsMovements         = new VariantsMovements($self);
            $this->webhooks                  = new Webhooks($self);
        }
    }