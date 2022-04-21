 <template>
    <v-app id="inspire">
      <v-app-bar
        app
        color="yellow"
      >
        <v-toolbar-title><slot name="header_title"></slot></v-toolbar-title>
        <v-spacer></v-spacer>
        <slot name="header_tool"></slot>
      </v-app-bar>
      <v-navigation-drawer
        app
        permanent
        :mini-variant="!$vuetify.breakpoint.mdAndUp"
        color="#09151E"
      >
        <v-divider></v-divider>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="text-h6 text-white">
              CS 316
            </v-list-item-title>
            <v-list-item-subtitle class="text-light">
              section 1
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

        <v-list nav dense>
          <v-list-item v-for="item in items" :key="item.title" link :href="item.url">
            <v-list-item-icon>
              <v-icon color="white" medium>{{ item.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title class="title text-white">{{ item.title }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
      <v-main class="bg-light">
        <v-progress-linear
          indeterminate
          color="primary"
          v-show="$store.state.isLoading"
        >
        </v-progress-linear>
        <v-container
          fluid
          fill-height
        >
          <v-layout>
            <v-flex>
              <slot name="content"></slot>
            </v-flex>
          </v-layout>
        </v-container>
      </v-main>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            items: [
              { title: 'Home', icon: 'mdi-home-city', url: '/home' },
              { title: 'Announcements', icon: 'mdi-bullhorn', url: '/cl/classroom_id/announcements' },
              { title: 'Classworks', icon: 'mdi-clipboard-text', url: '/cl/1/classworks' },
              { title: 'Reports', icon: 'mdi-chart-bar', url: '/cl/classroom_id/reports' },
              { title: 'Discussions', icon: 'mdi-forum', url: '/cl/classroom_id/discussions' },
            ]
        }
    },
}
</script>