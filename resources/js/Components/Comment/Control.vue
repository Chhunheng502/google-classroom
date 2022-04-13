<template>
  <v-form>
    <v-text-field
      v-model="message"
      append-icon="mdi-emoticon"
      append-outer-icon="mdi-send"
      filled
      label="Add private comment"
      type="text"
      @click:append-outer="sendMessage"
    ></v-text-field>
  </v-form>
</template>

<script>
  export default {
    data: () => ({
      show: false,
      message: '',
    }),

    methods: {
      sendMessage () {
          
      },
    },
  }
</script>