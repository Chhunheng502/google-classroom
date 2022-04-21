<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on }">
        <div class="text-center">
          <slot></slot>
        </div>
      </template>
      <v-card>
        <v-toolbar
          dark
          color="blue-grey"
        >
          <v-btn
            icon
            dark
            @click="close()"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ onUpdate ? 'Edit' : 'Create' }} {{ title }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="dispatchEvent()"
            >
              {{ onUpdate ? 'Save' : 'Post' }}
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-container fluid>
          <v-row>
            <v-col
              cols="12"
              sm="8"
            >
              <ClassworkForm :title="title" :form="form"></ClassworkForm>
            </v-col>
            <v-col
              cols="12"
              sm="4"
            >
              <ClassworkFormSetting :title="title" :form="form"></ClassworkFormSetting>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import Pluralize from 'pluralize';

import ClassworkForm from './Form.vue'
import ClassworkFormSetting from './FormSetting.vue'

export default {
  components: {
    ClassworkForm,
    ClassworkFormSetting
  },
  
  data () {
    return {
      dialog: false,

      title: '',
      onUpdate: false,
      oldTopic_id: null,

      form: {
        topic_id: null,
        id: '',
        title: '',
        description: '',
        url: 'https://laravel.com/docs/9.x/eloquent-mutators#date-casting',
        attachments: [],
        points: '100',
        due_date: '',
        // FIXME [problem with date not producing exact result - might be due to different timezone]
      }
    }
  },

  methods: {
    show(title, item = null) {

      if (item != null) {
        this.prepareFormForUpdate(item)
      }

      this.dialog = true;
      this.title = title;
    },

    close() {
      this.resetForm()
      this.dialog = false
    },
    
    dispatchEvent() {
      this.handleDateTimeFormat()

      if (this.onUpdate) {
        this.handleChangingTopic()

        this.$store.dispatch('updateClasswork', {
          classroom: {id: 1},
          classwork: {
            id: this.form.id,
            type: this.title == 'Question' ? 'saqs' : Pluralize(this.title.toLowerCase())
          },
          form: this.form
        })
      } else {
        this.$store.dispatch('createClasswork', {
          classroom: {id: 1},
          classwork: {
            type: this.title == 'Question' ? 'saqs' : Pluralize(this.title.toLowerCase())
          },
          form: this.form
        })
      }

      this.resetForm()
      this.dialog = false
    },

    prepareFormForUpdate(item) {
      this.form = item
      this.form.due_date = this.form.due_date == null ? '' : new Date(item.due_date)
    
      this.onUpdate = true
      this.oldTopic_id = item.topic_id
    },

    handleDateTimeFormat() {
      if (this.form.due_date != '') {
        this.form.due_date = moment(this.form.due_date).format('YYYY-MM-DD HH:mm:ss')
      }
    },

    handleChangingTopic() {
      if (this.oldTopic_id != this.form.topic_id) {

        if (this.oldTopic_id == null) {
          let index = this.$store.state.classworks.noTopic.listItems.findIndex(item => (item.id === this.form.id && item.type === this.form.type))
          this.$store.state.classworks.noTopic.listItems.splice(index, 1)
        } else {
          console.log(this.oldTopic_id)
          let oldTopic_index = this.$store.state.classworks.topics.findIndex(item => item.id === this.oldTopic_id)
          let oldClasswork_index = this.$store.state.classworks.topics[oldTopic_index].contents.findIndex(item => (item.id === this.form.id && item.type === this.form.type))
          this.$store.state.classworks.topics[oldTopic_index].contents.splice(oldClasswork_index, 1)
        }
      }
    },

    resetForm() {
      this.form = {
        topic_id: null,
        id: '',
        title: '',
        description: '',
        url: 'https://laravel.com/docs/9.x/eloquent-mutators#date-casting', // NOTE
        attachments: [],
        points: '100',
        due_date: ''
      }
    }
  }
}
</script>