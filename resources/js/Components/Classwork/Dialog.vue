<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator>
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
            @click="dialog = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Create {{ title }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="dialog = false"
            >
              Post
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-container fluid>
          <v-row>
            <v-col
              cols="12"
              sm="8"
            >
              <ClassworkForm></ClassworkForm>
            </v-col>
            <v-col
              cols="12"
              sm="4"
            >
              <ClassworkFormSetting :title="title"></ClassworkFormSetting>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
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
      notifications: false,
      sound: true,
      widgets: false,

      title: ''
    }
  },

  methods: {
    show(title) {
      this.dialog = true;
      this.title = title;
    }
  }
}
</script>