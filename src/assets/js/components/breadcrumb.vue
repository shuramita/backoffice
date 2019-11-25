<template>
    <v-breadcrumbs :items="breadcrumbs">
        <template v-slot:item="props">
            <v-breadcrumbs-item
                    :to="props.item.to"
                    :class="[props.item.disabled && 'disabled']"
            >
                {{ props.item.text }}
            </v-breadcrumbs-item>
        </template>
    </v-breadcrumbs>
</template>

<script>
    export default {
        name: "breadcrumb",
        props: {
            'items': {
                default: function () {
                    return [{}]
                }
            }
        },
        data: () => ({
            breadcrumbs: [
                {
                    text: 'Dashboard',
                    disabled: false,
                    to: {name: 'dashboard'},
                }
            ]
        }),
        mounted() {
            this.items.map(item=>this.breadcrumbs.push(item));
        }
    }
</script>

<style scoped>

</style>
