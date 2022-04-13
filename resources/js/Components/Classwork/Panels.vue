<template>
    <v-expansion-panels>
        <v-expansion-panel
            v-for="item in items"
            :key="item.id"
        >
            <v-expansion-panel-header>
                <h6 class="fw-bold">{{ item.title }}</h6>
                <template v-slot:actions>
                    <v-badge
                        inline
                        color="primary"
                        content="Assignment"
                        v-show="!isMaterial"
                    >
                    <!-- NOTE [badge can be different colors] -->
                    </v-badge>
                </template>
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <p>{{ item.description }}</p>
                <v-container>
                    <v-row>
                        <v-card
                            v-for="attachment in JSON.parse(item.attachments)"
                            :key="attachment"
                            class="mx-2"
                            width="150"
                        >
                            <v-img
                                height="100px"
                                :src="attachment"
                            >
                            </v-img>
                        </v-card>
                    </v-row>
                </v-container>
                <v-divider></v-divider>
                <v-btn
                    color="success"
                    link
                    href="/cl/classroom_id/materials/1"
                >
                    View Detail
                </v-btn>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
export default ({
    props: {
        items: Array,
        isMaterial: {
            type: Boolean,
            default: false
        }
    }
})
</script>
