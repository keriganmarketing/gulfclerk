<header class="top">
    <div class="top-container">
        <div class="container d-md-flex justify-content-between">
            <div class="site-branding text-left d-inline-flex" >
                <div class="seal">
                    <img class="logo" src="/themes/wordplate/assets/images/seal.png" class="img-fluid" alt="Gulf County, Florida Circuit Court Seal" >
                </div>
                <div class="logo-text">
                    <p class="clerk-name">Rebecca L. (Becky) Norris</p>
                    <p>Gulf County, Florida<br>Clerk of Court</p>
                </div>
            </div>
            <div class="header-right d-none d-md-flex flex-column justify-content-center">
                <div class="text-sizer d-flex justify-content-end align-items-center py-2">
                    <label class="m-0 p-0 mx-1">TEXT SIZE:</label> 
                    <button @click="increaseTextSize" class="btn btn-outline-secondary round mx-1"><span class="sr-only">Make text bigger</span><i class="fa fa-plus" aria-hidden="true"></i></button> 
                    <button @click="resetTextSize" class="btn btn-outline-secondary round mx-1 reset-button"><span class="sr-only">Reset text size</span><i class="fa" aria-hidden="true">100%</i></button> 
                    <button @click="decreaseTextSize" class="btn btn-outline-secondary round mx-1"><span class="sr-only">Make text smaller</span><i class="fa fa-minus" aria-hidden="true"></i></button>
                </div>
                <div class="search-box py-2">
                    {{ get_search_form() }}
                </div>
            </div>
        </div>
    </div>
    <div role="navigation" class="topnav flex-wrap navbar navbar-expand-lg bg-primary sizable" >
        <div class="container d-flex flex-wrap align-items-center">
            <p class="todays-date d-block mr-lg-auto text-center text-md-left text-white m-0 px-1 no-break">{{ date('F j, Y') }}</p>
            <button @click="toggleSearchBox" 
                class="d-lg-none btn btn-sm"
                :class="{
                    'btn-primary': !searchBoxOpen,
                    'btn-white': searchBoxOpen
                }" >
                SEARCH <i 
                        class="fa" 
                        :class="{ 
                            'fa-search': !searchBoxOpen, 
                            'fa-times': searchBoxOpen 
                        }" 
                        aria-hidden="true"
                        ></i>
            </button>
            <button @click="toggleMenu" 
                class="d-lg-none btn btn-sm" 
                :class="{
                    'btn-primary': !mobileMenuOpen,
                    'btn-white': mobileMenuOpen
                }"
                type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                MENU <i
                        class="fa" 
                        :class="{
                            'fa-bars': !mobileMenuOpen,
                            'fa-times': mobileMenuOpen
                        }"
                        aria-hidden="true"
                    ></i>
            </button>
            <div class="main-navigation collapse navbar-collapse flex-grow-1">
                <main-menu :main-nav="{{ website_menu('main-navigation') }}" class="navbar-nav ml-auto"></main-menu>
                <a @click="toggleHowDoI" @mouseover="howDoIOpen = true"
                    class="nav-link bg-white text-primary font-weight-bold sizeable-element" 
                >How Do I...</a>
            </div>
            <button @click="toggleMobileHowDoI" 
                class="d-lg-none btn btn-sm"
                :class="{
                    'btn-primary': !mobileHowDoIOpen,
                    'btn-white': mobileHowDoIOpen
                }"
                >HOW Do I... <i
                    class="fa" 
                    :class="{
                        'fa-chevron-down': !mobileHowDoIOpen,
                        'fa-chevron-up': mobileHowDoIOpen
                    }"
                    aria-hidden="true"
                ></i>
            </button>
        </div>
    </div>
    <div v-if="howDoIOpen" class="mobile-menu sizable" ref="howdoiMenuContainer" :class="{ 'open': howDoIOpen }" >
        <div class="container d-none d-lg-block">
            <mega-menu :main-nav="{{ website_menu(5) }}" @mousedout="toggleHowDoI" ></mega-menu>
        </div>
    </div>
    <div v-if="mobileHowDoIOpen" class="mobile-menu" ref="howdoiMenuContainer" :class="{ 'open': mobileHowDoIOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu(5) }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer" :class="{ 'open': mobileMenuOpen }" >
        <mobile-menu :mobile-nav="{{ website_menu('mobile-navigation') }}" class="navbar-nav" ></mobile-menu>
    </div>
    <div v-if="searchBoxOpen" class="mobile-search-box" ref="mobileSearchBoxContainer" :class="{ 'open': searchBoxOpen }" >
        <search-box></search-box>
    </div>
</header>
<div class="top-pad"></div>