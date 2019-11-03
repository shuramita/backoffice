<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!Auth::guest())
        <meta name="api-token" content="{{Auth::user()->api_token}}">
    @endif
    <title>RealEstateDoc Framework</title>
    {{--    @include('partials.vendor-bundle')--}}
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('scripts')
    @stack('styles')
    @include('partials.ga')

</head>
<body class="@yield('body_class')">
<div id="app">
    <v-app id="inspire">
        <v-app-bar
                app
                clipped-left
                color="amber"
        >
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <span class="title ml-3 mr-5">Google&nbsp;<span class="font-weight-light">Keep</span></span>
            <v-text-field
                    solo-inverted
                    flat
                    hide-details
                    label="Search"
                    prepend-inner-icon="search"
            ></v-text-field>
            <v-spacer></v-spacer>
        </v-app-bar>

        <v-navigation-drawer
                v-model="drawer"
                app
                clipped
                color="grey lighten-4"
        >
            <v-list
                    dense
                    class="grey lighten-4"
            >
                <template v-for="(item, i) in items">
                    <v-layout
                            v-if="item.heading"
                            :key="i"
                            row
                            align-center
                    >
                        <v-flex xs6>
                            <v-subheader v-if="item.heading">
                                {{ item.heading }}
                            </v-subheader>
                        </v-flex>
                        <v-flex
                                xs6
                                class="text-xs-right"
                        >
                            <v-btn
                                    small
                                    text
                            >edit</v-btn>
                        </v-flex>
                    </v-layout>
                    <v-divider
                            v-else-if="item.divider"
                            :key="i"
                            dark
                            class="my-3"
                    ></v-divider>
                    <v-list-item
                            v-else
                            :key="i"
                            @click=""
                    >
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="grey--text">
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <v-container
                    fluid
                    fill-height
                    class="grey lighten-4"
            >
                <v-layout
                        justify-center
                        align-center
                >
                    <v-flex shrink>
                        <v-tooltip right>
                            <template v-slot:activator="{ on }">
                                <v-btn
                                        :href="source"
                                        icon
                                        large
                                        target="_blank"
                                        v-on="on"
                                >
                                    <v-icon large>mdi-code-tags</v-icon>
                                </v-btn>
                            </template>
                            <span>Source</span>
                        </v-tooltip>
                        <v-tooltip right>
                            <template v-slot:activator="{ on }">
                                <v-btn
                                        icon
                                        large
                                        href="https://codepen.io/johnjleider/pen/zgxbYO"
                                        target="_blank"
                                        v-on="on"
                                >
                                    <v-icon large>mdi-codepen</v-icon>
                                </v-btn>
                            </template>
                            <span>Codepen</span>
                        </v-tooltip>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</div>
{{--Scripts--}}
<script src="{{ mix('/js/backoffice/backoffice.vuetify.js') }}" defer></script>
@yield('scripts')

{{--Styles--}}
@yield('styles')
<link href="{{ mix('/css/backoffice/backoffice.css') }}" rel="stylesheet">
</body>
</html>
