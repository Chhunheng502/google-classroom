<template>
    <v-list
        three-line
        subheader
    >
        <v-subheader>Settings</v-subheader>
        <v-list-item>
            <p class="mr-3">For</p>
            <div>
                <v-select
                    :items="items"
                    filled
                    label="Section 1"
                    dense
                >
                </v-select>
            </div>
        </v-list-item>
        <v-list-item v-show="! (title == 'Material')">
            <p class="mr-3">Points</p>
            <div>
                <v-text-field
                    type="number"
                    value="100"
                    :rules="rules"
                    outlined
                >
                </v-text-field>
            </div>
        </v-list-item>
        <v-list-item v-show="! (title == 'Material')">
            <div class="d-flex">
                <v-icon class="mr-3">mdi-clipboard-text-clock</v-icon>
                <v-datetime-picker label="Due Date" v-model="datetime">
                    <template slot="dateIcon">
                    <v-icon>mdi-calendar</v-icon>
                    </template>
                    <template slot="timeIcon">
                    <v-icon>mdi-clock-outline</v-icon>
                    </template>
                </v-datetime-picker>
            </div>
        </v-list-item>
        <v-list-item>
            <div class="d-flex">
                <v-icon class="mr-3">mdi-calendar-arrow-right</v-icon>
                <v-datetime-picker label="Schedule Post" v-model="datetime">
                    <template slot="dateIcon">
                    <v-icon>mdi-calendar</v-icon>
                    </template>
                    <template slot="timeIcon">
                    <v-icon>mdi-clock-outline</v-icon>
                    </template>
                </v-datetime-picker>
            </div>
        </v-list-item>
    </v-list>
</template>

<script>
export default {
    props: {
        title: String
    },

    data() {
        return {
            rules: [v => v <= 100 || 'Max 100 Pt'],
        }
    }
}
</script>