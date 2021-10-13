<template>
    <div class="tw-mr-8 tw-flex tw-items-center">
        <button v-for="(color, theme) in themes" class="tw-border-none tw-rounded-full tw-w-4 tw-h-4 tw-bg-default tw-border tw-border-accent tw-mr-2 focus:tw-outline-none"
            :class="{ 'tw-border-accent': selectedTheme == theme }"
            :style="{backgroundColor: color}"
            @click="selectedTheme = theme">
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                themes: {
                    'theme-light': '#f5f6f9',
                    'theme-dark': '#222'
                },
                selectedTheme: 'theme-light'
            };
        },

        created() {
            this.selectedTheme = localStorage.getItem('theme') || 'theme-light';
        },

        watch: {
            selectedTheme() {
                document.body.classList.toggle("theme-light");
                document.body.classList.toggle("theme-dark");

                localStorage.setItem('theme', this.selectedTheme);
            }
        }

    }
</script>

<style>

</style>

