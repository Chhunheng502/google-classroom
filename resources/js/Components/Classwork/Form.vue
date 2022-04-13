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
                    v-model="form.first"
                    :rules="rules.name"
                    color="purple darken-2"
                    label="Title"
                    required
                ></v-text-field>
                </v-col>
                <v-col
                  cols="12"
                  sm="4"
                >
                <v-select
                    v-model="form.favoriteAnimal"
                    :items="animals"
                    :rules="rules.animal"
                    color="pink"
                    label="No Topic"
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
                    v-model="form.bio"
                    color="teal"
                >
                    <template v-slot:label>
                    <div>
                        Description <small>(optional)</small>
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
import TopicDialog from '@/Components/Topic/Dialog'

export default {
  components: {
    TopicDialog
  },

  data () {
    const defaultForm = Object.freeze({
      first: '',
      last: '',
      bio: '',
      favoriteAnimal: '',
      age: null,
      terms: false,
    })

    return {
      form: Object.assign({}, defaultForm),
      rules: {
        age: [
          val => val < 10 || `I don't believe you!`,
        ],
        animal: [val => (val || '').length > 0 || 'This field is required'],
        name: [val => (val || '').length > 0 || 'This field is required'],
      },
      animals: ['Dog', 'Cat', 'Rabbit', 'Turtle', 'Snake'],
      conditions: false,
      content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.',
      snackbar: false,
      terms: false,
      defaultForm,
    }
  },

  computed: {
    formIsValid () {
      return (
        this.form.first &&
        this.form.last &&
        this.form.favoriteAnimal &&
        this.form.terms
      )
    },
  },

  methods: {
    resetForm () {
      this.form = Object.assign({}, this.defaultForm)
      this.$refs.form.reset()
    },
    submit () {
      this.snackbar = true
      this.resetForm()
    },
  },
}
</script>