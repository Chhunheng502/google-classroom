<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-list-item-title
          v-bind="attrs"
          v-on="on"
        >
          <slot></slot>
        </v-list-item-title>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Create Topic</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-text-field
              label="Topic"
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
            Save
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