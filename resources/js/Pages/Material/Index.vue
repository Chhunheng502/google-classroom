 <template>
    <DashboardLayout>
        <template v-slot:header_title>
            Materials
        </template>
        <template v-slot:header_tool>
            <ClassworkDialog ref="classworkDialog">
                <v-btn
                    color="blue-grey"
                    class="ma-2 white--text"
                    @click="$refs.classworkDialog.show('Material')"
                >
                    Create
                    <v-icon
                        right
                        dark
                    >
                        mdi-plus
                    </v-icon>
                </v-btn>
            </ClassworkDialog>
        </template>

        <template v-slot:content>
            <ClassworkPanels :items="materials" :isMaterial="true"></ClassworkPanels>
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
                <ClassworkPanels :items="materials" :isMaterial="true"></ClassworkPanels>
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
        },
    },

    mounted() {
        this.$store.dispatch('fetchMaterials', {id: 1});
    },
}
</script>