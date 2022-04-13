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
                            v-for="title in ['Assignment', 'Quiz', 'Question']"
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
            <ClassworkPanels :items="materials"></ClassworkPanels>
            <div v-for="i in 5">
                <v-toolbar
                    flat
                    prominent
                    dense
                    class="bg-light"
                >
                    <v-toolbar-title>Topic 1</v-toolbar-title>
                </v-toolbar>
                <v-divider></v-divider>
                <ClassworkPanels :items="materials"></ClassworkPanels>
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
            'materials'
        ])
    },

    methods: {
        deletePost(material) {
            this.$store.dispatch('deleteMaterial', material)
        }
    },

    mounted() {
        this.$store.dispatch('fetchMaterials', {id: 1})
    },
}
</script>