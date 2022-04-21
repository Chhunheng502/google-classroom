 <template>
    <DashboardLayout>
        <template v-slot:header_title>
            Materials
        </template>

        <template v-slot:content>
            <v-container>
                <v-toolbar
                    flat
                    prominent
                    dense
                    class="bg-light"
                >
                    <v-toolbar-title>{{ classwork.title }}</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <UploadDialog></UploadDialog>
                </v-toolbar>
                <v-divider></v-divider>
                <p>{{ classwork.description }}</p>
                <v-container>
                    <v-row>
                        <v-col
                            v-for="attachment in JSON.parse(classwork.attachments)"
                            :key="attachment"
                            cols="12"
                            sm="12"
                            md="6"
                            lg="4"
                        >
                            <v-card>
                                <v-img
                                    height="100px"
                                    :src="attachment"
                                >
                                </v-img>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
                <v-divider></v-divider>
                <CommentControl></CommentControl>
                <CommentContainer></CommentContainer>
            </v-container>
        </template>
    </DashboardLayout>
</template>

<script>
import { mapGetters } from 'vuex'

import DashboardLayout from '@/Layout/DashboardLayout'
import UploadDialog from '@/Components/UploadDialog'
import CommentControl from '@/Components/Comment/Control'
import CommentContainer from '@/Components/Comment/Container'

export default {
    components: {
        DashboardLayout,
        UploadDialog,
        CommentControl,
        CommentContainer
    },

    computed: {
        ...mapGetters([
            'classwork'
        ])
    },

    mounted() {
        let n = window.location.pathname.split("/");

        this.$store.dispatch('showClasswork', {
                classroom: {id: 1},
                classwork: {id: n[n.length - 1], type: n[n.length - 2]}
            }
        )
    }
}
</script>