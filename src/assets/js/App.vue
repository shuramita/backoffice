<template>
  <v-app id="keep">
    <v-app-bar
            app
            clipped-left
            color="white"
    >
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <span class="title ml-3 mr-5">FORE&nbsp;<span class="font-weight-light">Gateway</span></span>
      <div class="flex-grow-1"></div>
      <v-btn text v-if="isAuthenticated" v-on:click="logOut">
        <v-icon>person</v-icon> Logout
      </v-btn>
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
          <v-row
                  v-if="item.heading"
                  :key="i"
                  align="center"
          >
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col
                    cols="6"
                    class="text-right"
            >
              <v-btn
                      small
                      text
              >edit</v-btn>
            </v-col>
          </v-row>
          <v-divider
                  v-else-if="item.divider"
                  :key="i"
                  dark
                  class="my-4"
          ></v-divider>
          <v-list-item
                  v-else
                  :key="i"
                  :to="item.link"
          >
            <v-list-item-action>
              <v-icon >{{ item.icon }}</v-icon>
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
              class="grey lighten-4"
      >
        <router-view></router-view>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  import Auth from './services/Auth';

  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
      items: [
        { icon: 'person', text: 'Users', link:'/users' },
        { icon: 'apps', text: 'Apps' , link:'/applications'},
        { icon: 'vpn_key', text: 'Credentials', link:'/credentials' },
        { icon: 'https', text: 'Scopes', link:'/scopes' },
        { icon: 'polymer', text: 'Schemas',link:'/schemas' },
        { icon: 'list', text: 'Policies' },
        { icon: 'beenhere', text: 'Service Endpoints',link:'/service-endpoints' },
        { icon: 'text_rotation_none', text: 'API Endpoints',link:'/api-endpoints' },
        { icon: 'trending_down', text: 'Pipelines', link:'/pipelines' },
      ],
      isAuthenticated:false,

    }),
    mounted() {
      this.isAuthenticated = !!sessionStorage.getItem(Auth.EG_API_KEY);
      this.$event.$on('authentication-changed',(status)=>{
        this.isAuthenticated = status;
      })
    },
    methods: {
      logOut(){
        Auth.logOut();
        this.$router.push({name:Auth.LOGIN_ROUTE});
        this.$event.$emit('authentication-changed',false);
      }
    }

  }
</script>

<style>
  /*#keep .v-navigation-drawer__border {*/
  /*  display: none*/
  /*}*/
</style>
