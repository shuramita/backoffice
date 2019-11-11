<template>
    <v-list-item
            key="item.routeName"
            :to="getUri(item.link)"
    >
        <v-list-item-action>
            <v-icon>{{ item.icon.mdi }}</v-icon>
        </v-list-item-action>
        <v-list-item-content>
            <v-list-item-title>
                {{ item.name }}
            </v-list-item-title>
        </v-list-item-content>
    </v-list-item>
</template>

<script>
    import NavigatorApi from '../../services/Navigator';

    export default {
        name: "Item",
        props: ['item'],
        data: () => {
            return {}
        },
        methods: {
            getUri: (link) => {
                return NavigatorApi.getUri(link)
            }
        }
    }
</script>

<style scoped>

</style>
