<template>
    <v-card
        color="#26c6da"
        dark
    >
        <v-card-title>
            <v-icon
                large
                left
            >
                mdi-twitter
            </v-icon>
            <span class="text-h6 font-weight-light">Title here</span>
        </v-card-title>

        <v-card-text
            class="text-h5 font-weight-bold"
            :class="{ 'two-lines': !isDetail }"
            :style="!isDetail ? 'height:62px' : ''"
        >
            "Turns out semicolon-less style is easier and safer in TS because most gotcha edge cases are type invalid as well."
            "Turns out semicolon-less style is easier and safer in TS because most gotcha edge cases are type invalid as well."
            "Turns out semicolon-less style is easier and safer in TS because most gotcha edge cases are type invalid as well."
        </v-card-text>

        <v-card-actions>
            <v-list-item class="grow">
                <v-list-item-avatar color="grey darken-3">
                    <v-img
                        class="elevation-6"
                        alt=""
                        src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                    ></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>Evan You</v-list-item-title>
                </v-list-item-content>

                <div>
                    <v-icon class="mr-1">
                        mdi-heart
                    </v-icon>
                    <span class="subheading mr-2">256</span>
                    <span class="mr-1">·</span>
                    <v-icon class="mr-1">
                        mdi-share-variant
                    </v-icon>
                    <span class="subheading">45</span>
                </div>
            </v-list-item>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    props: {
        isDetail: {
            type: Boolean,
            default: false
        }
    }
}
</script>