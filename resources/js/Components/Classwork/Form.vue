<template>
  <v-list
      three-line
      subheader
    >
      <v-subheader>General</v-subheader>
      <v-form
            ref="form"
            @submit.prevent="submit"
        >
            <v-container fluid>
            <v-row>
                <v-col
                  cols="12"
                  sm="8"
                >
                <v-text-field
                    v-model="form.title"
                    color="purple darken-2"
                    :rules="rules.title"
                    :label="title == 'Question' ? 'Question' : 'Title'"
                    required
                ></v-text-field>
                </v-col>
                <v-col
                  cols="12"
                  sm="4"
                >
                <v-select
                    v-model="form.topic_id"
                    :items="topics"
                    item-text="name"
                    item-value="id"
                    color="pink"
                    label="No Topic"
                    clearable
                    required
                >
                  <template v-slot:prepend-item>
                    <v-list-item link>
                      <TopicDialog>
                        Create Topic
                      </TopicDialog>
                    </v-list-item>
                    <v-divider class="mt-2"></v-divider>
                  </template>
                  
                </v-select>
                </v-col>
                <v-col cols="12">
                <v-textarea
                    v-model="form.description"
                    color="teal"
                >
                    <template v-slot:label>
                    <div>
                        {{ title == 'Question' ? 'Instruction' : 'Description' }} <small>(optional)</small>
                    </div>
                    </template>
                </v-textarea>
                </v-col>
            </v-row>
            </v-container>
        </v-form>
      <v-list>
        <v-icon class="mr-3">mdi-google-drive</v-icon>
        <v-icon class="mr-3">mdi-youtube</v-icon>
        <v-icon class="mr-3">mdi-link-plus</v-icon>
        <v-icon class="mr-3">mdi-tray-arrow-up</v-icon>
      </v-list>
    </v-list>
</template>

<script>
import { mapGetters } from 'vuex'

import TopicDialog from '@/Components/Topic/Dialog'

export default {
  components: {
    TopicDialog
  },

  props: {
    title: String,
    form: Object
  },

  data() {
    return {
      rules: {
          title: [val => (val || '').length > 0 || 'This field is required']
        }
      }
  },

  computed: {
      ...mapGetters([
          'topics',
          'errors'
      ]),
  },

  mounted() {
    this.$store.dispatch('fetchTopics', {id: 1})
  }
}
</script>