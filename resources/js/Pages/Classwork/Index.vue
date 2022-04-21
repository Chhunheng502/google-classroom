 <template>
    <DashboardLayout>
        <template v-slot:header_title>
            Tasks
        </template>
        <template v-slot:header_tool>
            <ClassworkDialog ref="classworkDialog">
                <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            color="blue-grey"
                            class="ma-2 white--text"
                            v-bind="attrs"
                            v-on="on"
                        >
                            Create
                            <v-icon
                                right
                                dark
                            >
                                mdi-plus
                            </v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item
                            v-for="title in ['Material', 'Assignment', 'Quiz', 'Question']"
                            :key="title"
                            link
                            @click="$refs.classworkDialog.show(title)"
                        >
                            <v-list-item-title>{{ title }}</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </ClassworkDialog>
        </template>

        <template v-slot:content>
            <ClassworkPanels :items="classworks.noTopic.listItems"></ClassworkPanels>
            <div v-for="topic in classworks.topics">
                <v-toolbar
                    flat
                    prominent
                    dense
                    class="bg-light"
                >
                    <v-toolbar-title>{{ topic.name }}</v-toolbar-title>
                </v-toolbar>
                <v-divider></v-divider>
                <ClassworkPanels :items="topic.contents"></ClassworkPanels>
            </div>
        </template>
    </DashboardLayout>
</template>

<script>
import { mapGetters } from 'vuex'

import DashboardLayout from '@/Layout/DashboardLayout'
import ClassworkPanels from '@/Components/Classwork/Panels'
import ClassworkDialog from '@/Components/Classwork/Dialog'

export default {
    components: {
        DashboardLayout,
        ClassworkPanels,
        ClassworkDialog
    },

    computed: {
        ...mapGetters([
            'classworks'
        ])
    },

    mounted() {
        this.$store.dispatch('fetchClassworks', {id: 1})
    },
}
</script>