<template>
    <v-container fluid>
        <v-row
                align="center"
                justify="center"
                class="grey lighten-5">
            <v-col cols="12" md="3">
                <v-form
                        ref="form"
                        v-model="valid"
                        :lazy-validation="lazy"
                >
                    <v-text-field
                            v-model="host"
                            :rules="hostRules"
                            label="Host URL"
                            required
                    ></v-text-field>
                    <v-text-field
                            v-model="keyId"
                            :rules="KeyIdRules"
                            label="KeyId"
                            required
                    ></v-text-field>

                    <v-text-field
                            v-model="keySecret"
                            :rules="keySecretRules"
                            :type="'password'"
                            label="Password / keySecret"
                            required
                    ></v-text-field>
                    <v-btn
                            color="success"
                            class="mr-4"
                            @click="login"
                    >
                        Login
                    </v-btn>
                </v-form>
            </v-col>
        </v-row>
    </v-container>

</template>

<script>
    import {Api} from '../services/Api';
    import axios from 'axios';
    import Auth from '../services/Auth';

    export default {
        name: "Login",
        data: () => ({
            valid: true,
            host: '',
            keyId: '',
            keySecret: '',
            // consumerId: '',
            hostRules: [
                v => !!v || 'Password is required',
                // v => (v && v.length <= 10) || 'Name must be less than 10 characters',
            ],
            keySecretRules: [
                v => !!v || 'Password is required',
                // v => (v && v.length <= 10) || 'Name must be less than 10 characters',
            ],

            KeyIdRules: [
                v => !!v || 'KeyId is required',
                // v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
            lazy: false,
            api: new Api(),

            afterLoginRL: '',
        }),
        mounted() {
            this.afterLoginRL = this.$route.query.to || 'dashboard'
        },
        methods: {
            validate() {
                if (this.$refs.form.validate()) {
                    this.snackbar = true
                }
            },
            login() {
                // 1. get basic authentication info
                // 2. request api token
                // 3. store api token to localStorage

                if (this.$refs.form.validate()) {

                    // let key = btoa(`${credential.username}:${credential.password}`);
                    let key = `${this.keyId}:${this.keySecret}`;
                    let http = axios.create({
                        baseURL: this.host,
                        headers: {
                            Authorization: `apiKey ${key}`
                        }
                    })
                    http.get(`/scopes`).then(() => {
                        sessionStorage.setItem(Auth.EG_API_KEY, key);
                        sessionStorage.setItem(Auth.EG_HOST, this.host);
                        this.$event.$emit('authentication-changed', true);
                        this.$router.push(this.afterLoginRL);
                    })

                }


            },
            // resetValidation () {
            //     this.$refs.form.resetValidation()
            // },
        },
    }
</script>

<style scoped>

</style>
