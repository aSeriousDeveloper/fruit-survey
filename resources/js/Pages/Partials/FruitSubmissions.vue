<script setup lang="ts">

defineProps<{
    submissions: Array<object>;
}>();
</script>

<template>
    <section class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                My Submissions
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Here are your previous submissions to the form.
            </p>
        </header>

        <template v-for="submission in submissions">
            <div class="flex p-2 *:px-2 divide-x divide-gray-600 dark:divide-gray-400 text-gray-600 dark:text-gray-400">
                <p>{{ new Date(submission.created_at).toDateString() }}</p>
                <div>
                    <template v-for="fruit in submission.form_response_fruit">
                        <spaN class="m-1 p-1 rounded-md bg-gray-900 text-gray-100 dark:bg-gray-100 dark:text-gray-900">
                            {{fruit.fruit}}
                        </spaN>

                    </template>
                </div>

                <p>{{ new Date(submission.last_eaten).toDateString() }}</p>
            </div>

        </template>
    </section>
</template>

<style scoped>

</style>
