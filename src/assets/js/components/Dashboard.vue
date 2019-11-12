<template>
    <div>
        <breadcrumb></breadcrumb>
        <v-card flat class="mx-3" color="rgb(0, 0, 0, 0)">
            <v-card-actions>
                <h1 class="heading">Dashboard</h1>
                <v-spacer></v-spacer>
                <v-btn color="primary">
                    <v-icon>edit</v-icon>
                    Edit Dashboard
                </v-btn>
            </v-card-actions>

        </v-card>
        <v-row>
            <v-col>
                <v-card class="mx-5 pa-5" color="success">
                    <v-card-actions class="pa-0">
                        <h5>Total Revenue</h5>
                        <v-spacer></v-spacer>
                        <v-icon>more_vert</v-icon>
                    </v-card-actions>
                    <v-card-title>
                        <h1>S$ 78k5673,2824</h1>
                    </v-card-title>
                    <v-card-text>
                        <v-sheet
                                color="success">
                            <v-sparkline
                                    :gradient="gradient"
                                    auto-draw
                                    :value="value"
                                    height="100"
                                    padding="24"
                                    stroke-linecap="round"
                                    smooth
                            >
                                <template v-slot:label="item">
                                    ${{ item.value }}
                                </template>
                            </v-sparkline>
                        </v-sheet>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col>
                <v-card class="mx-5 pa-5" dark color="success">
                    <v-card-actions class="pa-0">
                        <h5>Total Revenue</h5>
                        <v-spacer></v-spacer>
                        <v-icon>more_vert</v-icon>
                    </v-card-actions>
                    <v-card-title>
                        <h1>S$ 78k5673,2824</h1>
                    </v-card-title>
                    <v-card-text>
                        <v-sheet color="rgba(0, 0, 0, .12)">
                            <v-sparkline
                                    :value="value"
                                    color="rgba(255, 255, 255, .7)"
                                    height="100"
                                    padding="24"
                                    stroke-linecap="round"
                                    smooth
                            >
                                <template v-slot:label="item">
                                    ${{ item.value }}
                                </template>
                            </v-sparkline>
                        </v-sheet>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </div>

</template>

<script>

    import breadcrumb from "./breadcrumb";

    export default {
        components: {
            'breadcrumb': breadcrumb
        },
        data: () => ({
            gradient: ['#f72047', '#ffd200', '#1feaea'],
            value: [
                423,
                446,
                675,
                510,
                590,
                610,
                760,
            ],
        }),
    }
</script>
<style>
    .notification {
        background: grey;
    }
</style>
