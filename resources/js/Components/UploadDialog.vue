<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <div class="text-right">
            <v-btn
                v-bind="attrs"
                v-on="on"
                color="blue-grey"
                class="ma-2 white--text"
            >
                Upload
                <v-icon
                    right
                    dark
                >
                    mdi-upload
                </v-icon>
            </v-btn>
        </div>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Upload Works</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-file-input
                accept="image/*"
                label="File input"
            ></v-file-input>
            <v-text-field
                label="Link"
                prepend-icon="mdi-link"
                append-outer-icon="mdi-plus"
            ></v-text-field>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Submit
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
    }),
  }
</script>