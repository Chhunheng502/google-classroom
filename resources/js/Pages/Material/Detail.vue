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
                    <v-toolbar-title>Topic 1</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <UploadDialog></UploadDialog>
                </v-toolbar>
                <v-divider></v-divider>
                <v-row class="my-3">
                    <v-col
                        v-for="attachment in [1, 2, 3, 4]"
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
                <v-divider></v-divider>
                <CommentControl></CommentControl>
                <CommentContainer></CommentContainer>
            </v-container>
        </template>
    </DashboardLayout>
</template>

<script>
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
}
</script>