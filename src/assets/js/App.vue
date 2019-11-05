<template>
  <v-app id="keep">
    <v-app-bar
            app
            clipped-left
            color="white"
    >
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <span class="title ml-3 mr-5">FORE&nbsp;<span class="font-weight-light">Gateway</span></span>
      <v-btn
              icon
              @click.stop="mini = !mini"
      ><v-icon>navigate_before</v-icon>
      </v-btn>
      <div class="flex-grow-1"></div>
      <v-btn text v-if="isAuthenticated" v-on:click="logOut">
        <v-icon>person</v-icon> Logout
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer
            v-model="drawer"
            app
            clipped
            color="white lighten-4"
            :mini-variant.sync="mini"
    >
      <v-list
              dense
              class="white lighten-4"
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
                  :to="navigator.getUri(item.link)"
          >
            <v-list-item-action>
              <v-icon >{{ item.icon.mdi }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="grey--text">
                {{ item.name }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-content>
      <v-container
              fluid
              class="white lighten-4"
      >
        <router-view></router-view>

      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  import Auth from './services/Auth';
  import Navigator from './services/Navigator';
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: true,
      mini: true,
      navigator:Navigator,
      items: Navigator.getNav(),
      isAuthenticated:false,
    }),
    mounted() {
      Auth.login();
      this.isAuthenticated = !!sessionStorage.getItem(Auth.API_KEY);
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
