<template>
    <v-app id="keep">
        <v-app-bar
                app
                clipped-left
        >
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <span class="title ml-3 mr-5">FORE&nbsp;<span class="font-weight-light">Gateway</span></span>
            <v-btn
                    icon
                    @click.stop="mini = !mini"
            >
                <v-icon>navigate_before</v-icon>
            </v-btn>
            <div class="flex-grow-1"></div>
            <v-btn text v-if="isAuthenticated" v-on:click="logOut">
                <v-icon>person</v-icon>
                Logout
            </v-btn>
        </v-app-bar>

        <v-navigation-drawer
                v-model="drawer"
                app
                clipped
                :mini-variant.sync="mini"
        >
            <v-list
                    dense
            >
                <template v-for="(item, i) in items">
                    <v-list-group
                            v-if="item.hasSubItems"
                            no-action
                            :prepend-icon="item.icon.mdi"
                            value="true"
                    >
                        <template v-slot:activator>
                            <v-list-item-title>{{item.name}}</v-list-item-title>
                        </template>
                        <item-nav v-for="(subItem, i) in item.subItems" :key="i" v-bind:item="subItem"></item-nav>
                    </v-list-group>
                    <item-nav v-else :key="i" v-bind:item="item"></item-nav>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <v-container
                    fluid
            >
                <router-view></router-view>

            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import Auth from './services/Auth';
    import NavigatorApi from './services/Navigator';
    import Item from './components/nav/Item';

    // import {Dashboard} from '@asset/asset';
    //
    // console.log(Dashboard);
    export default {
        components: {
            'item-nav': Item
        },
        props: {
            source: String,
        },
        data: () => ({
            drawer: true,
            mini: false,
            items: [],
            navigatorApi: new NavigatorApi(),
            isAuthenticated: false,
        }),
        mounted() {
            Auth.login();
            this.isAuthenticated = Auth.isAuthenticated();
            this.$event.$on('authentication-changed', (status) => {
                this.isAuthenticated = status;
            })
            this.buildNavTree();
        },
        methods: {
            buildNavTree() {
                this.navigatorApi.getNav().then(
                    items => {
                        this.items = items;

                    }
                )
            },
            logOut() {
                Auth.logOut();
                this.$router.push({name: Auth.LOGIN_ROUTE});
                this.$event.$emit('authentication-changed', false);
            },
        }

    }
</script>

<style>
    /*#keep .v-navigation-drawer__border {*/
    /*  display: none*/
    /*}*/
</style>
