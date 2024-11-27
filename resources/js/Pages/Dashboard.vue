<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import FruitSubmissionForm from "@/Pages/Partials/FruitSubmissionForm.vue";
import FruitSubmissions from "@/Pages/Partials/FruitSubmissions.vue";

defineProps<{
    fruit: Array<object>;
    submissions: Array<object>;
}>();

const form = useForm({
    fruit: [],
    last_eaten: null,
})

const submit = () => {
    form.post(route('fruit'), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden grid lg:grid-cols-2 bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <FruitSubmissionForm :fruit="fruit" />
                    <FruitSubmissions :submissions="submissions" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
