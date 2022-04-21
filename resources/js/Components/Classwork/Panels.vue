<template>
    <v-expansion-panels>
        <ClassworkDialog ref="classworkDialog"></ClassworkDialog>
        <v-expansion-panel
            v-for="(item, i) in items"
            :key="item.type + item.id"
        >
            <v-expansion-panel-header>
                <h6 class="fw-bold">{{ item.title }}</h6>
                <template v-slot:actions>
                    <div class="d-flex align-items-center">
                        <v-badge
                            inline
                            :color="mapColor(item.type)"
                            :content="itemTitleMapping(item.type)"
                        >
                        </v-badge>
                        <v-menu
                            bottom
                            left
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    dark
                                    icon
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon>mdi-dots-vertical</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item
                                    link
                                    @click="$refs.classworkDialog.show(itemTitleMapping(item.type), item)"
                                >
                                    <v-list-item-title>Edit</v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    link
                                    @click="deleteItem(item)"
                                >
                                    <v-list-item-title>Delete</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
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
                    :href="`/cl/${1}/${pluralize(item.type)}/${item.id}`"
                >
                    View Detail
                </v-btn>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
import Pluralize from 'pluralize';

import ClassworkDialog from '@/Components/Classwork/Dialog'

export default ({
    components: {
        ClassworkDialog
    },

    props: {
        items: Array
    },

    methods: {
        mapColor(type) {
            if (type == 'material') {
                return '#3193de';
            } else if (type == 'assignment') {
                return '#dba72e';
            } else if (type == 'quiz') {
                return '#a32fba';
            } else {
                return '#34b362'
            }
        },

        itemTitleMapping(type) {
            if (type == 'saq') {
                return 'Question'
            }

            return type[0].toUpperCase() + type.slice(1);
        },
        
        pluralize(word) {
            return Pluralize(word)
        },

        deleteItem(item) {
            this.$store.dispatch('deleteClasswork', {
                    classroom: {id: 1},
                    classwork: {topic_id: item.topic_id, id: item.id, type: this.pluralize(item.type)}
                }
            )
        }
    },
})
</script>
